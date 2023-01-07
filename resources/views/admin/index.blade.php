@extends('admin.includes.master')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Column -->
         <div class="col-lg-3 col-md-6">
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
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->

                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>New Leads</h6>
                                <h2>{{$fresh_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Assigned Leads</h6>
                                <h2>{{$total_pending_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Locked Leads</h6>
                                <h2>{{$total_marked_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
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
                                    <th>Sr.No</th>
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
                                @foreach($leads as $key=> $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->country}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{@$val->category->name}}</td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td>
                                            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success viewRemarks" data-id="{{$val->id}}">{{count($val->remarks)}} <i class="fa fa-comment"></i></a> -->
                                            <a class="btn btn-sm btn-info viewDetailLead" data-toggle="tooltip" title="" data-original-title="Lead Details" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="leadDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row" id="leadDetailModalBody">
                        
                    </div>
                </div>
            </div>
        </div>

            <div class="modal fade" id="leadRemarksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="row" id="leadRemarksModalBody">
                            </div>
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
                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-info waves-effect waves-dark"><a href="{{route('admin.leads.followup.upcoming')}}"><i class="fa fa-eye"></i></a></button></h2>
                    <div class="message-widget contact-widget">
                        <!-- Message -->
                        @foreach($followup as $key=> $val)
                        <a href="javascript:void(0)" class="upcommingFollowTray viewDetailLead" data-id="{{base64_encode($val->id)}}">
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



    $(document).ready(function(){

  $(document).on('click', '.viewRemarks', function(){
    var id = $(this).data('id');
    $.get("{{URL::to('/')}}/admin/leads/viewRemarks/"+id, function(data){

      $('#leadRemarksModalBody').html(data);
      $('#leadRemarksModal').modal('show');
    });
  });
});
    </script>

@endsection