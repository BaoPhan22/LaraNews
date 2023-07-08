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
        Schema::create('loai_tins', function (Blueprint $table) {
            $table->id();
            $table->char('lang', 2)->nullable();
            $table->string('ten', 100);
            $table->integer('thuTu')->nullable();
            $table->boolean('anHien')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_tins');
    }
};
