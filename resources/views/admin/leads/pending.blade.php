@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')

<div class="container-fluid">
    
    <div class="row">
        <!-- Column -->
         <div class="col-lg-4 col-md-6">
            <a href="javascript:void(0)" class="totalDetails" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
            <a href="javascript:void(0)" class="pendingDetails" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
     
        <div class="col-lg-4 col-md-6">
            <a href="javascript:void(0)" class="markedDetails" data-toggle="tooltip" title="" data-original-title="Lead Details">
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
    <div class="row">
        <!-- Column -->
     
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">

                <div class="card-body">
                    <h3 class="add-lead-head">Assigned Leads</h3>
                    <div class="table-responsive m-t-40">                                  
                   
                        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Full Name</th>
                                    <th>Designation</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Category</th>
                                    <th>Source</th>
                                    <th>Created at</th>
                                    <th>Assigned User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $key=> $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->designation}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->country}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{@$val->category->name}}</td>
                                        <td>{{@$val->source->source}}</td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td>{{@$val->assigned->name}}</td>
                                        <td>
                                         <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success viewRemarks" data-id="{{$val->id}}">{{count($val->remarks)}} <i class="fa fa-comment"></i></a> -->   
                                        <a class="btn btn-sm btn-info viewDetailLead" data-toggle="tooltip" title="" data-original-title="Lead Details" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a>
                                         <!-- <a href="javascript:void(0)" data-href="{{route('admin.leads.mark',base64_encode($val->id))}}" class="btn btn-sm btn-primary checkItem"><i class="fa fa-check"></i></a> -->   
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="10"></td>
                                    </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div>{{$leads->links()}}</div>
                </div>
            </div>
        </div>
<style>
</style>


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

            <div class="modal fade" id="followupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row" id="followupModalBody">
                        
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
    $(document).ready(function(){

    $(document).on('click', '.checkItem', function(){
      var link = $(this).data('href');
      if(confirm('Are you sure want to check this Record?')){
        window.location.href = link;
      }
    });

    $(document).on('click', '.pendingDetails', function(){
         $.get("{{route('admin.leads.widget.pending')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    $(document).on('click', '.markedDetails', function(){
         $.get("{{route('admin.leads.widget.marked')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

    $(document).on('click', '.totalDetails', function(){
         $.get("{{route('admin.leads.widget.total')}}", function(data){

            $('#leadDetailModalBody').html(data);
             $('#leadDetailModal').modal('show');
     });
    });

  });

//     $(document).ready(function(){

//   $(document).on('click', '.viewRemarks', function(){
//     var id = $(this).data('id');
//     $.get("{{URL::to('/')}}/admin/leads/viewRemarks/"+id, function(data){

//       $('#leadRemarksModalBody').html(data);
//       $('#leadRemarksModal').modal('show');
//     });
//   });
// });

    </script>

@endsection