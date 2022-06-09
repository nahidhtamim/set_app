@extends('layouts.admin')
 @section('title')
 Edit Order - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Orders</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/edit-order/'.$order->id)}}" class="fw-normal">Edit Order</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="order-form" class="form-horizontal form-material" action="{{url('/update-order/'.$order->id)}}" method="post">
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
                                    
                                    <div class="col-lg-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                    <hr>
                                    {{-- <div id="orders">
                                        <p></p>
                                    </div> --}}

                                    <div class="form-group mb-4 col-md-3">
                                        <label class="col-md-12"><b>Sports <span class="text-danger">*</span></b></label>
    
                                        <div class="col-md-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="sport_id" id="sport_id" required>
                                                <option value="{{$order->sport_id}}" selected>{{$order->sport_inf->sport_name}}</option>
                                                @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-3">
                                        <label class="col-md-12"><b>Places <span class="text-danger">*</span></b></label>
    
                                        <div class="col-md-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="place_id" id="place_id" required>
                                                <option value="{{$order->place_id}}" selected>{{$order->place_inf->place_name}}</option>
                                                @foreach ($places as $place)
                                                    <option value="{{$place->id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-3">
                                        <label class="col-md-12"><b>Packages <span class="text-danger">*</span></b></label>
    
                                        <div class="col-md-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="service_id" id="service_id" required>
                                                <option value="{{$order->service_id}}" selected>{{$order->place_service_inf->name}}</option>
                                                {{-- @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-3">
                                        <label class="col-md-12"><b>Lockers <span class="text-danger">*</span></b></label>
    
                                        <div class="col-md-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="locker_id" id="locker_id" required>
                                                <option value="{{$order->locker_id}}" selected>{{$order->place_locker_inf->name}}</option>
                                                {{-- @foreach ($sports as $sport)
                                                    <option value="{{$sport->id}}">{{$sport->sport_name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Shipping Name <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{$order->shipping_name}}"
                                                class="form-control p-0 border-0" name="shipping_name" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Shipping Address <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{$order->shipping_address}}"
                                                class="form-control p-0 border-0" name="shipping_address" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Shipping Phone <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="tel" value="{{$order->shipping_name}}"
                                                class="form-control p-0 border-0" name="shipping_phone" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Shipping Email <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" value="{{$order->shipping_email}}"
                                                class="form-control p-0 border-0" name="shipping_email" required> 
                                            </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h2>Billing Details</h2>
                                    </div>
                                    <hr>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Billing Name <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{$order->billing_name}}"
                                                class="form-control p-0 border-0" name="billing_name" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Billing Address <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{$order->billing_address}}"
                                                class="form-control p-0 border-0" name="billing_address" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Billing Phone <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="tel" value="{{$order->billing_name}}"
                                                class="form-control p-0 border-0" name="billing_phone" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-6">
                                        <label class="col-md-12 p-0"><b>Billing Email <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" value="{{$order->shipping_email}}"
                                                class="form-control p-0 border-0" name="billing_email" required> 
                                            </div>
                                    </div>

                                    <div class="form-group mb-4 col-md-12">
                                        <label class="col-md-12 p-0"><b>message <span class="text-danger">*</span></b></label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="message" type="text" class="form-control" id="message"
                                                placeholder="Any Notes" required="">{{$order->message}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
          
            <script type="text/javascript">
                $('#place_id').on('change', function () {
                    get_service_by_place();
                });
            
                function get_service_by_place() {
                    var place_id = $('#place_id').val();
                    $.post('{{ route('getServices') }}', {
                            _token: '{{ csrf_token() }}',
                            place_id: place_id
                        },
                        function (data) {
                            $('#service_id').html(null);
                            $('#service_id').append($('<option value="">Select A Package</option>', {}));
                            for (var i = 0; i < data.length; i++) {
                                $('#service_id').append($('<option>', {
                                    value: data[i].id,
                                    text: data[i].name +' - '+ data[i].service_price +'€',
                                }));
                                
                            }
                        });
                }
            </script>
            
            <script type="text/javascript">
                $('#service_id').on('change', function () {
                    get_locker_by_service();
                });
            
                function get_locker_by_service() {
                    var service_id = $('#service_id').val();
                    $.post('{{ route('getLockers') }}', {
                            _token: '{{ csrf_token() }}',
                            service_id: service_id
                        },
                        function (data) {
                            $('#locker_id').html(null);
                            $('#locker_id').append($('<option value="">Select A Locker</option>', {}));
                            for (var i = 0; i < data.length; i++) {
                                $('#locker_id').append($('<option>', {
                                    value: data[i].id,
                                    text: data[i].name
                                }));
                            }
                        });
                }
            </script>

@endsection
        
        
 
        
