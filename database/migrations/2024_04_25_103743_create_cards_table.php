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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users", "id")->after("id");
            $table->string('masked_card_number'); // マスキングされたカード番号
            $table->string('expiration_date'); // 有効期限
            $table->string('card_holder_name'); // 名義人
            $table->string('brand');
            $table->integer('limited_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
