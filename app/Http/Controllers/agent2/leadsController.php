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
class leadsController extends Controller
{
    function agent2pendingLead(){
        $data['leads'] = leads::where('status', 2)->where('assign_to', Auth::id())->orderBy('created_at', 'desc')->paginate (25);
        $data['total_leads'] = leads::count();
        return view('agent2.leads.pending')->with($data);
    }

    function markedLead(){
        $data['leads'] = leads::where('status', 3)->where('marked_by', Auth::id())->orderBy('created_at', 'desc')->paginate(25);
        return view('agent2.leads.marked')->with($data);
    }
    function markLead($id){
        $id = base64_decode($id);
        $data = leads::find($id);
        $data->status = '3';
        $data->marked_by = Auth::id();
        $data->save();

        return redirect()->back()->with('success', 'Lead Marked!');
    }

    function details($id){
        $id = base64_decode($id);
        $data = leads::find($id);

        return view('agent2.leads.response.details', ['data' => $data]);
    }

    function viewRemarks($id){
        $data['lead_id'] = $id;
        $data['remarks'] = remarks::where('lead_id', $id)->orderBy('created_at', 'desc')->get();
        return view('agent2.leads.response.remarks')->with($data);
    }

    function viewRemarksSubmit(Request $request){
        $data = $request->all();

        $r = new remarks;
        $r->lead_id = $data['lead_id'];
        $r->remarks = $data['remarks'];
        $r->created_by = Auth::id();
        $r->save();
        
        return redirect()->back()->with('success', 'New Remarks Added!');

    }
    function pendingWidget(){
        $data['categories'] = categories::orderBy('name')->get();
        return view('agent2.leads.response.pendingDetails2')->with($data);
    }
    function markedWidget(){
       $data['categories'] = categories::orderBy('name')->get();
        return view('agent2.leads.response.markedDetails2')->with($data);
    }
    function totalWidget(){
        $data = categories::orderBy('name')->get();
        return view('agent2.leads.response.totalDetails2', ['data' => $data]);
    }
}
