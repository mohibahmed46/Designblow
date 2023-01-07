<?php

namespace App\Http\Controllers\agent2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\leads;
use Auth;
use App\Models\leads\source;
use App\Models\leads\remarks;
use App\Models\leads\categories;
use Carbon\Carbon;
use App\Models\User;

class followupController extends Controller
{
    function upcomingView(){
        $data['leads'] = leads::where('status', 4)->where('assign_to', Auth::id())->where('followup_date', '>=', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate (25);
        $data['total_leads'] = leads::count();
        return view('agent2.leads.upcoming')->with($data);
    }

    function missedView(){
        $data['leads'] = leads::where('status', 4)->where('assign_to', Auth::id())->where('followup_date', '<', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate (25);
        $data['total_leads'] = leads::count();
        return view('agent2.leads.missed')->with($data);
    }

    function followView($id){
        $data['id'] = $id;
        $data['lead'] = leads::find($id);
        // $data['followup_date'];
        return view('agent2.leads.response.followupDetails')->with($data);
    }

    function followupDetailsSubmit(Request $request){
        $data = $request->all();

        $r = leads::find($data['id']);
        $r->followup_remarks = $data['followup_remarks'];
        $r->followup_date = $data['followup_date'];
        $r->status = '4';
        $r->save();
        
        return redirect()->back()->with('success', 'New Follow-up Remarks Added!');

    }
}
