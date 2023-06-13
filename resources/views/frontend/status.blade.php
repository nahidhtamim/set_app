@extends('layouts.frontend')
@section('title')
Online Status | SET - A Premium Laundry Service
@endsection
@section('contents')


<style>
    .profile-card button{
        border-radius: 0px !important;
        padding: 10px !important;
    }

    /* .profile-card .btn-group{
        border-radius: 10px !important;
    } */

    .profile-card button.btn-online a{
        color: #fff !important;
    }

    .profile-card button.btn-outline-online a{
        color: #fff !important;
    }

    .profile-card button.btn-offline a{
        color: #fff !important;
    }

    .profile-card button.btn-outline-offline a{
        color: #fff !important;
    }

    .profile-card button.btn-online{
        background: #63BC62 !important;
        border: 1px solid #63BC62 !important;
    }

    .profile-card button.btn-outline-online{
        background: none !important;
        border: 1px solid #fff !important;
    }

    .profile-card button.btn-outline-online:hover{
        background: #63BC62 !important;
        border: 1px solid #63BC62 !important;
    }

    .profile-card button.btn-offline{
        background: #f73333 !important;
        border: 1px solid #f73333 !important;
    }

    .profile-card button.btn-outline-offline{
        background: none !important;
        border: 1px solid #fff !important;
    }

    .profile-card button.btn-outline-offline:hover{
        background: #f73333 !important;
        border: 1px solid #f73333 !important;
    }
</style>


<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <div id="order-form"  style="background: rgb(11,11,14);
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

                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-offline btn-sm">
                                                        <a href="{{url('user-status/offline/'.Auth::user()->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Offline">
                                                            Offline
                                                        </a>
                                                    </button>
                                                    <button type="button" class="btn btn-online btn-sm" disabled>
                                                        <a href="{{url('user-status/online/'.Auth::user()->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="User Currently Online">
                                                            Online
                                                        </a>
                                                    </button>
                                                </div>
                                                
                                                @elseif(Auth::user()->online_status == 0)

                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-offline btn-sm" disabled>
                                                        <a href="{{url('user-status/offline/'.Auth::user()->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="User Currently Offline">
                                                            Offline
                                                        </a>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-online btn-sm">
                                                        <a href="{{url('user-status/online/'.Auth::user()->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Online">
                                                            Online
                                                        </a>
                                                    </button>
                                                </div>

                                                @endif
                                                {{-- <a class="nav-link" href="#">
                                                    <input type="checkbox" data-id="{{ Auth::user()->id }}" name="online_status" class="js-switch" {{ Auth::user()->online_status == 1 ? 'checked' : '' }}  style="height: 50px">
                                                </a> --}}
                                            </div>
                                        @endif

                                    @else
                                    <div class="col-lg-12 text-center">
                                        <h1 class="text-light">This service is currently unavailable for you. To use this function please place an order</h1>
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
    .profile-card {
        /* width: 100vw;
        height: 50vh; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        /* box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px; */
        padding: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 500px;
        border: none;
    }

    .card .text {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card .text img {

        border-radius: 50%;
        margin-bottom: 10px;
    }

    .card .text h3 {
        font-size: 40px;
        font-weight: 400;
    }

    .card .text p:nth-of-type(1) {
        color: rgb(35, 182, 219);
        font-size: 15px;
        margin-top: -5px;
    }

    .card .text p:nth-of-type(2) {
        margin: 10px;
        width: 90%;
        text-align: center;
    }

    .card .links {
        width: 30%;
        display: flex;
        justify-content: space-evenly;
    }

    .card .links i {
        color: rgb(35, 182, 219);
        font-size: 20px;
        cursor: pointer;
    }

    .card .links i:hover {
        color: rgb(29, 157, 189);
    }

</style>

@endsection
