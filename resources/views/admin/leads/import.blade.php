@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')


<!-- @if ($errors->any())
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
            <form action="{{route('adminImport')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <h3 class="add-lead-head">Import Leads Information</h3>
                <div class="row m-t-30">
                    <div class="col-md-4">
                    <div class="Sample-file">
                    <label>Download file:</label>
                        <a href="{{URL::to('/public/abc.csv')}}" target="_blank">Sample file <i class="mdi mdi-download"></i></a>                                                      
                        <input type="file" class="form-control" name="file" accept=".csv" placeholder="Enter Name" value="" required>
                    </div>
                    </div>
                <div class="col-md-4">
                    <label>Category</label>
                    <select class="form-control custom-select" name="category_id" required>
                        <option value="">Select Category *</option>
                        @foreach($categories as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Source</label>
                    <select class="form-control custom-select" name="source" required>
                        <option value="">Select Source  *</option>
                        @foreach($source as $val)
                            <option value="{{$val->id}}">{{$val->source}}</option>
                        @endforeach
                    </select>                                                
                </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-20">Upload</button>
                <a href=""  class="btn btn-secondary m-t-20">Cencel</a>
            </form>
        </div>
    </div>
    <!-- Row -->

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