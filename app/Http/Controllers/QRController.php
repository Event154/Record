<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function show()
    {
        // توليد QR code مع رابط صفحة التسجيل
        $qr = QrCode::size(300)->generate(url('/record'));
        return view('qr', compact('qr'));
    }
}

