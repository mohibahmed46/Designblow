<div class="col-md-12">
  <div class="remarks-body">
    <div class="modal-body">
      <!-- <h2 class="modal-title" id="exampleModalLabel">REMARKS INFORMATION</h2> -->
      <div class="row">
          <div class="col-lg-12">
            <h3 class="add-lead-head">REMARKS INFORAMTION</h3>
            <form action="{{route('admin.leads.response.remarks')}}" method="post">
              @csrf
              <input type="hidden" name="lead_id" value="{{$lead_id}}">
              <textarea rows="5" placeholder="Add Remarks" name="remarks" class="form-control"></textarea>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>   
      </div>
      <div class="row">
          <div class="col-lg-12">
            <h3 class="add-lead-head">REMARKS HISTORY</h3>
            @foreach($remarks as $val)
            <div class="history">
                <p>{{$val->remarks}}</p>
                <p class="text-right p-one"><b>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</b>
                  <br>By: <b>{{@$val->user->name}}</b></p>
            </div>
            @endforeach
            @if(count($remarks) == 0)
              <h6>&nbsp;&nbsp;&nbsp;No Remarks Found.</h6>
            @endif
          </div>
      </div>
    </div>
  </div>
</div>