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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->string('name')->comment('名前');
            $table->string('phone_number')->nullable()->comment('電話番号');
            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->text('biko')->nullable()->comment('備考');
            $table->boolean('k_flag')->default(false)->comment('管理フラグ');
            $table->boolean('s_flag')->default(false)->comment('処理フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
