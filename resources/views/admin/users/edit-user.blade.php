@extends('layouts.admin')
 @section('title')
 Edit User - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">User</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/edit-user/'.$user->id)}}" class="fw-normal">Edit User</a></li>
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
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-user/'.$user->id)}}">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Username <span class="text-danger">*</span></b> <small>[Read Only]</small> </label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$user->name}}"
                                            class="form-control p-0 border-0" name="name" readonly> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Email <span class="text-danger">*</span></b> <small>[Read Only]</small> </label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$user->email}}"
                                            class="form-control p-0 border-0" name="email" readonly> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Address  <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$user->address}}"
                                            class="form-control p-0 border-0" name="address" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Phone  <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$user->phone}}"
                                            class="form-control p-0 border-0" name="phone" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Image  <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <br>
                                    <span class="">
                                        <img class="rounded-circle"
                                        src="{{ asset('/uploads/avatars/'.$user->image) }}"
                                        width="150px" alt="#" />
                                    </span>
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

                @if($user->role_as == '1')
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-password/'.$user->id)}}">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Password <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="password" type="password" 
                                        class="form-control p-0 border-0"
                                        name="password" required
                                        autocomplete="new-password"> 
                                        <p class="text-danger">{{$errors->first('password')}}</p>  
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password-confirm"
                                                class=""><b>Confirm Password <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="password-confirm" type="password" 
                                        class="form-control p-0 border-0"
                                        name="password_confirmation" required
                                        autocomplete="new-password"> 
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
                @endisset
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
          
@endsection
        
        
 
        
