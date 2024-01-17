<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Stubs;
use App\Models\Receipt;

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
        // Retrieve the stab and its associated animals
        $stub = Stubs::with('animals')->findOrFail($id);

        // Access the related animals
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
}
