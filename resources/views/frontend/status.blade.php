@extends('layouts.frontend')
@section('title')
Online Status | SET - A Premium Laundry Service
@endsection
@section('contents')


<style>
    .profile-card {
        text-align: center;
    }

    .profile-card p {
        color: #fff;
        padding-bottom: 15px;
    }

    .profile-card .custom-btn {
        width: 130px;
        height: 40px;
        color: #4b4a4a;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: bold;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    /* 8 */
    .profile-card .btn-online {
        background-color: #f0ecfc;
        background-image: linear-gradient(315deg, #f0ecfc 0%, #8be48b 74%);
        line-height: 42px;
        padding: 0;
        border: none;
    }

    .profile-card .btn-online span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .profile-card .btn-online:before,
    .profile-card .btn-online:after {
        position: absolute;
        content: "";
        right: 0;
        bottom: 0;
        background: #8be48b;
        /*box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);*/
        transition: all 0.3s ease;
    }

    .profile-card .btn-online:before {
        height: 0%;
        width: 2px;
    }

    .profile-card .btn-online:after {
        width: 0%;
        height: 2px;
    }

    .btn-online:hover:before {
        height: 100%;
    }

    .profile-card .btn-online:hover:after {
        width: 100%;
    }

    .profile-card .btn-online:hover {
        background: transparent;
    }

    .profile-card .btn-online span:hover {
        color: #8be48b;
    }

    .profile-card .btn-online span:before,
    .profile-card .btn-online span:after {
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        background: #8be48b;
        /*box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);*/
        transition: all 0.3s ease;
    }

    .profile-card .btn-online span:before {
        width: 2px;
        height: 0%;
    }

    .profile-card .btn-online span:after {
        height: 2px;
        width: 0%;
    }

    .profile-card .btn-online span:hover:before {
        height: 100%;
    }

    .profile-card .btn-online span:hover:after {
        width: 100%;
    }




/* 8 */
.profile-card .btn-offline {
        background-color: #f0ecfc;
        background-image: linear-gradient(315deg, #f0ecfc 0%, #ee7d7d 74%);
        line-height: 42px;
        padding: 0;
        border: none;
    }

    .profile-card .btn-offline span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .profile-card .btn-offline:before,
    .profile-card .btn-offline:after {
        position: absolute;
        content: "";
        right: 0;
        bottom: 0;
        background: #ee7d7d;
        /*box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);*/
        transition: all 0.3s ease;
    }

    .profile-card .btn-offline:before {
        height: 0%;
        width: 2px;
    }

    .profile-card .btn-offline:after {
        width: 0%;
        height: 2px;
    }

    .btn-offline:hover:before {
        height: 100%;
    }

    .profile-card .btn-offline:hover:after {
        width: 100%;
    }

    .profile-card .btn-offline:hover {
        background: transparent;
    }

    .profile-card .btn-offline span:hover {
        color: #ee7d7d;
    }

    .profile-card .btn-offline span:before,
    .profile-card .btn-offline span:after {
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        background: #ee7d7d;
        /*box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);*/
        transition: all 0.3s ease;
    }

    .profile-card .btn-offline span:before {
        width: 2px;
        height: 0%;
    }

    .profile-card .btn-offline span:after {
        height: 2px;
        width: 0%;
    }

    .profile-card .btn-offline span:hover:before {
        height: 100%;
    }

    .profile-card .btn-offline span:hover:after {
        width: 100%;
    }
</style>


<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <div id="order-form" style="background: rgb(11,11,14);
                            background: linear-gradient(90deg, rgba(11,11,14,1) 0%, rgba(81,81,85,1) 35%, rgba(155,159,159,1) 100%);
                            background-size:cover;">
                                @csrf
                                <div class="row">

                                    @if($hasOrder == true)
                                    @if($order->order_status == 0)
                                    <div class="col-lg-12 text-center">
                                        <h1 class="text-light">Your Order is Yet to be Confirmed</h1>
                                    </div>
                                    @elseif($order->order_status == 1)
                                    @if(session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                        <a class="close">&times;</a>
                                    </div>
                                    @elseif(session('warning'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('warning') }}
                                        <a class="close">&times;</a>
                                    </div>
                                    @endif

                                    <div class="col-lg-12 text-center">
                                        <h2 class="text-light">Online Status</h2>
                                    </div>
                                    <div class="profile-card col-lg-12">
                                        @if(Auth::user()->online_status == 1)

                                        @if($cloth_set_one->wash_program_number == '4')
                                        <p class="text-center">You are currently online</p>
                                        <a class="btn btn-offline custom-btn btn-sm"
                                            href="{{url('user-status/offline/'.Auth::user()->id.'/'.$cloth_set_one->id)}}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Go Offline">
                                            <span>Go Offline</span> 
                                        </a>
                                        @elseif($cloth_set_two->wash_program_number == '4')
                                        <p class="text-center">You are currently online</p>
                                        <a class="btn btn-offline custom-btn btn-sm"
                                            href="{{url('user-status/offline/'.Auth::user()->id.'/'.$cloth_set_two->id)}}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Go Offline">
                                            <span>Go Offline</span> 
                                        </a>
                                        @elseif($cloth_set_one->wash_program_number == '4' &&
                                        $cloth_set_two->wash_program_number == '4')
                                        <p class="text-center">You are currently online</p>
                                        <a class="btn btn-offline custom-btn btn-sm"
                                            href="{{url('user-status/offline/'.Auth::user()->id.'/'.$cloth_set_one->id)}}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Go Offline">
                                            <span>Go Offline</span> 
                                        </a>
                                        @else
                                        <p>Your cloth is yet to be SET up</p>
                                        @endif

                                        @elseif(Auth::user()->online_status == 0)

                                        @if($cloth_set_one->wash_program_number == '3')
                                        <p class="text-center">You are currently offline</p>
                                        <a class="btn btn-online custom-btn btn-sm"
                                            href="{{url('user-status/online/'.Auth::user()->id.'/'.$cloth_set_one->id)}}"
                                            class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Go Online">
                                            <span>Go Online</span> 
                                        </a>
                                        @elseif($cloth_set_two->wash_program_number == '3')
                                        <p class="text-center">You are currently offline</p>
                                        <a class="btn btn-online custom-btn btn-sm"
                                            href="{{url('user-status/online/'.Auth::user()->id.'/'.$cloth_set_two->id)}}"
                                            class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Go Online">
                                            <span>Go Online</span> 
                                        </a>
                                        @elseif($cloth_set_one->wash_program_number == '3' &&
                                        $cloth_set_two->wash_program_number == '3')
                                        <p class="text-center">You are currently offline</p>
                                        <a class="btn btn-online custom-btn btn-sm"
                                            href="{{url('user-status/online/'.Auth::user()->id.'/'.$cloth_set_one->id)}}"
                                            class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Go Online">
                                            <span>Go Online</span> 
                                        </a>
                                        @else
                                        <p>Your cloth is yet to be SET up</p>
                                        @endif


                                        @endif
                                        {{-- <a class="nav-link" href="#">
                                                    <input type="checkbox" data-id="{{ Auth::user()->id }}"
                                        name="online_status" class="js-switch"
                                        {{ Auth::user()->online_status == 1 ? 'checked' : '' }} style="height: 50px">
                                        </a> --}}
                                    </div>
                                    @endif

                                    @else
                                    <div class="col-lg-12 text-center">
                                        <h1 class="text-light">This service is currently unavailable for you. To use
                                            this function please place an order</h1>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>

<style>

</style>

@endsection
