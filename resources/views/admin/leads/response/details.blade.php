<div class="col-md-12">
      <div class="modal-body ">
        <h2 class="modal-title" id="exampleModalLabel">LEAD INFORMATION</h2>
        <!-- <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-sm btn-success viewRemarks" data-id="{{$data->id}}" id="pending-remarks-btn"><i class="fa fa-comment"></i> Remarks: {{count($data->remarks)}} </a>
                <a href="javascript:void(0)" data-href="{{route('admin.leads.mark',base64_encode($data->id))}}" class="btn btn-sm btn-primary checkItem" id="pending-marked-btn"><i class="fa fa-check"></i> Marked</a>
            </div>
        </div> -->
            
        <div class="row">
            <div class="col-md-12">
                <div class="row cat-main">
                    <label class="control-label col-md-12">Personal Information</label>
                </div>                                                
            </div>
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Name</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class="row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class="row cat-discrip">
                    <label class="control-label col-md-12">{{$data->name}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Email</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12"><a href="mailto:{{$data->email}}">{{$data->email}}</a></label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Mobile No</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12">{{$data->mobile}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">City</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12">{{$data->city}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Country</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12">{{$data->country}}</label>
                </div>                                                
            </div>                                                         
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="modal-body ">
        <div class="row">
            <div class="col-md-12">
                <div class="row cat-main">
                    <label class="control-label col-md-12">Business Information</label>
                </div>                                                
            </div>
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Company</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class="row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class="row cat-discrip">
                    <label class="control-label col-md-12">{{$data->company}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class="row cat-title">
                    <label class="control-label col-md-12">Designation</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class="row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class="row cat-discrip">
                    <label class="control-label col-md-12">{{$data->designation}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Source</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12">{{$data->source->source}}</label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Company Website</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12"><a href="{{$data->website_url}}" target="_blank"> {{$data->website_url}}</a></label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">Business Email</label>
                </div>                                                
            </div>
            <div class="col-md-1 col-1">
                <div class=" row cat-title">
                    <label class="control-label col-md-12">:</label>
                </div>                                                
            </div>
            <div class="col-md-8 col-7">
                <div class=" row cat-discrip">
                    <label class="control-label col-md-12"><a href="mailto:{{$data->business_email}}">{{$data->business_email}}</a></label>
                </div>                                                
            </div>                                                         
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cat-title">
                    <label class="control-label">Message:</label><br>
                    <div class="cat-discrip">
                        <label class="control-label">{{$data->description}}</label>
                    </div>
                </div>                                                
            </div>                                                        
        </div>
      </div>
        <div class="history-info">
            <p class="text-right p-one"><b>{{date('d-M-Y h:i a', strtotime($data->created_at))}}</b>
              <br>By: <b>{{@$data->user->name}}</b></p>
              <div class="row">
                <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-sm btn-success viewRemarks" data-id="{{$data->id}}" id="pending-remarks-btn"><i class="fa fa-comment"></i> Remarks: {{count($data->remarks)}} </a>
                @if($data->status == '2' || $data->status == '4')
                <a href="javascript:void(0)" data-href="{{route('admin.leads.mark',base64_encode($data->id))}}" class="btn btn-sm btn-primary checkItem" id="pending-marked-btn"><i class="fa fa-check"></i> Mark</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-info followupagent" data-id="{{$data->id}}"><i class="mdi mdi-twitch"></i> Follow-up</a>
                @endif
                </div>
              </div>
        </div>
      
    </div>
