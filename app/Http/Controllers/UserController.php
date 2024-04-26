<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class UserController extends Controller
{
    protected function redirectTo()
    {
        return route('dashboard'); // リダイレクト先のルート名を指定
    } 
    public function showLoginForm(){
        return view('auth.login');
    }

    public function showSignupForm(){
        return view('auth.signup');
    }

    public function store(UserStoreRequest $request){
        $validated = $request->validated();
        if($request->hasFile("image")){
            $validated["image"] = $request->file("image")->store("users", "public");
        }
        
        $validated["password"] = Hash::make($validated["password"]);
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(UserLoginRequest $request){
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            // セッションを再生成する処理(セキュリティ対策)
            $request->session()->regenerate();

            // ミドルウェアに対応したリダイレクト(後述)
            // 下記はredirect('/admin/blogs')に類似
            return redirect()->route('dashboard');
        };

        return back()->withErrors([
            'email' => 'email or password does not match. try it again',
        ])->onlyInput('email');
    }

    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleLineCallback(Request $request)
    {
      
            // LINE APIからユーザー情報を取得
            $socialiteUser = Socialite::driver('line')->user();
    
            // データベースにユーザーを検索、または新規作成
            $user = $this->findOrCreateUser($socialiteUser, 'line');

            // ユーザーを認証
            Auth::login($user, false);
    
            // セッションを再生成
            $request->session()->regenerate();
    
            // ダッシュボードにリダイレクト
            return redirect()->route('dashboard');
        
    }
    
    private function findOrCreateUser($socialiteUser, $provider)
    {
    
       

        $user = User::updateOrCreate(
            ['line_id' => $socialiteUser->getId()],  // ここで既存のレコードを検索
    
            [
                // 'email' => $socialiteUser->getEmail(), // ソーシャルログインではEmailが取得できない場合もあるので注意
                'name' => $socialiteUser->getName(),
                'image' => $socialiteUser->getAvatar(),
                // パスワードは不要ですが、ランダムな値を設定することも可能です
                'password' => Hash::make(Str::random(24)),

            ]
        );
    
        return $user;
    }
}
