@extends('agent1.includes.master')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Column -->
         <div class="col-lg-3 col-md-6">
             <a href="javascript:void(0)" class="totalDetails1" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
        <div class="col-lg-3 col-md-6">
            <a href="javascript:void(0)" class="freshDetails1" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
                                <h2>{{$total_fresh_leads}}</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="javascript:void(0)" class="pendingDetails1" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="javascript:void(0)" class="markedDetails1" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
            </a>
        </div>             
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Designation</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Category</th>
                                    <th>Source</th>
                                    <th>Created at</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $val)
                                    <tr>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->designation}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->country}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{@$val->category->name}}</td>
                                        <td>{{@$val->source->source}}</td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td>{{@$val->user->name}}</td>
                                        <td><a class="btn btn-sm btn-info viewDetailLeadagent" data-toggle="tooltip" title="" data-original-title="Lead Details" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
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
</div>

@endsection
@section('addScript')
    <script src="{{URL::to('/public/assets/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip'
        });
    });

    $(document).on('click', '.viewDetailLeadagent', function(){
        var id = $(this).data('id');
        $('#leadDetailModal').modal('show');
        $('#leadDetailModalBody').html('<img src="'+host+'/public/assets/images/loader.gif"/>');

        $.get(host+"/agent1/leads/details/"+id, function(data, status){
            $('#leadDetailModalBody').html(data);
        });
    });

    $(document).on('click', '.totalDetails1', function(){
         $.get("{{route('agent1.leads.widget.total')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    $(document).on('click', '.pendingDetails1', function(){
         $.get("{{route('agent1.leads.widget.pending')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });
    $(document).on('click', '.markedDetails1', function(){
         $.get("{{route('agent1.leads.widget.marked')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });
     $(document).on('click', '.freshDetails1', function(){
         $.get("{{route('agent1.leads.widget.fresh')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });
    </script>

@endsection