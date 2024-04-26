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
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->after("id");
            $table->integer("amount");
            $table->date("transaction_date");
            $table->string("description", 100)->nullable();
            $table->foreignId("financial_category_id")->constrained("financial_categories")->after("user_id");
            $table->foreignId("transaction_category_id")->constrained("transaction_categories")->after("financial_category_id");
            $table->foreignId("credit_card_id")->constrained("cards")->nullable()->after("transaction_category_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_transactions');
    }
};
