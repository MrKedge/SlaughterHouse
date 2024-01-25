<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Stubs;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ReceiptController extends Controller
{
    public function ShowClientStub()
    {
        // Assuming you have the authenticated user, retrieve the user's ID
        $userId = auth()->id();

        // Retrieve the stabs related to the user's animals
        $stubs = Stubs::whereHas('animals.user', function ($query) use ($userId) {
            $query->where('id', $userId)->whereNotNull('stub_id');
        })->with('animals')->paginate(10);

        return view('client.client-stub', compact('stubs'));
    }


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


        $receipt = Receipt::create([
            'receipt_name' => $receiptName,
            'slaughter_permit' => $permitName,
            'receipt_no' => $request->receiptNumber,
        ]);


        $receiptId = $receipt->id;


        $animalIds = $stub->animals->pluck('id')->toArray();



        Animal::whereIn('id', $animalIds)->update(['receipt_id' => $receiptId]);



        return redirect()->back()->with('success', 'Receipt images uploaded successfully');
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
