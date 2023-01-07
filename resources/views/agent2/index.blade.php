@extends('agent2.includes.master')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Column -->
         <div class="col-lg-4 col-md-6">
            <a href="javascript:void(0)" class="totalDetails2" data-toggle="tooltip" title="" data-original-title="Lead Details">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->

                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Total Leads</h6>
                                <h2>{{$total_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="javascript:void(0)" class="pendingDetails2" data-toggle="tooltip" title="" data-original-title="Lead Details">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Your Assigned Leads</h6>
                                <h2>{{$total_pending_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="javascript:void(0)" class="markedDetails2" data-toggle="tooltip" title="" data-original-title="Lead Details">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Your Locked Leads</h6>
                                <h2>{{$total_marked_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
            </a>
        </div>             
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $val)
                                    <tr>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->country}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{@$val->category->name}}</td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td><a class="btn btn-sm btn-info viewDetailLeadagent" data-toggle="tooltip" title="" data-original-title="Lead Details" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="col-lg-3 col-md-12">
        <div class="card">
            <div class="card-body bg-inverse" style="background: url(../assets/images/background/user-info.jpg) / cover;">
                <h4 class="text-white card-title">Follow-Up</h4>
                <h6 class="card-subtitle text-white m-0 op-5">Checkout Upcoming Follow-up here</h6>
            </div>
            <div class="card-body" style="padding: 0px;">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-info waves-effect waves-dark"><a href="{{route('agent2.leads.followup.upcoming')}}"><i class="fa fa-eye"></i></a></button></h2>
                    <div class="message-widget contact-widget">
                        <!-- Message -->
                        @foreach($followup as $key=> $val)
                        <a href="javascript:void(0)" class="upcommingFollowTray viewDetailLeadagent2" data-id="{{base64_encode($val->id)}}">
                            <div class="mail-contnet">
                                <h5>{{$val->name}}</h5><span class="mail-desc">{{$val->mobile}}</span>@if((date('Y-m-d') == $val->followup_date))
                                  <label class="badge badge-danger">Today</label>
                                @else
                                  <label class="badge badge-info">Tommorow</label>
                                @endif
                            </div>
                        </a>
                        @endforeach
                                @if(count($followup) == '0')
                                    <div class="col-md-12">
                                       <h4 class="m-t-10">No followup available.</h4>
                                    </div>
                                @endif
                        <a href="javascript:void(0)" id="loadmore" class="btn btn-sm">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



            
@endsection
@section('addScript')
    <script src="{{URL::to('/public/assets/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip'
        });

        var size_li = $(".contact-widget .upcommingFollowTray").length;
        var x=6;
        $('.upcommingFollowTray:lt('+x+')').css({display: 'block'});
        if(size_li <= 6){
            $('#loadmore').hide();
        }
        $('#loadmore').click(function () {
            x= (x+3 <= size_li) ? x+3 : size_li;
            $('.contact-widget .upcommingFollowTray:lt('+x+')').css({display: 'block'});
            if(x >= size_li){
                $('#loadmore').hide();
            }
        });
    });

     $(document).on('click', '.checkItem', function(){
      var link = $(this).data('href');
      if(confirm('Are you sure want to check this Record?')){
        window.location.href = link;
      }
        
    });

    $(document).on('click', '.viewDetailLeadagent', function(){
        var id = $(this).data('id');
        $('#leadDetailModal').modal('show');
        $('#leadDetailModalBody').html('<img src="'+host+'/public/assets/images/loader.gif"/>');

        $.get(host+"/agent2/leads/details/"+id, function(data, status){
            $('#leadDetailModalBody').html(data);
        });
    });

    $(document).on('click', '.pendingDetails2', function(){
         $.get("{{route('agent2.leads.widget.pending')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    $(document).on('click', '.markedDetails2', function(){
         $.get("{{route('agent2.leads.widget.marked')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    $(document).on('click', '.totalDetails2', function(){
         $.get("{{route('agent2.leads.widget.total')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    </script>

@endsection