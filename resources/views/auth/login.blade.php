@extends('auth.default')


@section('form')
    <h1 class="c">Login Form</h1>
    <form action="{{route("user.login")}}" method="post">
        @csrf
        <div class="id_area">
            <label class="font_gray">User ID</label> <br>
            <input type="text" name="user_id" class="login_input" value="{{old("user_id")}}">
            @error('user_id')
                <p class="error_txt">{{$errors->first("user_id")}}</p>
            @enderror
        </div>
        <div class="margin_t10"></div>
        <div class="password">
             <label class="font_gray">Password</label> <br>
            <input type="password" name="password" class="login_input">
            @error('password')
                <p class="error_txt">{{$errors->first("password")}}</p>
            @enderror
        </div>
        <button type="submit" class="login_btn">Log in</button>
    </form>
@endsection