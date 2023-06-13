@extends('layouts.frontend')
@section('title')
Order Form | SET - A Premium Laundry Service
@endsection
@section('contents')



<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <form id="order-form" action="{{url('/save-order')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div id="info text-center">
                                        <p></p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                            <a class="close">&times;</a>
                                        </div>
                                    @elseif (session('warning'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('warning') }}
                                            <a class="close">&times;</a>
                                        </div>    
                                    @endif
                                    
                                    <div class="col-lg-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                    {{-- <div id="orders">
                                        <p></p>
                                    </div> --}}
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="sport_id" id="sport_id" class="@error('sport_id') is-invalid @enderror" required>
                                                <option selected>Select A Sports *</option>
                                                @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('sport_id')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="place_id" id="place_id" class="@error('place_id') is-invalid @enderror" required>
                                                <option selected>Select A Place *</option>
                                                @foreach ($places as $place)
                                                    <option value="{{$place->id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('place_id')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="service_id" id="service_id" class="@error('service_id') is-invalid @enderror" required>
                                                <option selected>Select A Package *</option>
                                                {{-- @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->service_name}}</option>
                                                @endforeach --}}
                                            </select>
                                            <span class="text-danger">
                                                @error('service_id')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="locker_id" id="locker_id" class="@error('service_id') is-invalid @enderror" required>
                                                <option selected>Select A Locker *</option>
                                                {{-- @foreach ($lockers as $locker)
                                                    <option value="{{$locker->id}}">{{$locker->name}}</option>
                                                @endforeach --}}
                                            </select>
                                            <span class="text-danger">
                                                @error('locker_id')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3">
                                        <fieldset>
                                            <input name="fist_name" type="text" id="fist_name" class="form-control @error('fist_name') is-invalid @enderror" placeholder="First Name*" required="">
                                            <span class="text-danger">
                                                @error('fist_name')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>    
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-3">
                                        <fieldset>
                                            <input name="last_name" type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name*" required="">
                                            <span class="text-danger">
                                                @error('last_name')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>    
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6">
                                        <fieldset>
                                            <select name="gender" id="gender" class="@error('gender') is-invalid @enderror" required>
                                                <option selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('gender')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>  
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="dob" type="date" id="dob" class="form-control @error('dob') is-invalid @enderror" placeholder="Date of Birth*" required="">
                                            <span class="text-danger">
                                                @error('dob')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>  
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="shipping_address" type="text" id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" placeholder="Address*" required="">
                                            <span class="text-danger">
                                                @error('shipping_address')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>  
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="shipping_phone" type="tel" id="shipping_phone" class="form-control @error('shipping_phone') is-invalid @enderror" placeholder="Phone No.*" required="">
                                            <span class="text-danger">
                                                @error('shipping_phone')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span> 
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="shipping_email" type="email" id="shipping_email" class="form-control @error('shipping_email') is-invalid @enderror" pattern="[^ @]*@[^ @]*" placeholder="Email Address*" required="">
                                            <span class="text-danger">
                                                @error('shipping_email')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span> 
                                        </fieldset>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>{{__('messages.billing_details')}}</h2>
                                    </div>
                                    <div class="col-lg-3">
                                        <fieldset>
                                            <input name="billing_first_name" type="text" id="billing_first_name" class="form-control @error('billing_first_name') is-invalid @enderror" placeholder="First Name*" required="">
                                            <span class="text-danger">
                                                @error('billing_first_name')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3">
                                        <fieldset>
                                            <input name="billing_last_name" type="text" id="billing_last_name" class="form-control @error('billing_last_name') is-invalid @enderror" placeholder="Last Name*" required="">
                                            <span class="text-danger">
                                                @error('billing_last_name')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="billing_address" type="text" id="billing_address" class="form-control @error('billing_address') is-invalid @enderror" placeholder="Address*" required="">
                                            <span class="text-danger">
                                                @error('billing_address')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="billing_phone" type="tel" id="billing_phone" class="form-control @error('billing_phone') is-invalid @enderror" placeholder="Phone No.*" required="">
                                            <span class="text-danger">
                                                @error('billing_phone')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="billing_email" type="email" id="billing_email" class="form-control @error('billing_email') is-invalid @enderror" pattern="[^ @]*@[^ @]*" placeholder="Email Address*" required="">
                                            <span class="text-danger">
                                                @error('billing_email')
                                                    <p class="text-danger">{{$message}}</p> 
                                                @enderror
                                            </span>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message"
                                                placeholder="Any Notes"></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="button">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12">
              <div class="main-button-red">
                <a href="meetings.html">Back To Meetings List</a>
              </div>
            </div> --}}
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>

@endsection