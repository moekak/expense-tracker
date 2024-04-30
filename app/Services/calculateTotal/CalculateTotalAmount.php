<?php
namespace App\Services\calculateTotal;
use App\Models\FinancialCategory;
use App\Models\FinancialTransaction;

class CalculateTotalAmount{
    
    // totalを計算する式
    public function calculateTotalAmount($data_arr){
        $total = 0;
        foreach ($data_arr as $data) {
            $total += (int)$data;
        }
        return $total;
    }

    // 
    public function getTotalAmount($userId, $startDate, $endDate, $financial_type){
        $financialTypeId = FinancialCategory::where('financial_category_name', $financial_type)->first()->id;
        $transactions = FinancialTransaction::where('user_id', $userId)
                            ->where('financial_category_id', $financialTypeId)
                            ->whereBetween('transaction_date', [$startDate, $endDate])
                            ->pluck("amount");
        
        return $this->calculateTotalAmount($transactions);
    }   
}