<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionCategory;
use App\Services\calculateTotal\CalculateTotalAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class APIController extends Controller
{
    protected $calculateTotalAmount;

    public function __construct(CalculateTotalAmount $calculateTotalAmount)
    {
        $this->calculateTotalAmount = $calculateTotalAmount;
    }
    public function getTotalAmountbySelectedDate(Request $request){
        // リクエストからデータを取得
        $year = $request->input('year');
        $month = $request->input('month');

        $user = Auth::user(); // 認証されたユーザーの取得
        $monthNumber = Carbon::createFromFormat('F j, Y', $month . "1," . $year)->month;
        $timezone = 'Asia/Tokyo';
        $startDate = Carbon::create($year, $monthNumber, 1, 0, 0, 0, 'UTC')->startOfMonth();
        // その月の最後の日
        $endDate = Carbon::create($year, $monthNumber, 1, 0, 0, 0)->endOfMonth();

        $totalExpense = $this->calculateTotalAmount->getTotalAmount($user["id"], $startDate, $endDate, "Expense");
        // total revenueの出力
        $totalRevenue = $this->calculateTotalAmount->getTotalAmount($user["id"], $startDate, $endDate, "Income");

        // total profitの計算
        $totalProfit = $totalRevenue - $totalExpense;

        $total_amount_array = [
            "totalExpense" => $totalExpense,
            "totalRevenue" => $totalRevenue,
            "totalProfit" => $totalProfit
        ];
        
            
            
        

        
        return response()->json($total_amount_array);
    }
}
