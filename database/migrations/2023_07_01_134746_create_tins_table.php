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
        Schema::create('tins', function (Blueprint $table) {
            $table->id();
            $table->char('lang', 2);
            $table->string('tieuDe', 255);
            $table->string('tomTat', 1000)->nullable();
            $table->string('urlImg', 255)->nullable();
            $table->text('noiDung')->nullable();
            $table->integer('xem')->default(0);
            $table->boolean('noiBat')->nullable();
            $table->boolean('anHien')->nullable();
            $table->string('tags', 1000)->nullable();
            $table->unsignedBigInteger('idTL');
            $table->foreign('idTL')->references('id')->on('loai_tins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tins');
    }
};
