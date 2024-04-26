<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionCategory;
use App\Models\FinancialCategory;
use App\Models\Card;
use App\Models\User;

class FinancialTransaction extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function TransactionCategory(){
        return $this->belongsTo(TransactionCategory::class);
    }
    public function financialCategory(){
        return $this->belongsTo(FinancialCategory::class);
    }
    public function card(){
        return $this->belongsTo(Card::class);
    }

    protected $fillable = [
        'amount',
        'transaction_date', // データベースのカラム名に基づいて修正
        'description',
        'financial_category_id', // 実際のデータベースカラム名に基づいて修正
        'transaction_category_id', // 実際のデータベースカラム名に基づいて修正
        'credit_card_id' // 実際のデータベースカラム名に基づいて修正
    ];
}
