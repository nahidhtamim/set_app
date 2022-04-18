@extends('layouts.frontend')
@section('title')
Home | SET - A Premium Laundry Service
@endsection
@section('contents')


<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="">
                                <h4 class="text-light">{{$service->service_name}}</h4>
                                <p class="text-light">${{$service->service_price}}.00</p>
                                <br>
                            </div>
                            <form id="order-form" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <select name="place" id="place">
                                                <option>Select A Place</option>
                                                @foreach ($places as $place)
                                                    <option value="{{$place->id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <select name="locker" id="locker">
                                                <option>Select A Locker</option>
                                                @foreach ($lockers as $locker)
                                                    <option value="{{$locker->id}}">{{$locker->locker_name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <select name="sport" id="sport">
                                                <option>Select A Sports</option>
                                                @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Full Name*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="address" type="text" id="name" placeholder="Address*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="phone" type="tel" id="phone" placeholder="Phone No.*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                                placeholder="Email Address*" required="">
                                        </fieldset>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Billing Details</h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Full Name*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="address" type="text" id="name" placeholder="Address*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="phone" type="tel" id="phone" placeholder="Phone No.*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                                placeholder="Email Address*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message"
                                                placeholder="Any Notes" required=""></textarea>
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