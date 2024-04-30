@extends('layouts.default')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title2')
    <h2>Dashboard</h2><p></p>
@endsection

@section('content')
    <div class="dashboard_wrapper">
        <div class="dashboard_middle">
            <div class="top_area">
                <div class="dashboard_user_info">
                    @if (filter_var($user->image, FILTER_VALIDATE_URL))
                        <img src="{{$user->image}}" alt="" class="user_icon">
                    @else
                        <img src="{{asset("storage/" . $user->image)}}" alt="" class="user_icon">
                    @endif
                    <div class="dashboard_user_txt">
                        <p>Good morning {{ $user->name }}</p>
                        <small class="font_gray">Let's manage your wallet finance.</small>
                    </div>
                </div>
                <div class="calender_btn">
                    <img src="{{asset("img/arrow2.png")}}" alt="" class="arrow_icon js_calenderBtn_left">
                    <p class="js_calender_date">{{$currentDate}}</p>
                    <img src="{{asset("img/arrow.png")}}" alt="" class="arrow_icon js_calenderBtn_right">
                </div>

            </div>
            
            <div class="dashboard_sum_area">
                <div class="dashboard_sum_container">
                    <div class="percent sml"><small>+8.8%</small></div>
                    <div class="margin_t10"></div>
                    <small>Total revenue</small>
                    <div class="margin_t10"></div>
                    <h1 class="js_total_revenue">￥{{number_format($totalRevenue, 0, '', ',')}}</h1>
                </div>
                <div class="dashboard_sum_container">
                    <div class="percent sml"><small>+8.8%</small></div>
                    <div class="margin_t10"></div>
                    <small>Total expense</small>
                    <div class="margin_t10"></div>
                    <h1 class="js_total_expense">￥{{number_format($totalExpense, 0, '', ',')}}</h1>
                </div>
                <div class="dashboard_sum_container">
                    <div class="percent sml"><small>+8.8%</small></div>
                    <div class="margin_t10"></div>
                    <small>Total Profit</small>
                    <div class="margin_t10"></div>
                    <h1 class="js_total_profit">￥{{number_format(($totalRevenue - $totalExpense), 0, '', ',')}}</h1>
                    <div class="margin_t10"></div>
                </div>
            </div>
            <div class="charts relative">
                <form action="" class="absolute charts_form">
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
            <div class="transition_area">
                <h3>Transition history</h3>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col" class="sml font_gray" >Transition</th>
                        <th scope="col" class="sml font_gray">Type</th>
                        <th scope="col" class="sml font_gray">Amount</th>
                        <th scope="col" class="sml font_gray">Date</th>
                        <th scope="col" class="sml font_gray">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="transition_info">
                                    <img src="{{asset("img/upwork.png")}}" alt="" class="transition_icon">
                                    <p class="table-txt">Upwork</p>
                                </div>
                                
                            </th>
                            <td>Freelancing</td>
                            <td>$150.00</td>
                            <td>14 Aug, 2023</td>
                            <td class="credited">Credited</td>
                        </tr>
                        <div class="margin_t10"></div>
                        <tr>
                            <th scope="row">
                                <div class="transition_info">
                                    <img src="{{asset("img/netflix.png")}}" alt="" class="transition_icon">
                                    <p class="table-txt">Netflix</p>
                                </div>
                                
                            </th>
                            <td>Freelancing</td>
                            <td>$150.00</td>
                            <td>14 Aug, 2023</td>
                            <td class="debited">Debited</td>
                        </tr>
                        <tr class="marign_t10">
                            <th scope="row">
                                <div class="transition_info">
                                    <img src="{{asset("img/spotify.png")}}" alt="" class="transition_icon">
                                    <p class="table-txt">Spotify</p>
                                </div>
                                
                            </th>
                            <td>Freelancing</td>
                            <td>$150.00</td>
                            <td>14 Aug, 2023</td>
                            <td class="debited">Debited</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dashboard_right">
            <div class="credit_area">
                <div class="credits_top">
                    <h3>My Cards</h3>
                    <button><p class="sml">＋ Add card</p></button>
                </div>
                
               <div class="credit_cards">
                    <small>{{$cards[0]->card_holder_name}}</small>
                    <p class="credit_num">{{$cards[0]->masked_card_number}}</p>
                    <div class="credit_bottom">
                        <h3>￥{{number_format($cards[0]->limited_amount, 0, '', ',')}}</h3>
                        @if ($cards[0]->brand == "JCB")
                            <img src="{{asset("img/jcb.png")}}" alt="">
                        @else
                            <img src="{{asset("img/mastercard.png")}}" alt="">
                        @endif

                        {{-- <img src="{{asset("img/mastercard.png")}}" alt=""> --}}
                  </div>
                    
                </div>
            </div>
            <div class="saving_area">
                <div class="credits_top">
                    <h3>Saving plan</h3>
                    <button><p class="sml">＋ Add plan</p></button>
                </div>
                <div class="plan_container">
                    <div class="plan_container_top">
                        <div class="plan_card_left">
                             <div class="img">
                                <img src="{{asset("img/car.png")}}" alt="">
                            </div>
                            <div class="explanation">
                                <p class="small_txt">New Car</p>
                                <small class="font_gray">Target: $20,000</small>
                            </div>
                        </div>
                        <div class="btn_more">
                            <img src="{{asset("img/dot.png")}}" alt="">
                        </div>
                    </div>
                    <div class="margin_t10"></div>
                    <p class="small_txt">saving: $17563</p>
                    <div class="line_saving relative"></div>
                </div>
                <div class="margin_t10"></div>
                <div class="margin_t10"></div>
                <div class="plan_container">
                    <div class="plan_container_top">
                        <div class="plan_card_left">
                             <div class="img">
                                <img src="{{asset("img/home.png")}}" alt="">
                            </div>
                            <div class="explanation">
                                <p class="small_txt">New Home</p>
                                <small class="font_gray">Target: $150,000</small>
                            </div>
                        </div>
                        <div class="btn_more">
                            <img src="{{asset("img/dot.png")}}" alt="">
                        </div>
                    </div>
                    <div class="margin_t10"></div>
                    <p class="small_txt">saving: $17563</p>
                    <div class="line_saving2 relative"></div>
                </div>
            </div>
            
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels), // ラベルを設定
            datasets: [
                {
                    label: 'Expense',
                    data: @json($data), // データポイントを設定
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Income',
                    data: @json($secondData), // 二つ目のデータポイントを設定
                    fill: false,
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Analytics'
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
@endsection