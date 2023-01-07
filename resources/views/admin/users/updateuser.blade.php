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
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.users.updateUser')}}" method="post" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{base64_encode($data['id'])}}">
                <h3 class="add-lead-head">Update User</h3>
                <div class="row m-t-30">
                    <div class="col-md-3">
                        <label>Name</label>                                                        
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$data['name']}}" required>
                    </div>

                       <div class="col-md-3">
                        <label>User Name</label>                                                        
                        <input type="text" class="form-control" name="username" placeholder="User Name" value="{{$data['username']}}" required>
                    </div>
                    <div class="col-md-3">
                        
                            <label>Email</label>                                                        
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$data['email']}}">
                    </div>
                    <div class="col-md-3">
                            <label>Role</label>                                                        
                                <select class="form-control custom-select" name="role_id" value="{{$data['role_id']}}">
                                    <option value="">Role</option>
                                    <option value="1" {{!empty($data['role_id']) && $data['role_id'] == '1' ? 'selected' : ''}}>Admin</option>
                                    <option value="2" {{!empty($data['role_id']) && $data['role_id'] == '2' ? 'selected' : ''}}>Data Entry Agent</option>
                                    <option value="3" {{!empty($data['role_id']) && $data['role_id'] == '3' ? 'selected' : ''}}>Calling Agent </option>
                                </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-20">Save</button>
                <a href="{{route('admin.users.alluser')}}"  class="btn btn-secondary m-t-20">Cencel</a>
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