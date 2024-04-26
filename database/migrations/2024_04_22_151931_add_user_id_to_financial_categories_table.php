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
        Schema::table('financial_categories', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users", "id")->after("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financial_categories', function (Blueprint $table) {
            // 外部キー制約を削除
            $table->dropForeign(['user_id']);
            // カラム自体を削除
            $table->dropColumn('user_id');
        });
    }
};
