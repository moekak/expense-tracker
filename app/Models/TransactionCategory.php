<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FinancialTransaction;
use App\Models\FinancialCategory;

class TransactionCategory extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);  // Userモデルへの参照を追加
    }
  
    public function transactionCategory()
    {
        return $this->belongsTo(FinancialCategory::class);  // Userモデルへの参照を追加
    }
  
    public function financialTransactions(){
        return $this->hasMany(FinancialTransaction::class);
    }

}
