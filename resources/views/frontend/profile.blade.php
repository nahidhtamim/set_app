@extends('layouts.frontend')
@section('title')
Profile | SET - A Premium Laundry Service
@endsection
@section('contents')



<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <div id="order-form">
                                @csrf
                                <div class="row">
                                    <div id="info text-center">
                                        <p></p>
                                    </div>

                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @elseif (session('warning'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('warning') }}
                                    </div>
                                    @endif

                                    <div class="col-lg-12 text-center">
                                        <h2>Profile Details</h2>
                                    </div>
                                    <div class="profile-card col-lg-12">
                                        <div class="card">
                                            <div class="text">
                                                <img src="https://www.shareicon.net/data/512x512/2016/09/15/829452_user_512x512.png"
                                                    alt="">
                                                <h3>{{Auth::user()->name}}</h3>
                                                <p>{{Auth::user()->email}}</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit, sed do eiusmod tempor incididunt ut labore
                                                    et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut.
                                                </p>
                                            </div>
                                            <div class="links">
                                                <a target="_blank" href="https://codepen.io/l-e-e/"><i
                                                        class="fab fa-codepen"></i></a>
                                                <a target="_blank" href="https://github.com/Leena26"><i
                                                        class="fab fa-github"></i></a>
                                                <a target="_blank"
                                                    href="https://www.youtube.com/channel/UCPOyUi82bRcPTdpDuSHVNbw"><i
                                                        class="fab fa-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
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