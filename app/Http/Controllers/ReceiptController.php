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
        // Validate the uploaded file
        $request->validate([
            'receipt_image' => 'required', // Adjust the validation rules as needed
        ]);

        // Get the Stub by ID with its associated Animals
        $stub = Stubs::with('animals')->findOrFail($id);

        // Store the uploaded image in the 'owner-receipt' directory
        $receiptName = time() . '_' . $stub->id . '.png'; // Use the stub's ID in the file name
        $request->file('receipt_image')->storeAs('public/owner-receipt', $receiptName);

        // Create a Receipt for the Stub
        $receipt = Receipt::create([
            'receipt_name' => $receiptName, // Store the image name with extension
        ]);

        // Retrieve the ID of the created Receipt
        $receiptId = $receipt->id;

        // Update the receipt_id in the Animal table for each Animal
        $animalIds = $stub->animals->pluck('id')->toArray();

        // Update the receipt_id in the Animal table


        Animal::whereIn('id', $animalIds)->update(['receipt_id' => $receiptId]);

        // Retrieve the updated animals based on the selected IDs

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Receipt images uploaded successfully');
    }
}
