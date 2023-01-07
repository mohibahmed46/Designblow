<div class="col-md-12">
  <div class="remarks-body">
    <div class="modal-body">
      <!-- <h2 class="modal-title" id="exampleModalLabel">REMARKS INFORMATION</h2> -->
      <div class="row">
          <div class="col-lg-12">
            <h3 class="add-lead-head">Follow-up INFORAMTION</h3>
            <form action="{{route('admin.leads.response.followupDetails')}}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$id}}">
              <div class="col-md-12">
                <label>From Date</label>                                                        
                <input type="date" class="form-control" name="followup_date" placeholder="From Date *" value="{{$lead->followup_date}}" required>
              </div>
              <div class="col-md-12">
                <label>Follow-Up Remarks</label>  
                <textarea rows="5" placeholder="Follow-Up Remarks" name="followup_remarks" class="form-control">{{$lead->followup_remarks}}</textarea>
              </div>
              <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>   
      </div>
    </div>
  </div>
</div>