@extends('admin.includes.master')
@section('title', 'Add User')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="form-horizontal">
                        @csrf
                        <h3 class="add-lead-head">User Information</h3> 
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-body">

                                                               
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <input type="text" class="form-control" name="fullname" placeholder="Full Name *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <input type="email" class="form-control" name="email" placeholder="Email *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <input type="text" class="form-control" name="username" placeholder="Username *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <input type="password" class="form-control" name="password" placeholder="Password *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">                                                        
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="form-control custom-select" name="role_id" required>
                                                <option value="">Role *</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Data Entry Agent</option>
                                                <option value="3">Calling Agent </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                                                                     
                            </div>                                        
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 text-center col-md-12">
                                            <button type="submit" class="btn btn-success search-submit" style="background:#00d664;">Update Record</button> 
                                            <button type="reset" class="btn btn-success search-submit">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection
@section('addScript')


@endsection