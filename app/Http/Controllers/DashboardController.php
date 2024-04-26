<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FinancialCategory;
use App\Models\FinancialTransaction;
use App\Services\calculateTotal\CalculateTotalAmount;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // 認証されたユーザーの取得

        if (!$user) {
            return redirect('login'); // ログインページにリダイレクト
        }
        $cards = $user->cards;
        $expenseTypeId = FinancialCategory::where('financial_category_name', 'Expense')->first()->id;
        $transactions = FinancialTransaction::where('user_id', $user["id"])->where('financial_category_id', $expenseTypeId)->pluck("amount");

        $calculateAmount = new CalculateTotalAmount();
        $totalExpense = $calculateAmount->calculateTotalAmount($transactions);
 

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = [10, 6, 30, 40, 50, 50, 15, 20, 60, 40, 30];
        $secondData = [5, 90, 50, 48, 52, 20, 56, 90, 12, 34, 66];
        return view("dashboard",compact('labels', 'data','secondData', "user", "cards", "totalExpense"));
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
