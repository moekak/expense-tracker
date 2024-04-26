<?php
namespace App\Services\calculateTotal;

class CalculateTotalAmount{
    
    public function calculateTotalAmount($data_arr){
        $total = 0;
        foreach ($data_arr as $data) {
            $total += (int)$data;
        }
        return $total;
    }
}