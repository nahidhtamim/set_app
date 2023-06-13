@extends('layouts.admin')
 @section('title')
 Edit Laundry - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laundry</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/edit-laundry/'.$laundry->id)}}" class="fw-normal">Edit Laundry</a></li>
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
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-laundry/'.$laundry->id)}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Washing Program <span class="text-danger">*</span></b></label>
                                    <select id="inputState" class="form-select shadow-none p-0 border-0 " name="washing_program" required>
                                        <option value="{{ $laundry->washing_program }}" selected>{{ $laundry->washing_program_inf->name }}</option>
                                        <option>============</option>
                                        @foreach($washing_programs as $washing_program)
                                            <option value="{{ $washing_program->id }}">{{ $washing_program->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Cloth Group <span class="text-danger">*</span></b></label>
                                    <select id="inputState" class="form-select shadow-none p-0 border-0 " name="cloth_group" required>
                                        <option value="{{ $laundry->cloth_group }}" selected>{{ $laundry->cloth_group_inf->name }}</option>
                                        <option>============</option>
                                        @foreach($cloth_groups as $cloth_group)
                                            <option value="{{ $cloth_group->id }}">{{ $cloth_group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Cloth Type <span class="text-danger">*</span></b></label>
                                    <select id="inputState" class="form-select shadow-none p-0 border-0 " name="cloth_type" required>
                                        <option value="{{ $laundry->cloth_type }}" selected>{{ $laundry->cloth_type_inf->name }}</option>
                                        <option>============</option>
                                        @foreach($cloth_types as $cloth_type)
                                            <option value="{{ $cloth_type->id }}">{{ $cloth_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Fabric <span class="text-danger">*</span></b></label>
                                    <select id="inputState" class="form-select shadow-none p-0 border-0 " name="fabric" required>
                                        <option value="{{ $laundry->fabric }}" selected>{{ $laundry->fabric_inf->name }}</option>
                                        <option>============</option>
                                        @foreach($fabrics as $fabric)
                                            <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Sportswear <span class="text-danger">*</span></b></label>
                                    <select id="inputState" class="form-select shadow-none p-0 border-0 " name="sportswear_type" required>
                                        <option value="{{ $laundry->sportswear_type }}" selected>{{ $laundry->sportswear_inf->name }}</option>
                                        <option>============</option>
                                        @foreach($sportswears as $sportswear)
                                            <option value="{{ $sportswear->id }}">{{ $sportswear->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Laundry Description <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" class="form-control p-0 border-0" name="laundry_description" required>
                                            SET Laundry Description
                                        </textarea>
                                    </div>
                                </div>
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
        
        
 
        
