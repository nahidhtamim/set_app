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
                            <form id="order-form" action="{{url('/save-order')}}" method="post">
                                <div class="row">

                                    <div id="info text-center">
                                        <p></p>
                                    </div>

                                    <div class="col-lg-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                    {{-- <div id="orders">
                                        <p></p>
                                    </div> --}}
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="sport_id" id="sport_id">
                                                <option selected>Select A Sports</option>
                                                @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="place_id" id="place_id">
                                                <option selected>Select A Place</option>
                                                @foreach ($places as $place)
                                                    <option value="{{$place->id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="service_id" id="service_id">
                                                <option selected>Select A Package</option>
                                                {{-- @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->service_name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <fieldset>
                                            <select name="locker_id" id="locker_id">
                                                <option selected>Select A Locker</option>
                                                {{-- @foreach ($lockers as $locker)
                                                    <option value="{{$locker->id}}">{{$locker->name}}</option>
                                                @endforeach --}}
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
                                                value="{{Auth::user()->email}}" required="">
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