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
        Schema::create('iurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_wargas');
            $table->string('bulan');
            $table->decimal('jumlah_iuran', 10, 2);
            $table->string('status');
            $table->timestamps();
        // Menambahkan foreign key constraint
            $table->foreign('id_wargas')->references('id')->on('wargas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iurans');
    }
};
