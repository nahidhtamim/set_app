@extends('layouts.admin')
 @section('title')
 Edit Service - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Clothes</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/edit-cloth/'.$cloth->id)}}" class="fw-normal">Edit Cloth</a></li>
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
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-cloth/'.$cloth->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>RFID Code <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->hexa_code}}"
                                            class="form-control p-0 border-0" name="hexa_code" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Customer ID <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="customer_id" id="customer_id" required>
                                            <option value="{{$cloth->customer_id}}">{{$cloth->customer_inf->name}}</option>
                                            <option>=====================</option>
                                            <option>SET Customer</option>
                                            @forEach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforEach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Order ID <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="order_id" id="order_id" required>
                                            <option value="{{$cloth->order_id}}">{{$cloth->order_id}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Service ID<span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->service_id}}"
                                            class="form-control p-0 border-0" name="service_id" id="service_id" required readonly> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Set ID<span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="number" value="{{$cloth->set_id}}"
                                            class="form-control p-0 border-0" name="set_id" required> 
                                        </div>
                                </div>
                                {{-- <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Cloth Type/Name<span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->cloth_type}}"
                                            class="form-control p-0 border-0" name="cloth_type" required> 
                                        </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Size<span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->size}}"
                                            class="form-control p-0 border-0" name="size" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Color <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="color" value="{{$cloth->color}}"
                                            class="form-control p-0 border-0" name="color" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Fabric <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->fabric}}"
                                            class="form-control p-0 border-0" name="fabric" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Weight <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->weight}}"
                                            class="form-control p-0 border-0" name="weight" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Brand <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$cloth->brand}}"
                                            class="form-control p-0 border-0" name="brand" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Cloth Image <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" class="form-control p-0 border-0" name="image">
                                        <br>
                                        <img src="/uploads/clothes/{{$cloth->image}}" alt="" width="100px">
                                    </div>
                                </div>     --}}
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update</button>
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
            
          
@endsection
        
        
 
        
