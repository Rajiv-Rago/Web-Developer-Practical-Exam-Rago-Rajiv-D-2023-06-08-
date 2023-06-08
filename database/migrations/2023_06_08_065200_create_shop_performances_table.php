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
        Schema::create('shop_performances', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->default(0);
            $table->integer('red')->default(0);
            $table->integer('green')->default(0);
            $table->integer('blue')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_performances');
    }
};
