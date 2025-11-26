<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoiceRecord;
class VoiceController extends Controller
{
    public function showRecordPage()
    {
        return view('record');
    }



public function uploadVoice(Request $request)
{
    if ($request->hasFile('audio')) {
        $file = $request->file('audio');
        $path = $file->store('voices', 'public');

        // حفظ المسار في قاعدة البيانات
        VoiceRecord::create([
            'file_path' => $path,
        ]);

        return response()->json(['success' => true, 'path' => $path]);
    }

    return response()->json(['success' => false], 400);
}



}
