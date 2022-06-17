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
                                        <h2>Profile Details</h2>
                                    </div>
                                    <div class="profile-card col-lg-12">
                                        <div class="card">
                                            <div class="text ">
                                                <img class="img-fluid img-profile rounded-circle mx-auto"
                                                    src="{{ asset('/uploads/avatars/'.Auth::user()->image) }}"
                                                    width="80px" alt="#" />
                                                <h3>{{ Auth::user()->name }}</h3>
                                                <hr>
                                                <br>
                                                <p>Email: {{ Auth::user()->email }}</p>
                                                <br>
                                                <p>Address: {{ Auth::user()->address }}</p>
                                                <br>
                                                <p>Phone: {{ Auth::user()->phone }}</p>
                                            </div>
                                            <hr>
                                            <div class="links">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit Details">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="detailsModal" tabindex="-1"
                                                aria-labelledby="detailsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailsModalLabel">Profile</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <form
                                                                        action="{{ url('update-details') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <h4 class="text-left">Update Details</h4>
                                                                        <hr>
                                                                        @csrf
                                                                        <div class="card-body" id="">
                                                                            <span class="d-none d-lg-block"><img
                                                                                    class="rounded-circle"
                                                                                    src="{{ asset('/uploads/avatars/'.Auth::user()->image) }}"
                                                                                    width="50px" alt="#" /></span>
                                                                            <div id="">
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            for="name">Username</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="name" id="name"
                                                                                            value="{{ $profile->name }}"
                                                                                            readonly>
                                                                                        <p class="text-danger">{{$errors->first('name')}}</p>    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="email">Email
                                                                                            Address</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            name="email" id="email"
                                                                                            value="{{ $profile->email }}"
                                                                                            readonly>
                                                                                        <p class="text-danger">{{$errors->first('email')}}</p>  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            for="address">Address</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="address" id="address"
                                                                                            value="{{ $profile->address }}" required>
                                                                                        <p class="text-danger">{{$errors->first('address')}}</p>    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="phone">Phone</label>
                                                                                        <input type="tel"
                                                                                            class="form-control"
                                                                                            name="phone" id="phone"
                                                                                            value="{{ $profile->phone }}" required>
                                                                                        <p class="text-danger">{{$errors->first('phone')}}</p>   
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="image">Profile
                                                                                            Image</label>
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            name="image" id="image">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm text-white">Save</button>
                                                                        </div>
                                                                    </form>

                                                                    <form
                                                                        action="{{ url('update-password') }}"
                                                                        method="POST">
                                                                        <br>
                                                                        <br>
                                                                        <h4 class="text-left">Update Password</h4>
                                                                        <hr>
                                                                        @csrf
                                                                        <div class="card-body" id="">
                                                                            <div id="">
                                                                                <p class="text-danger">{{$errors->first('password')}}</p>  
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="password"
                                                                                            class="">{{ __('Password*:') }}</label>
                                                                                        <input id="password"
                                                                                            type="password"
                                                                                            class="form-control"
                                                                                            name="password" required
                                                                                            autocomplete="new-password">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label for="password-confirm"
                                                                                            class="">{{ __('Confirm Password*:') }}</label>
                                                                                        <input id="password-confirm"
                                                                                            type="password"
                                                                                            class="form-control"
                                                                                            name="password_confirmation"
                                                                                            required
                                                                                            autocomplete="new-password">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm text-white">Save</button>
                                                                        </div>
                                                                    </form>
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
