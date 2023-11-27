<?php

namespace App\Http\Controllers;

require_once '../vendor/autoload.php';

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\User;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


class QrCodeController extends Controller
{
    public function generateQRCode(Request $request, $id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            // Handle the case where the animal with the given ID is not found
            // For example: return response()->json(['error' => 'Animal not found'], 404);
        }

        // Configuration options for QR code generation
        $options = new QROptions([
            'version'         => 5,
            'outputType'      => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'        => QRCode::ECC_L,
            'scale'           => 5,
            'addQuietzone'    => true,
            'imageBase64'     => false,
            'imageTransparent' => true,
            'foregroundColor' => '#000000',
        ]);

        // Generate QR code as an image resource
        $qrcode = new QRCode($options);
        $qrCodeImage = $qrcode->render($animal->id);

        // Save the QR code image to the public storage
        $qrName = 'QRcode_'  . $animal->id . time() . '.png';
        $qrPath = 'app/public/qr_code/' . $qrName;

        file_put_contents(storage_path($qrPath), $qrCodeImage);

        // Store the image name in the database
        $animal->qr_code = $qrName;
        $animal->save();

        // Optionally, return a response or redirect as needed
        // For example: return response()->json(['message' => 'QR code generated successfully']);
    }
}
