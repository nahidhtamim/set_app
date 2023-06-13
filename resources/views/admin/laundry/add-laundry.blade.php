@extends('layouts.admin')
 @section('title')
 Add Place - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Places</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/add-place')}}" class="fw-normal">Add Place</a></li>
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
                    <form class="form-horizontal form-material" method="POST" action="{{url('/save-laundry')}}">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <a class="text-light btn btn-success add_row pull-left" id="add_row" style="text-decoration: none;"> <i class="fa fa-plus-square"> Add Row</i> </a>
                            <a class="text-light btn btn-danger delete_row pull-right" style="text-decoration: none;"> <i class="fa fa-minus-square"></i> Delete Row</a>
                            <br>
                            <table class="table table-bordered table-striped mt-5" id="influencer_table">
                                <thead class="text-center">
                                    <tr>
                                        <th><label class=""><b>Customer <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Order No <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Cloth Set <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Washing Program <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Cloth Group <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Cloth Type <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Fabric <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Sportswear Type <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Laundry Description <span class="text-danger">*</span></b></label></th>
                                        {{-- <th><label class=""><b>Status <span class="text-danger">*</span></b></label></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="data_row">
                                    <tr id="locker_row0">
                                        <td>
                                            <select class="form-select shadow-none p-0 border-0" name="customer_id[]" id="customer_id" required>
                                                <option>SET Customer</option>
                                                @forEach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforEach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select shadow-none p-0 border-0" name="order_id[]" id="order_id" required>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select shadow-none p-0 border-0" name="set_id[]" id="set_id" required>
                                                <option value="1">Set 1</option>
                                                <option value="2">Set 2</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="washing_program[]" required>
                                                <option>SET Washing Program</option>
                                                @foreach($washing_programs as $washing_program)
                                                    <option value="{{ $washing_program->id }}">{{ $washing_program->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="cloth_group[]" required>
                                                <option>SET Cloth Group</option>
                                                @foreach($cloth_groups as $cloth_group)
                                                    <option value="{{ $cloth_group->id }}">{{ $cloth_group->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="cloth_type[]" required>
                                                <option>SET Cloth Type</option>
                                                @foreach($cloth_types as $cloth_type)
                                                    <option value="{{ $cloth_type->id }}">{{ $cloth_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="fabric[]" required>
                                                <option>SET Fabric</option>
                                                @foreach($fabrics as $fabric)
                                                    <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="sportswear_type[]" required>
                                                <option>SET Sportswear Type</option>
                                                @foreach($sportswears as $sportswear)
                                                    <option value="{{ $sportswear->id }}">{{ $sportswear->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <textarea rows="5" class="form-control p-0 border-0 laundry_description" name="laundry_description[]" required>
                                                SET Laundry Description
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr id="locker_row1"></tr>
                                </tbody>
                            </table>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>                         
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
          
@endsection
        
        
 
        
