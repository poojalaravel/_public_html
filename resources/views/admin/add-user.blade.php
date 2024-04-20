
@extends('admin.layout')
@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                 @include('admin.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card-header py-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        </div>
                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
                        </div>

                        <div class="card-body">
                    <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" action="{{url('store')}}" Method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id" value="{{isset($Product->id) ?$Product->id :''}}">
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="Username" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="User Name" value="{{isset($Product->name)? $Product->name: ''}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="E-Mail"  value="{{isset($Product->email)? $Product->email: ''}}">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        <input type="hidden" name="profile_name" value="{{isset($Product->product_picture)? $Product->tproduct_picture: ''}}">
                                        </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" value="{{isset($Product->password)? $Product->password: ''}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation"  class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirm Password" value="{{isset($Product->password)? $Product->password: ''}}">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" name="game_name"  class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Add Game Name" value="{{isset($Product->game_name)? $Product->game_name: ''}}">
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <select class="form-control form-select form-select-sm" name="plan" aria-label=".form-select-sm example">
                                        <option selected>Select Plan</option>
                                        <option value="Plan 1-999 USDT">Plan 1-999 USDT</option>
                                        <option value="Plan 2-1599 USDT">Plan 2-1599 USDT</option>
                                        <option value="PLAN 3-1999 USDT">PLAN 3-1999 USDT</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user float-right" type="submit">
                                    Submit
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



@endsection
