<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\calculateTotal\CalculateTotalAmount;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $calculateTotalAmount;

    public function __construct(CalculateTotalAmount $calculateTotalAmount)
    {
        $this->calculateTotalAmount = $calculateTotalAmount;
    }
    public function index()
    {
        $user = Auth::user(); // 認証されたユーザーの取得
      
        // その日の日付を取得
        $today = Carbon::now();
        $year = $today->year;
        $month = $today->format('F');
        $currentDate = $month . " " . $year; // スペースを追加して文字列を結合


        $startDate = now()->startOfMonth(); // 今月の最初の日時を取得
        $endDate = now()->endOfMonth(); // 今月の最後の日時を取得


        // total expenseの出力
        $totalExpense = $this->calculateTotalAmount->getTotalAmount($user["id"], $startDate, $endDate, "Expense");
        // total revenueの出力
        $totalRevenue = $this->calculateTotalAmount->getTotalAmount($user["id"], $startDate, $endDate, "Income");
        // カード情報の取得
        $cards = $user->cards;


        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = [10, 6, 30, 40, 50, 50, 15, 20, 60, 40, 30];
        $secondData = [5, 90, 50, 48, 52, 20, 56, 90, 12, 34, 66];
        return view("dashboard",compact('labels', 'data','secondData', "user", "cards", "totalExpense", "totalRevenue", "currentDate"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
