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
        Schema::create('tambangs', function (Blueprint $table) {
            $table->bigIncrements('id'); // UNSIGNED + AUTO_INCREMENT
            $table->string('kode_tambang', 50)->nullable();
            $table->string('nama_tambang', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->string('images', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambangs');
    }
};
