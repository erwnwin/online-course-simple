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
        Schema::create('materi_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->integer('view_count')->default(1);
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_views');
    }
};
