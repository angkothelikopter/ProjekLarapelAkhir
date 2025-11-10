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
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('laboratory_id')->constrained()->onDelete('cascade');
        $table->string('kode_barang')->unique();
        $table->string('nama_barang');
        $table->string('kategori')->nullable();
        $table->enum('status', ['tersedia', 'rusak', 'hilang'])->default('tersedia');
        $table->date('tanggal_masuk')->nullable();
        $table->integer('jumlah')->default(1);
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

};
