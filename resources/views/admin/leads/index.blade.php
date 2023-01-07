@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
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
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Total Converted Leads</h6>
                                <h2>0</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-main">
                <div class="card-body main-panel">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-3 p-l-0 p-r-0" align="center">
                            <img src="{{URL::to('/public/assets/')}}/images/icon.png" width="70px">
                        </div>
                        <div class="col-9">
                            <div class="sec-1">
                                <h6>Total Pending Leeds</h6>
                                <h2>0</h2> 
                            </div>
                                                                   
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">

                <div class="card-body">
                    <a href="{{route('admin.leads.add')}}" class="btn btn-info waves-effect waves-light add-lead">ADD NEW LEADS</a>
                        <button class="btn btn-info waves-effect waves-light add-csv" type="button">ADD CSV FILE
                        <span class="btn-label"><i class="fa fa-heart"></i></span></button>
                    <div class="table-responsive m-t-40 lead-book-table">                                  
                   
                        <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                            <tfoot>
                                <tr>
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
                            </tfoot>
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