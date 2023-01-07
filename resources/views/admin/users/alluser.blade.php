@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Column -->
     
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">

                <div class="card-body">
                    <h3 class="add-lead-head">All User</h3>
                    <div class="table-responsive m-t-40">                                  
                   
                        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=> $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>

                                            @if($val->role_id == '1')
                                                <span class="badge badge-primary">Admin</span>
                                            @elseif($val->role_id == '2')
                                                <span class="badge badge-info">Data Entry Agent</span>
                                                @elseif($val->role_id == '3')
                                                <span class="badge badge-success">Calling Agent </span>
                                            @endif

                                        </td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td>
                                             @if($val->id != '1')
                                        <a  href="{{route('admin.users.updateuser',base64_encode($val->id))}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="" data-original-title="Edit Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-href="{{route('admin.users.alluser.delete',base64_encode($val->id))}}" class="btn btn-sm btn-danger deleteItem" data-toggle="tooltip" title="" data-original-title="Delete Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                                            @endif   
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="10"></td>
                                    </tr> 
                            </tbody>
                        </table>
                    </div>
                    <div>{{$users->links()}}</div>
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

    $('.checkItem').click(function(){
      var link = $(this).data('href');
      if(confirm('Are you sure want to check this Record?')){
        window.location.href = link;
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

$(document).ready(function(){

    $('.deleteItem').click(function(){
      var link = $(this).data('href');
      if(confirm('Are you sure want to delete this User?')){
        window.location.href = link;
      }
    });
  });   

    </script>

@endsection