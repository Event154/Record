<?php


namespace App\Http\Controllers;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QRController extends Controller
{
   public function show()
{
    $url = url('/record');

    $options = new QROptions([
        'outputType' => QRCode::OUTPUT_IMAGE_PNG,
        'eccLevel' => QRCode::ECC_L,
        'scale' => 5,
    ]);

    // Raw PNG bytes
    $qrcodeBinary = (new QRCode($options))->render($url);

    // Convert to Base64 here (safe)
    $qrcode = base64_encode($qrcodeBinary);

    return view('qr', compact('qrcode'));
}

}


