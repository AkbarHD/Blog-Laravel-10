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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained();
            $table->foreignId('category_id')->index()->constrained();
            $table->string('title');
            $table->string('slug');
            $table->longText('desc');
            $table->string('img');
            $table->integer('view')->default(0); // brfngsi utk brp kali di lihat
            $table->string('status');
            $table->date('publish_date'); // tanggal brp kita ngepublish blog
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
