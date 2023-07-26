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
        Schema::create('prefs', function (Blueprint $table) {
            $table->id();
            $table->string('pref')->comment('県名');
            $table->string('pref2')->comment('県名県なし');
            $table->string('yomi')->comment('県名よみ');
            $table->string('english')->comment('県名英語');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefs');
    }
};
