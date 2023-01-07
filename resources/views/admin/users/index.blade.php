@extends('admin.includes.master')
@section('title', 'Users')
@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 align-self-center">
                            <h2 class="text-themecolor">Users</h2>
                        </div>
                        <div class="col-md-7 align-self-center">
                            <a href="{{route('admin.users.add')}}" class="btn btn-info waves-effect waves-light add-lead pull-right">ADD USER</a>
                        </div>
                    </div>
      
                    <div class="table-responsive m-t-40">
                        <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               @foreach($data as $key => $val)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{$val->username}}</td>
                                        <td>
                                            @switch($val->role_id)
                                                @case('1')
                                                    <span class="badge badge-primary">Admin</span>
                                                    @break

                                                @case('2')
                                                    <span class="badge badge-info">Data Entry Agent</span>
                                                    @break

                                                @case('3')
                                                    <span class="badge badge-warning">Calling Agent </span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($val->status)
                                                @case('1')
                                                    <span class="badge badge-success">Active</span>
                                                    @break

                                                @case('2')
                                                    <span class="badge badge-danger">Blocked</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                        <td><a class="btn btn-sm btn-info viewDetailLead" data-toggle="tooltip" title="" data-original-title="Lead Details" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    </script>

@endsection