<?php

use App\Models\NewsCategories;
use App\Models\User;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->char('lang', 2);
            $table->string('title', 255);
            $table->string('summary', 1000)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('content')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('isTrending')->nullable();
            $table->boolean('isVisible')->nullable();
            $table->string('tags', 1000)->nullable();


            $table->foreignIdFor(NewsCategories::class);
            $table->foreignIdFor(User::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
