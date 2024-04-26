

@extends('layouts.default')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/financialTransaction.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">


  

@endsection

@section('title2')
    <h2>Add Expense</h2>
@endsection

@section('content')
<div class="slider">
    <div class="expense_area">
        <form action="{{route("transaction.store")}}" style="width: 36%" class="create-expense-form" method="post">
            @csrf
            <div class="input_field">
                <input type="text" name="amount" class="input" placeholder="amount of money" value="{{old("amount")}}">
                @error('amount')
                    <p class="error_txt">{{$errors->first("amount")}}</p>
                @enderror
            </div>
            <div class="input_field relative">
                <input type="text" id="datepicker" class="input" placeholder="date" style="cursor: pointer" name="transaction_date" value="{{old("transaction_date")}}">
                <img src="{{asset("img/date.png")}}" alt="" class="absolute date_img">
                @error('transaction_date')
                    <p class="error_txt">{{$errors->first("transaction_date")}}</p>
                @enderror
            </div>
            <div class="input_field">
                <input type="text" class="input" name="description" placeholder="Description">
                @error('description')
                    <p class="error_txt">{{$errors->first("description")}}</p>
                @enderror
            </div>
            <select name="financial_category_id" id="" class="input_field input select_field js_financial_categories" style="cursor: pointer">
                <option value="" disabled {{ old('financial_category_id') ? '' : 'selected' }}>Select type</option>
                @foreach ($financial_categories as $financial_category)
                    <option value="{{$financial_category->id}}" @if ($financial_category->id == old("financial_category_id"))  selected @endif>{{$financial_category->financial_category_name}}</option>
                @endforeach
                @error('financial_category_id')
                    <p class="error_txt">{{$errors->first("financial_category_id")}}</p>
                @enderror
                
            </select>
            <select name="transaction_category_id" id="" class="input_field input select_field" style="cursor: pointer">
                <option value="" disabled {{ old('transaction_category_id') ? '' : 'selected' }}>Select category</option>
                @foreach ($transaction_categories as $transaction_category)
                    <option value="{{$transaction_category->id}}" @if ($transaction_category->id == old("transaction_category_id"))  selected @endif>{{$transaction_category->transaction_category_name}}</option>
                @endforeach
                @error('transaction_category_id')
                    <p class="error_txt">{{$errors->first("transaction_category_id")}}</p>
                @enderror
            </select>
            <select name="credit_card_id" id="" class="input_field input select_field" style="cursor: pointer">
                <!-- old('credit_card_id') を使ってデフォルトの選択を制御 -->
                <option value="" disabled {{ old('credit_card_id') ? '' : 'selected' }}>Select payment method</option>
                @foreach ($cards as $card)
                    <!-- old('credit_card_id') で選択された値を確認 -->
                    <option value="{{$card->id}}" {{ $card->id == old("credit_card_id") ? 'selected' : '' }}>{{$card->masked_card_number}}</option>
                @endforeach
                <!-- エラーメッセージの修正 -->
                @error('credit_card_id')
                    <p class="error_txt">{{$errors->first("credit_card_id")}}</p>
                @enderror
            </select>
            
            <button type="submit" class="addBtn">Add Transaction</button>
            
        </form>
    </div>
    <div class="expense_area">
        <form action="{{route("transaction.store")}}" style="width: 36%" class="create-expense-form" method="post">
            @csrf
            <div class="input_field">
                <input type="text" name="amount" class="input" placeholder="amount of money" value="{{old("amount")}}">
                @error('amount')
                    <p class="error_txt">{{$errors->first("amount")}}</p>
                @enderror
            </div>
            <div class="input_field relative">
                <input type="text" id="datepicker" class="input" placeholder="date" style="cursor: pointer" name="transaction_date" value="{{old("transaction_date")}}">
                <img src="{{asset("img/date.png")}}" alt="" class="absolute date_img">
                @error('transaction_date')
                    <p class="error_txt">{{$errors->first("transaction_date")}}</p>
                @enderror
            </div>
            <div class="input_field">
                <input type="text" class="input" name="description" placeholder="Description">
                @error('description')
                    <p class="error_txt">{{$errors->first("description")}}</p>
                @enderror
            </div>
            <select name="financial_category_id" id="" class="input_field input select_field js_financial_categories" style="cursor: pointer">
                <option value="" disabled {{ old('financial_category_id') ? '' : 'selected' }}>Select type</option>
                @foreach ($financial_categories as $financial_category)
                    <option value="{{$financial_category->id}}" @if ($financial_category->id == old("financial_category_id"))  selected @endif>{{$financial_category->financial_category_name}}</option>
                @endforeach
                @error('financial_category_id')
                    <p class="error_txt">{{$errors->first("financial_category_id")}}</p>
                @enderror
                
            </select>
            <select name="transaction_category_id" id="" class="input_field input select_field" style="cursor: pointer">
                <option value="" disabled {{ old('transaction_category_id') ? '' : 'selected' }}>Select category</option>
                @foreach ($transaction_categories as $transaction_category)
                    <option value="{{$transaction_category->id}}" @if ($transaction_category->id == old("transaction_category_id"))  selected @endif>{{$transaction_category->transaction_category_name}}</option>
                @endforeach
                @error('transaction_category_id')
                    <p class="error_txt">{{$errors->first("transaction_category_id")}}</p>
                @enderror
            </select>
            <select name="credit_card_id" id="" class="input_field input select_field" style="cursor: pointer">
                <!-- old('credit_card_id') を使ってデフォルトの選択を制御 -->
                <option value="" disabled {{ old('credit_card_id') ? '' : 'selected' }}>Select payment method</option>
                @foreach ($cards as $card)
                    <!-- old('credit_card_id') で選択された値を確認 -->
                    <option value="{{$card->id}}" {{ $card->id == old("credit_card_id") ? 'selected' : '' }}>{{$card->masked_card_number}}</option>
                @endforeach
                <!-- エラーメッセージの修正 -->
                @error('credit_card_id')
                    <p class="error_txt">{{$errors->first("credit_card_id")}}</p>
                @enderror
            </select>
            
            <button type="submit" class="addBtn">Add Transaction</button>
            
        </form>
    </div>
    <div class="expense_area">
        <form action="{{route("transaction.store")}}" style="width: 36%" class="create-expense-form" method="post">
            @csrf
            <div class="input_field">
                <input type="text" name="amount" class="input" placeholder="amount of money" value="{{old("amount")}}">
                @error('amount')
                    <p class="error_txt">{{$errors->first("amount")}}</p>
                @enderror
            </div>
            <div class="input_field relative">
                <input type="text" id="datepicker" class="input" placeholder="date" style="cursor: pointer" name="transaction_date" value="{{old("transaction_date")}}">
                <img src="{{asset("img/date.png")}}" alt="" class="absolute date_img">
                @error('transaction_date')
                    <p class="error_txt">{{$errors->first("transaction_date")}}</p>
                @enderror
            </div>
            <div class="input_field">
                <input type="text" class="input" name="description" placeholder="Description">
                @error('description')
                    <p class="error_txt">{{$errors->first("description")}}</p>
                @enderror
            </div>
            <select name="financial_category_id" id="" class="input_field input select_field js_financial_categories" style="cursor: pointer">
                <option value="" disabled {{ old('financial_category_id') ? '' : 'selected' }}>Select type</option>
                @foreach ($financial_categories as $financial_category)
                    <option value="{{$financial_category->id}}" @if ($financial_category->id == old("financial_category_id"))  selected @endif>{{$financial_category->financial_category_name}}</option>
                @endforeach
                @error('financial_category_id')
                    <p class="error_txt">{{$errors->first("financial_category_id")}}</p>
                @enderror
                
            </select>
            <select name="transaction_category_id" id="" class="input_field input select_field" style="cursor: pointer">
                <option value="" disabled {{ old('transaction_category_id') ? '' : 'selected' }}>Select category</option>
                @foreach ($transaction_categories as $transaction_category)
                    <option value="{{$transaction_category->id}}" @if ($transaction_category->id == old("transaction_category_id"))  selected @endif>{{$transaction_category->transaction_category_name}}</option>
                @endforeach
                @error('transaction_category_id')
                    <p class="error_txt">{{$errors->first("transaction_category_id")}}</p>
                @enderror
            </select>
            <select name="credit_card_id" id="" class="input_field input select_field" style="cursor: pointer">
                <!-- old('credit_card_id') を使ってデフォルトの選択を制御 -->
                <option value="" disabled {{ old('credit_card_id') ? '' : 'selected' }}>Select payment method</option>
                @foreach ($cards as $card)
                    <!-- old('credit_card_id') で選択された値を確認 -->
                    <option value="{{$card->id}}" {{ $card->id == old("credit_card_id") ? 'selected' : '' }}>{{$card->masked_card_number}}</option>
                @endforeach
                <!-- エラーメッセージの修正 -->
                @error('credit_card_id')
                    <p class="error_txt">{{$errors->first("credit_card_id")}}</p>
                @enderror
            </select>
            
            <button type="submit" class="addBtn">Add Transaction</button>
            
        </form>
       
    </div>
</div>
    

@endsection

@section('script')

<script src="{{ asset('js/addTransaction.js') }}"></script>

<script>
    
  </script>

  
    
@endsection