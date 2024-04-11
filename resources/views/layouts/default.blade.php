<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'expense tracker')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('styles')

</head>

<body>
    <div class="main-area">
        <!-- ▼▼▼▼共通ヘッダー▼▼▼▼　-->
        <header class="sticky">
            <h1 class="c">My Wallet</h1>
            <div class="margin_t50"></div>
            <div class="menu_tab">
                <img src="{{ asset('img/dashboard.png') }}" alt="" class="header-icon">
                <p>Dashboard</p>
            </div>
            <div class="menu_tab">
                <img src="{{ asset('img/wallet.png') }}" alt="" class="header-icon">
                <p>My wallet</p>
            </div>
            <div class="menu_tab">
                <img src="{{ asset('img/analytics.png') }}" alt="" class="header-icon">
                <p>Analytics</p>
            </div>
            <div class="menu_tab">
                <img src="{{ asset('img/cards.png') }}" alt="" class="header-icon">
                <p>cards</p>
            </div>
            <div class="menu_tab">
                <img src="{{ asset('img/setting.png') }}" alt="" class="header-icon">
                <p>setting</p>
            </div>


        </header>
        <main>
            <div class="main-top">
                @yield('title2')
            </div>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels), // ラベルを設定
                datasets: [{
                    label: 'My Dataset',
                    data: @json($data), // データポイントを設定
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Suggested Min and Max Settings'
                    }
                },
                scales: {
                    y: {
                        suggestedMin: 30,
                        suggestedMax: 50,
                    }
                }
            },
        });
    </script>

</body>

</html>
