
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
                        </div>
                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Game</h6>
                        </div>

                        <div class="card-body">
                    <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" action="{{url('storeproduct')}}" Method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id" value="{{isset($Product->id) ?$Product->id :''}}">
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="product_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Product Name" value="{{isset($Product->product_name)? $Product->product_name: ''}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="product_price" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Product Price"  value="{{isset($Product->product_price)? $Product->product_price: ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="product_picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        <input type="hidden" name="file_name" value="{{isset($Product->product_picture)? $Product->tproduct_picture: ''}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="product_title1" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Title1" value="{{isset($Product->title_one)? $Product->title_one: ''}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="product_title2"  class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Title2" value="{{isset($Product->title_two)? $Product->title_two: ''}}">
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
