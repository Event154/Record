<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QRController;

Route::get('/qr', [QRController::class, 'show']);
use App\Http\Controllers\VoiceController;

// لعرض صفحة التسجيل
Route::get('/record', [VoiceController::class, 'showRecordPage']);

// لمعالجة رفع الصوت
Route::post('/api/upload-voice', [VoiceController::class, 'uploadVoice']);

Route::get('/', function () {
    return view('qr');
});
