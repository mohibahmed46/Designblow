<div class="col-md-12">
      <div class="modal-body ">
        <h2 class="modal-title" id="exampleModalLabel">PENDING LEAD INFORMATION</h2>
        <div class="row">
        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Users</th>
                    <th>Pending Count</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($data as $key => $val)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$val->name}}</td>
                            <td>{{count($val->pendingLeads)}}</td>
                        </tr>
                    @endforeach 
                </tbody>
        </table>                                                         
</div>
</div>
</div>
        