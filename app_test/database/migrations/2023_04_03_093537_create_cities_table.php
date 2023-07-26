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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('prefcode')->comment('県コード');
            $table->string('pref')->comment('県名');
            $table->string('city')->comment('市区町村');
            $table->string('kenkana')->comment('県カナ');
            $table->string('sikukana')->comment('市区町村カナ');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
