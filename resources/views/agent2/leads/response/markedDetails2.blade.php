<div class="col-md-12">
      <div class="modal-body ">
        <h2 class="modal-title" id="exampleModalLabel">CATEGORY MARKED LEAD INFORMATION</h2>
        <div class="row">
        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Category</th>
                    <th>Locked Leads</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($categories as $key => $val)
                        @if(count($val->agent2markedLeads) > 0)
                            <tr>
                                <td>{{++$key}}</td>
                                <td> {{$val->name}}</td>
                                <td>{{count($val->agent2markedLeads)}}</td>
                            </tr>
                        @endif
                    @endforeach 
                </tbody>
        </table>                                                         
</div>
</div>
</div>
        