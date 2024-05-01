@extends('layouts.default')
@extends('layouts.createCreditCard')
    
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myWallet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title2')
    <h2>My Wallet</h2>
@endsection

@section('content')
    <div class="wallet_container">
        <div class="cards_container">
            <div class="credit_area">
                <div class="credits_top">
                    <h3 class="font_large">My Cards</h3>
                    <button class="add_card">＋</button>
                </div>
                <div class="credit_area2">
                    @foreach ($cards as $card)
                    <div class="credit_cards">
                        <small>{{$card->card_holder_name}}</small>
                        <p class="credit_num">{{$card->masked_card_number}}</p>
                        <div class="credit_bottom">
                            <h3>￥{{number_format($card->limited_amount, 0, '', ',')}}</h3>
                            @if ($card->brand == "JCB")
                                <img src="{{asset("img/jcb.png")}}" alt="">
                            @else
                                <img src="{{asset("img/mastercard.png")}}" alt="">
                            @endif

                            {{-- <img src="{{asset("img/mastercard.png")}}" alt=""> --}}
                        </div>
                    </div>  
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="transaction_area">
            <div class="transaction_area_top">
                <h3 class="font_large">Balance</h3>
                <h3 class="blue font_exLarge" style="color: #28a9a2; font-style: italic;">￥5000,00</h3>
            </div>
            <p class="margin_t50 font_gray">Transactions</p>
            <div class="transition_area">
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
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/addCreditCard.js') }}"></script>    
@endsection