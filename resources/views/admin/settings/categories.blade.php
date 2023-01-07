@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')


@if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
   
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    @if($status == '1')
                        <form action="{{ route('admin.settings.categories.add')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Categories:</label>
                                        <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Categories" required="">
                                    </div>
                                </div>
                                <div class="col-lg-1 m-t-30">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form> 
                    @elseif($status == '2')
                        <form action="{{ route('admin.settings.categories.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{base64_encode($val->id)}}">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Categories:</label>
                                        <input type="text" name="name" value="{{$val->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Categories" required="">
                                    </div>
                                </div>
                                <div class="col-lg-1 m-t-30">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form> 
                    @endif

                
                </div>
            </div>
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
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $key=> $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td class="text-right">
                                            <a href="{{route('admin.settings.categories.edit',base64_encode($val->id))}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="" data-original-title="Edit Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-href="{{route('admin.settings.categories.delete',base64_encode($val->id))}}" class="btn btn-sm btn-danger deleteItem" data-toggle="tooltip" title="" data-original-title="Delete Catogery" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
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
    </script>
@endsection