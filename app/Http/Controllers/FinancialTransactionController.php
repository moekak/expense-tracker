<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FinancialTransactionRequest;
use App\Models\TransactionCategory;
use App\Models\FinancialCategory;
use App\Models\Card;
use App\Models\FinancialTransaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FinancialTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $transaction_categories = $user->transactionCategories;
        $financial_categories = $user->financialCategories;
        $cards = $user->cards;
        return view("financialTransaction", compact("transaction_categories", "financial_categories", "cards"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinancialTransactionRequest $request)
    {
        $transaction_data = new FinancialTransaction($request->validated());
        $transaction_data["user_id"] = Auth::id();
        $transaction_data["transaction_date"] = new \DateTime($request->input("transaction_date"));
        $transaction_data->save();

        return to_route("dashboard")->with("sucess", "successfully added financial transaction!");
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
