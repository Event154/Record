<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('voice_records', function (Blueprint $table) {
                $table->id();
                $table->string('file_path'); // مسار الملف
                $table->timestamps(); // وقت الإنشاء والتحديث
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voice_records');
    }
};
