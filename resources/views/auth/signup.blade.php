@extends('auth.default')


@section('form')
    <h1 class="c">Signup Form</h1>
    <form action="{{route("user.create")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="id_area">
            <label class="font_gray">User ID</label> <br>
            <input type="text" name="user_id" class="login_input" value="{{old("user_id")}}">
            @error('user_id')
                <p class="error_txt">{{$errors->first("user_id")}}</p>
            @enderror
        </div>
        <div class="margin_t10"></div>
        <div class="id_area">
            <label class="font_gray">Username</label> <br>
            <input type="text" name="name" class="login_input" value="{{old("name")}}">
            @error('name')
                <p class="error_txt">{{$errors->first("name")}}</p>
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
        <div class="file">
            <label class="font_gray">画像</label> <br>
            <input type="file" name="image">
        </div>
        <button type="submit" class="login_btn">Sign up</button>
    </form>

    <a href="{{route("line.login")}}">line</a>
@endsection

{{-- @section('password_confirm')
    <div class="confirm_password">
        <label class="font_gray">Confirm password</label> <br>
        <input type="password" name="password_confirmation" class="login_input">
    </div>
@endsection --}}

