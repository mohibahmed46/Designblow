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
                    <h3 class="add-lead-head">New Leads</h3>
                  <form action="{{route('admin.leads.assign')}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <select class="form-control custom-select" name="user_id" required>
                                                <option value="">User *</option>
                                                @foreach($users as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                                
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <select class="form-control custom-select" name="category_id" required>
                                                <option value="">Category *</option>
                                                @foreach($categories as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                                
                            </div>
                             <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="number" class="form-control" name="num_list" placeholder="Number of leads *" required>
                                        </div>
                                    </div>                                                
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Assign</button>
                                            <a href="" class="btn btn-secondary">Cencel</a>
                                        </div>
                                    </div>                                                
                                </div>
                        </div>
                    </div>
                    </form>  
                </div>
            </div>
            <div class="card">

                <div class="card-body">

                    <!-- <h3 class="add-lead-head">New Leads</h3> -->
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
                                    <th>User</th>
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
                                        <td>{{@$val->user->name}}</td>
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

    </script>

@endsection