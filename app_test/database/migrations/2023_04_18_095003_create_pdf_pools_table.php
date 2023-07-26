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
        Schema::create('pdf_pools', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('タイトル');
            $table->string('pdf_name')->comment('アップロード名');
            $table->string('master_name')->comment('ファイル名');
            $table->string('thumb_name')->comment('サムネイル名');
            $table->text('biko')->nullable()->comment('備考');
            $table->integer('s_flag')->default('0')->comment('処理フラグ');
            $table->integer('k_flag')->default('0')->comment('管理フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdf_pools');
    }
};
