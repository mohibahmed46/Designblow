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
            <form action="{{route('admin.users.post')}}" method="post" class="form-horizontal">
                @csrf
                <h3 class="add-lead-head">Add New User</h3>
                <div class="row m-t-30">
                    <div class="col-md-3">
                        <label>Name</label>                                                        
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="" required>
                    </div>

                       <div class="col-md-3">
                        <label>User Name</label>                                                        
                        <input type="text" class="form-control" name="username" placeholder="User Name" value="" required>
                    </div>
                    <div class="col-md-3">
                        
                            <label>Email</label>                                                        
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                    </div>
                    <div class="col-md-3">
                            <label>Role</label>                                                        
                                <select class="form-control custom-select" name="role_id" value="">
                                    <option value="">Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Data Entry Agent</option>
                                    <option value="3">Calling Agent </option>
                                </select>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-3">
                        <label>Password</label>                                                        
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" value="" required>
                    </div>

                       <div class="col-md-3">
                        <label>Confirm Password</label>                                                        
                        <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" value="" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-20">Save</button>
                <a href="{{route('admin.users.addnew')}}"  class="btn btn-secondary m-t-20">Cencel</a>
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