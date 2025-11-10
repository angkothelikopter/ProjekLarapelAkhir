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
    Schema::table('laboratories', function (Blueprint $table) {
        $table->string('penanggung_jawab')->nullable();
        $table->string('foto_penanggung_jawab')->nullable();
    });
}

public function down(): void
{
    Schema::table('laboratories', function (Blueprint $table) {
        $table->dropColumn(['penanggung_jawab', 'foto_penanggung_jawab']);
    });
}

};
