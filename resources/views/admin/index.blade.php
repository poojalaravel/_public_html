@extends('admin.layout')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
<style>
    .text-white-50 {
    color: white !important;
}
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>
        @include('admin.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        
            <!-- Main Content -->
            <div id="content">
                @include('admin.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="loading" style="display:none">Loading&#8230;</div>

                    <div class="content"> @if($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <strong>Your transaction completed successfully! Kindly visit to back after 2hrs</strong>
                        </div>
                    @endif</div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        @if(Auth::User()->admin_type == 2)
                        <a href="#"  id="sip_trunk_tab" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="sip_trunk(id)"> <i class="fas fa-check fa-sm text-green-500" aria-hidden="true" id="sip_trunk_tab_check" style="display:none">  </i> Sip Trunk
                                </a>
                        @php 
                        $proxy = \DB::table('settings')->where('proxy_id', Auth::User()->id)->limit(1)->get();
                        $ips = \DB::table('settings')->where('ip_id', Auth::User()->id)->limit(1)->get();
                        
                        @endphp
                        @if(isset($proxy[0]->proxy_id))
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> 
                                Proxy Connected</a>
                                @else
                               
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLong"> 
                                Proxy Tab</a>
                                @endif
                                @if(isset($ips[0]->ip_id))
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> 
                                Connected Ip Address</a>
                                @else
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalLong11"> 
                                Ip Address</a>
                                @endif
                               
                        @php 
                        $value = \App\Models\Account::where(['user_id' => Auth::User()->id])->first('id');
                        @endphp
                        @if(!$value)
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> 
                                <i class="fas fa-id-card fa-sm text-white-50" aria-hidden="true" id="getpercent"></i></a>
                        <a href="{{route('user.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Account</a>
                        @else
                        <a href="{{route('editbyuseraccount.byuser', $value)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> 
                                <i class="fas fa-id-card fa-sm text-white-50" aria-hidden="true" id="getpercent"></i></a>
                        <!-- <a href="{{route('editbyuseraccount.byuser', $value)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Account</a> -->
                        @endif
                        @endif
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Per Hours)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="Earnings"> INR 40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Per Day)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> INR 215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->
<div class="modal fade" id="exampleModalLong11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">IP Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" action="{{url('addips')}}" Method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id" value="">
                            <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="ips_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Add IP">
                                    </div>
                                    
                                </div>
                               
                                <button type="button" class="btn btn-secondary btn-user float-right" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary btn-user float-right" type="submit">
                                    Submit
                                </button>
                            </form>
      </div>
      <div class="modal-footer">
        
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Proxy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" action="{{url('addproxy')}}" Method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id" value="">
                            <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="proxy_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Add Proxy">
                                    </div>
                                    
                                </div>
                               
                                <button type="button" class="btn btn-secondary btn-user float-right" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary btn-user float-right" type="submit">
                                    Submit
                                </button>
                            </form>
      </div>
      <div class="modal-footer">
        
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include('admin.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<script>
var count = 9;
var counterIncrement=100;

var counter = setInterval(timer, 500); 

function timer() {
  count = count+counterIncrement;

  var percent = ((3 / 100) * count).toFixed(3);
  if (count == 0 || count == 10 ) {
        counterIncrement = +counterIncrement;
        
    }

  const element = document.getElementById("Earnings").innerHTML ='INR '+count;
  const percen =document.getElementById('Earnings').value;
 
  
  const pc = document.getElementById("getpercent").innerHTML =' INR '+ percent;
}



 
function fun() {  
    $(".loading").hide();
    $('#sip_trunk_tab_check').show();
    
}  
function sip_trunk(id) {
    $(".loading").show();
    a = setTimeout(fun, 2000);  
}


//connect Sip

</script>


@endsection
