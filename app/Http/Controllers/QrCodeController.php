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

        $options = new QROptions([
            'version'         => 5,
            'outputType'      => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'        => QRCode::ECC_L,
            'addQuietzone'    => true,
            'imageBase64'     => false,
            'imageTransparent' => true,
            'foregroundColor' => '#000000',
        ]);


        $qrcode = new QRCode($options);
        $qrCodeImage = $qrcode->render($animal->id);


        $qrName = 'animal_QRcode_' . $animal->id . time() . '.png';
        $qrPath = 'public/qr-code/' . $qrName;

        Storage::put($qrPath, $qrCodeImage);


        $animal->qr_code = $qrName;
        $animal->save();



        return redirect()->back()->with('success', 'Qr Code added successfully');
    }
}
