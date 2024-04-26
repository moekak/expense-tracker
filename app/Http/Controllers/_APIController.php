<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionCategory;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getTransactionCategory(Request $request){
        // リクエストからデータを取得
        $data = $request->input('category_id');

        $user = Auth::user(); // 認証されたユーザーの取得
        if (!$user) {
            return redirect('login'); // ログインページにリダイレクト
        }

        $transactions = TransactionCategory::where('user_id', $user->id) // `$user["id"]`ではなく`$user->id`を使用
                                            ->where('financial_category_id', $data)
                                            ->get();

        return response()->json($transactions);
    }
}
