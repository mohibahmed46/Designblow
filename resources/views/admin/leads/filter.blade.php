@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')

<!-- 
@if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif -->
   
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" class="form-horizontal">
                @csrf
                <h3 class="add-lead-head">Filter Leads</h3>
                <div class="row m-t-30">
                    <div class="col-md-3">
                        <label>From Date</label>                                                        
                        <input type="date" class="form-control" name="fromdate" placeholder="From Date *" value="{{empty($search['fromdate']) ? date('Y-m-d') : $search['fromdate']}}" required>
                    </div>
                    <div class="col-md-3">
                            <label>To Date</label>                                                        
                                <input type="date" class="form-control" name="todate" placeholder="To Date *" value="{{empty($search['todate']) ? date('Y-m-d') : $search['todate']}}" required>
                    </div>
                    <div class="col-md-3">
                            <label>Full Name</label>                                                        
                                <input type="text" class="form-control" name="fullname" value="{{@$search['fullname']}}" placeholder="">
                    </div>
                    <div class="col-md-3">
                        
                            <label>Mobile Number</label>                                                        
                                <input type="text" class="form-control" name="mobile" placeholder="" value="{{@$search['mobile']}}">
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-5">
                            <label>Email</label>                                                        
                                <input type="email" class="form-control" name="email" placeholder="" value="{{@$search['email']}}">
                    </div>
                    <div class="col-md-3">
                                <label>Category</label>
                                <select class="form-control custom-select" name="category_id" value="{{@$search['category_id']}}">
                                    <option value="">Category *</option>
                                    @foreach($categories as $val)
                                        <option value="{{$val->id}}"
                                            @if(!empty($search['category_id']))
                                                {{$search['category_id'] == $val->id ? 'selected' : ''}}
                                            @endif
                                            >
                                            {{$val->name}}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-md-2">
                                <label>Source</label> 
                                <select class="form-control custom-select" name="source_id">
                                    <option value="">Source *</option>
                                    @foreach($source as $val)
                                        <option value="{{$val->id}}" 
                                            @if(!empty($search['source_id']))
                                                {{$search['source_id'] == $val->id ? 'selected' : ''}}
                                            @endif
                                        >
                                        {{$val->source}}
                                    </option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-md-2">
                        
                                <label>Status</label> 
                                <select class="form-control custom-select" name="status" value="{{@$search['status']}}">
                                    <option value="">Status *</option>
                                    
                                        <option value="1" {{!empty($search['status']) && $search['status'] == '2' ? 'selected' : ''}}>Pending</option>
                                        <option value="3" {{!empty($search['status']) && $search['status'] == '3' ? 'selected' : ''}}>Marked</option>

                                    
                                </select>
                    </div>
                </div>
                <button  class="btn btn-primary m-t-20">Filter</button>
                <a href="{{route('admin.leads.filter')}}"  class="btn btn-secondary m-t-20">Reset</a>
            </form>
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
                                    <th>Sr.No</th>
                                    <th>Catogries</th>
                                    <th>Designation</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Category</th>
                                    <th>Source</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>User</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=> $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->designation}}</td>
                                        <td>{{$val->city}}</td>
                                        <td>{{$val->country}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{@$val->category->name}}</td>
                                        <td>{{@$val->source->source}}</td>
                                        <td>
                                            @if($val->status == '2')
                                                <span class="badge badge-primary">Pending</span>
                                            @elseif($val->status == '3')
                                                <span class="badge badge-info">Marked</span>
                                            @endif
                                        </td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td>{{@$val->user->name}}</td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success viewRemarks" data-id="{{$val->id}}">{{count($val->remarks)}} <i class="fa fa-comment"></i></a>
                                            <!-- <a  href="{{route('admin.settings.categories.edit',base64_encode($val->id))}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="" data-original-title="Edit Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-edit"></i></a> -->
                                            <!-- <a href="javascript:void(0)" data-href="{{route('admin.settings.categories.delete',base64_encode($val->id))}}" class="btn btn-sm btn-danger deleteItem" data-toggle="tooltip" title="" data-original-title="Delete Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a> -->
                                            <!-- @if($val->status == 2)
                                            <a href="javascript:void(0)" data-href="{{route('admin.leads.mark',base64_encode($val->id))}}" class="btn btn-sm btn-primary checkItem"><i class="fa fa-check"></i></a>
                                            @endif -->  
                                        </td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
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


@endsection
@section('addScript')
<script>
    $(document).ready(function(){

    $('.deleteItem').click(function(){
      var link = $(this).data('href');
      if(confirm('Are you sure want to delete this Post?')){
        window.location.href = link;
      }
    });
  });
</script>

<script src="{{URL::to('/public/assets/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip'
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