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
        Schema::table('tambangs', function (Blueprint $table) {
            $table->timestamps(); // ← menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tambangs', function (Blueprint $table) {
            $table->dropTimestamps(); // ← menghapus kolom created_at dan updated_at
        });
    }
};
