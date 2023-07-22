@extends('layouts.frontend')
@section('title')
Order | SET - A Premium Laundry Service
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
                                    @if($hasOrder == true)
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

                                        <div class="col-lg-12 text-center">
                                            <h1>Order Info</h1>
                                            <hr>
                                            {{-- @foreach($orders as $order) --}}
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Order Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p><b>Name:</b> {{$order->u_name}}</p>
                                                    <p><b>DOB:</b> {{$order->dob}}</p>
                                                    <p><b>Gender:</b> {{$order->gender}}</p>
                                                    <p><b>Sport:</b> {{$order->sport_name}}</p>
                                                    <p><b>Service Price:</b> {{$order->s_price}}€</p>

                                                    <div class="row pt-5">
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <h5>Service Details</h5> 
                                                            <hr>
                                                            <p><b>Service:</b> {{$order->s_name}}</p>
                                                            <p><b>Place Service:</b> {{$order->ps_name}}</p>
                                                            <p><b>Service Code:</b> {{$order->ps_code}}</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <h5>Locker Details</h5> 
                                                            <hr>
                                                            <p><b>Locker:</b> {{$order->l_name}}</p>
                                                            <p><b>Place Locker:</b> {{$order->pl_name}}}</p>
                                                            <p><b>Locker Code:</b> {{$order->pl_code}}</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <h5>Shipping Details</h5> 
                                                            <hr>
                                                            <p><b>Name:</b> {{$order->shipping_name}} </p>
                                                            <p><b>Email:</b> {{$order->shipping_email}}</p>
                                                            <p><b>Phone:</b> {{$order->shipping_phone}}</p>
                                                            <p><b>Address:</b> {{$order->shipping_address}}</p>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <h5>Billing Details</h5> 
                                                            <hr>
                                                            <p><b>Name:</b> {{$order->billing_name}} </p>
                                                            <p><b>Email:</b> {{$order->billing_email}}</p>
                                                            <p><b>Phone:</b> {{$order->billing_phone}}</p>
                                                            <p><b>Address:</b> {{$order->billing_address}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <p>
                                                                <b>Order Status:</b>
                                                                {{$order->order_status_name}}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <b>Action:</b>
                                                            <div class="btn-group" role="group" aria-label="Buttons">
                                                                @if($order->order_status < 9)
                                                                <a href="{{url('/request-closing/'.$order->id)}}"
                                                                    class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to cancel the service?')"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Close The Order">
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- @endforeach --}}
                                        </div>

                                        <div class="col-lg-12 pt-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="text-center">Clothing SET Details</h5>
                                                </div>
                                                <div class="card-body text-center">
                                                    @foreach($cloths as $cloth)
                                                    <p>
                                                        <button class="btn btn-primary w-50 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$cloth->hexa_code}}" aria-expanded="false" aria-controls="collapse{{$cloth->hexa_code}}">
                                                            Set: {{$cloth->set_id}} <> 
                                                            Status: @if($cloth->wash_program_number == '0')
                                                            New Entry
                                                            @else
                                                            {{$cloth->service_cycle_location_inf->location}}
                                                            @endif
                                                        </button>
                                                    </p>
                                                    <div class="collapse" id="collapse{{$cloth->hexa_code}}">
                                                        <div class="card card-body">
                                                            <div class="table-responsive">
                                                                <table class="table text-nowrap table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            {{-- <th class="border-top-0">#</th> --}}
                                                                            <th class="border-top-0">Washing Program</th>
                                                                            <th class="border-top-0">Color Group</th>
                                                                            <th class="border-top-0">Cloth Type</th>
                                                                            <th class="border-top-0">Fabric</th>
                                                                            <th class="border-top-0">Sportswear Type</th>
                                                                            <th class="border-top-0">Description</th>
                                                                            <th class="border-top-0">Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($clothing_items as $laundry)
                                                                        @if($laundry->set_id == $cloth->set_id)
                                                                        <tr>
                                                                            {{-- <td>{{$loop->iteration}}</td> --}}
                                                                            <td>{{$laundry->washing_program_inf->name}}</td>
                                                                            <td>{{$laundry->cloth_group_inf->name}}</td>
                                                                            <td>{{$laundry->cloth_type_inf->name}}</td>
                                                                            <td>{{$laundry->fabric_inf->name}}</td>
                                                                            <td>{{$laundry->sportswear_inf->name}}</td>
                                                                            <td>{!!$laundry->laundry_description!!}</td>
                                                                            <td>{{$laundry->service_cycle_location_inf->location}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                           
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-lg-12 text-center">
                                        <h1 class="text-dark">This service is currently unavailable for you. To use this function please place an order</h1>
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
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #1B2325;
        border-color: #1B2325;
    }

    .dataTables_length label {
        padding-bottom: 10px;
        text-align: center;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 20px;
        padding: 5px;
        background-color: transparent;
        padding: 4px;
    }

    .order-form #order-form select {
        width: 40%;
        height: 30px;
        border-radius: 20px;
        background-color: #f7f7f7;
        outline: none;
        border: 1px solid #aaa;
        box-shadow: none;
        font-size: 13px;
        font-weight: 500;
        color: #252525;
        padding: 0px 15px;
        margin-bottom: 0px;
    }

    .dataTables_filter label {
        text-align: center;
    }

    .order-form #order-form input {
        width: 80%;
        height: 30px;
        border-radius: 20px;
        background-color: #f7f7f7;
        outline: none;
        border: 1px solid #aaa;
        box-shadow: none;
        font-size: 13px;
        font-weight: 500;
        color: #252525;
        padding: 0px 15px;
        margin-bottom: 10px;

    }

</style>

<script>
    $(document).ready(function () {

        $('.onClosing').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: "7 days prior notification is must to completely close the order.",
                icon: "warning",
                // buttons: ["Cancel", "Yes!"],
                buttons: true,
                dangerMode: true,
            }).then(function (value) {
                if (value) {
                    swal("Order has been set for closing.", {
                        icon: "success",
                    });
                    window.location.href = url;
                }
            });
        });

    });

</script>

@endsection
