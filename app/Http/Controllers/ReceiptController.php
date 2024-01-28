<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Stubs;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ReceiptController extends Controller
{



    public function ShowReceiptTable($id)
    {

        $stub = Stubs::with('animals')->findOrFail($id);


        $animal = $stub->animals()->paginate(10);

        return view('client.client-receipt-table', compact('stub', 'animal'));
    }




    public function UploadReceipt(Request $request, $id)
    {
        $request->validate([
            'receipt' => 'required',
            'permit' => 'required',
            'receiptNumber' => 'required',
        ]);

        $stub = Stubs::with('animals')->findOrFail($id);

        $receiptName = time() . '_' . $stub->id . '.png';
        $request->file('receipt')->storeAs('public/owner-receipt', $receiptName);

        $permitName = time() . '_' . $stub->id . '.png';
        $request->file('permit')->storeAs('public/slaughter-permit', $permitName);

        // Check if there are any associated animals
        if ($stub->animals->isNotEmpty()) {
            // Retrieve the receipt_id from the first associated animal (assuming all animals have the same receipt_id)
            $receiptIdFromAnimals = $stub->animals->first()->receipt_id;

            // Check if receipt_id is null in animals table
            if ($receiptIdFromAnimals === null) {
                // Create a new receipt

                // Check if a receipt is associated with the animals
                $firstAnimal = $stub->animals->first();
                if ($firstAnimal->receipt_id === null) {
                    // Create a new receipt
                    $receipt = Receipt::create([
                        'receipt_no' => $request->receiptNumber,
                        'receipt_name' => $receiptName,
                        'slaughter_permit' => $permitName
                    ]);
                    $receiptId = $receipt->id;
                }
                $stub->animals()->update(['receipt_id' => $receiptId]);
            } else {
                // Retrieve the existing receipt based on receipt_id from animals table
                $receipt = Receipt::findOrFail($receiptIdFromAnimals);
                // Update existing receipt data
                $receipt->update([
                    'receipt_no' => $request->receiptNumber,
                    'receipt_name' => $receiptName,
                    'slaughter_permit' => $permitName
                ]);
                DB::table('animals')
                    ->where('receipt_id', $receiptIdFromAnimals)
                    ->update(['status' => 'inspection']);
            }
        }

        // Retrieve the ID of the newly created or updated Receipt record
        $receiptId = $receipt->id;
        // Update the receipt_id in animals table only if it's not null
        $stub->animals()->whereNotNull('receipt_id')->update(['receipt_id' => $receiptId]);

        return redirect()->route('client.stub')->with('success', 'Receipt images uploaded successfully');
    }





    public function RejectReceipt(Request $request, $receiptId)
    {
        $request->validate([
            'receipt-remarks' => 'required',
        ]);

        try {
            // Update 'receipt_remarks' column in the 'receipts' table
            DB::table('receipts')
                ->where('id', $receiptId)
                ->update(['receipt_remarks' => $request->input('receipt-remarks')]);

            // Update 'status' column in the 'animals' table
            DB::table('animals')
                ->where('receipt_id', $receiptId)
                ->update(['status' => 'receipt invalid']);

            // Retrieve the receipt name and slaughter permit from the database
            $receipt = Receipt::where('id', $receiptId)->firstOrFail();

            // Construct the file paths
            $ownerReceiptPath = public_path('storage/owner-receipt/' . $receipt->receipt_name);
            $slaughterPermitPath = public_path('storage/slaughter-permit/' . $receipt->slaughter_permit);

            // Delete the files
            if (File::exists($ownerReceiptPath)) {
                File::delete($ownerReceiptPath);
            }
            if (File::exists($slaughterPermitPath)) {
                File::delete($slaughterPermitPath);
            }

            $receipt->update([
                'receipt_name' => null,
                'slaughter_permit' => null,
            ]);
            return redirect()->back()->with([
                'status' => 'receipt invalid',
                'receipt_remarks' => $request->input('receipt-remarks'),
                'success' => 'Receipt rejection processed successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Error occurred while processing the request.'], 500);
        }
    }





    public function ShowInvalidReceipts()
    {
        $animal = Animal::where('status', 'receipt invalid')
            ->whereHas('schedule', function ($query) {
                $query->whereNotNull('scheduled_at');
            })
            ->whereHas('anteMortem', function ($query) {
                $query->where('inspection_status', 'for slaughter');
            })
            ->paginate(5);

        return view('admin.admin-invalid-receipt', compact('animal'));
    }
}
