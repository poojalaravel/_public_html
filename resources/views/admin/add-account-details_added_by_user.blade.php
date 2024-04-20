
@extends('admin.layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                @if ($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <strong>Your transaction completed successfully!</strong>
                        </div>
                    @endif
                        </div>
                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Account</h6>
                        </div>

                        <div class="card-body">
                    <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" action="{{url('store_by_user')}}" Method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id" value="{{isset($Account->id)? $Account->id:''}}">
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="holder_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Holder Name" value="{{isset($Account->holder_name)? $Account->holder_name: ''}}">
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="account_no" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Account Number" value="{{isset($Account->account_no)? $Account->account_no: ''}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                                        <input type="text" name="ifsc_code"  class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="IFSC Code" value="{{isset($Account->ifsc_code)? $Account->ifsc_code: ''}}">
                                    </div>
                                    
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                                        <input type="text" name="bank_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Bank Name"  value="{{isset($Account->bank_name)? $Account->bank_name: ''}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                                        <input type="text" name="upi" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="UPI Id"  value="{{isset($Account->upi)? $Account->upi: ''}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                                        <input type="text" name="game_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Game Name"  value="{{isset($Account->game_name)? $Account->game_name: ''}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                                        <input type="text" name="amount" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Enter Amount"  value="{{isset($Account->amount)? $Account->amount: ''}}">
                                    </div>
                                </div>
                                @isset($Account->id)
                                <button class="btn btn-primary btn-user float-right" type="submit">
                                    Withdraw
                                </button>
                                @else
                                <button class="btn btn-primary btn-user float-right" type="submit">
                                    Submit
                                </button>
                                @endif
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
