@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title2')
    <h2>Dashboard</h2>
@endsection

@section('content')
    <div class="dashboard_middle">
        <div class="dashboard_user_info">
            <img src="{{ asset('img/dummy.jpg') }}" alt="" class="user_icon">
            <div class="dashboard_user_txt">
                <p>Good morning Jane Cooper</p>
                <small class="font_gray">Let's manage your wallet finance.</small>
            </div>
        </div>
        <div class="dashboard_sum_area">
            <div class="dashboard_sum_container">
                <div class="percent">+8.8%</div>
                <div class="margin_t10"></div>
                <small>Total revenue</small>
                <div class="margin_t10"></div>
                <h1>$320,000</h1>
            </div>
            <div class="dashboard_sum_container">
                <div class="percent">+8.8%</div>
                <div class="margin_t10"></div>
                <small>Total revenue</small>
                <div class="margin_t10"></div>
                <h1>$320,000</h1>
            </div>
            <div class="dashboard_sum_container">
                <div class="percent">+8.8%</div>
                <div class="margin_t10"></div>
                <small>Total revenue</small>
                <div class="margin_t10"></div>
                <h1>$320,000</h1>
                <div class="margin_t10"></div>
            </div>
        </div>
        <div class="charts relative">
            <form action="" class="absolute">
                <select name="" id="" class="charts_select">
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                </select>
            </form>
            <div class="charts_container">
                <canvas id="chart"></canvas>
            </div>
            
        </div>
    </div>
    
   
@endsection