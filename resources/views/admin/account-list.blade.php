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
                  @if ($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                <div class="card-header py-3">
                         <a href="{{route('account.add')}}" class="h3 text-white-800 btn btn-primary" style="margin-left: 92%;"> + Add</a>
                        </div>
                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Account List</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Account Holder Name</th>
                                            <th>A/C No.</th>
                                            <th>IFSC Code</th>
                                            <th>Bank Name</th>
                                            <th>UPI Id</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($data))
                                    @foreach($data as $key => $product)
                                        <tr>
                                          @if(Auth::user()->id == $product->user_id)
                                            <td>{{$product->holder_name}}</td>
                                            <td>{{$product->account_no}}</td>
                                            <td>{{$product->ifsc_code}}</td>
                                            <td>{{$product->bank_name}}</td>
                                            <td>{{$product->upi}}</td>
                                           <td><a  class="btn btn-primary btn-sm" href="{{ route('account.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i></a></td> 
                                            <td><form action="{{ route('account.delete', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete it?');"><i class="fas fa-fw fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                     @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
