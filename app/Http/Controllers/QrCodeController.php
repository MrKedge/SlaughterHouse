<?php

namespace App\Http\Controllers;

require_once '../vendor/autoload.php';

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\User;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function generateQRCode(Request $request, $id)
    {
        $animal = Animal::find($id);


        if (!$animal) {
            return response()->json(['error' => 'Animal not found'], 404);
        }

        // Configuration options for QR code generation
        $options = new QROptions([
            'version'         => 5,
            'outputType'      => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'        => QRCode::ECC_L,
            'addQuietzone'    => true,
            'imageBase64'     => false,
            'imageTransparent' => true,
            'foregroundColor' => '#000000',
        ]);

        // Generate QR code as an image resource
        $qrcode = new QRCode($options);

        $url = route('scan-animal-qr', ['id' => $animal->id]);
        $qrCodeImage = $qrcode->render($url);

        // Save the QR code image to the public storage
        $qrName = 'animal_QRcode_' . $animal->id . time() . '.png';
        $qrPath = 'public/qr-code/' . $qrName;

        Storage::put($qrPath, $qrCodeImage);

        // Store the image name in the database
        $animal->qr_code = $qrName;
        $animal->save();

        // Optionally, return a response or redirect as needed
        // For example: return response()->json(['message' => 'QR code generated successfully']);
        return redirect()->back()->with('success', 'Qr Code added successfully');
    }

    // public function DownloadQR($id)
    // {
    //     $applicationForm = ApplicationForm::findOrFail($id);
    //     $filePath = $applicationForm->qr_code;
    //     $absoluteFilePath = storage_path('app/public/' . $filePath);

    //     if (file_exists($absoluteFilePath)) {
    //         return response()->download($absoluteFilePath, $applicationForm->qr_code_name);
    //     } else {
    //         abort(404, 'File not found');
    //     }


    //     return redirect('/myapplication/show-submit');
    // }

    public function Scanner()
    {
    }
}
