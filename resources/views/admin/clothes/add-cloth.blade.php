@extends('layouts.admin')
 @section('title')
 Add Service - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Cloth</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/add-cloth')}}" class="fw-normal">Add Cloth</a></li>
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

                            <form class="form-horizontal form-material" method="POST" action="{{url('/save-cloth')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Hexa Code <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Hexa Code"
                                            class="form-control p-0 border-0" name="hexa_code" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Customer ID <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="customer_id" id="customer_id" required>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Size<span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Size"
                                            class="form-control p-0 border-0" name="size" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Color <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Color"
                                            class="form-control p-0 border-0" name="color" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Fabric <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Fabric"
                                            class="form-control p-0 border-0" name="fabric" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Weight <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Weight"
                                            class="form-control p-0 border-0" name="weight" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Brand <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="SET Brand"
                                            class="form-control p-0 border-0" name="brand" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Cloth Image <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" class="form-control p-0 border-0" name="image">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Wash Program Status</b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="checkbox" name="wash_program_number" class="">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Dryer Program Status</b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="checkbox" name="dryer_program_number" class="">
                                    </div>
                                </div>        
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Save</button>
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
        
        
 
        
