<?php

namespace App\Http\Controllers\agent1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\leads;
use Auth;
use App\Models\leads\source;
use App\Models\leads\remarks;
use App\Models\leads\categories;
use Carbon\Carbon;
use App\Imports\leadImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class leadsController extends Controller
{
    function addLead(Request $request){

       $search = $request->all();
                
                $data['categories'] = categories::orderBy('name')->get();
                $data['source'] = source::orderBy('source')->get();
               
                return view('agent1.leads.add')->with($data);
    }

    function addleadSubmit(Request $request){
        $data = $request->all();
        leads::addLead($data);
        
        return redirect()->back()->with('success', 'Lead Updated.');
    }

    function agent1freshLead(){
        $data['leads'] = leads::where('status', 1)->where('created_by', Auth::id())->orderBy('created_at', 'desc')->paginate(25);
        $data['total_leads'] = leads::count();
        return view('agent1.leads.fresh')->with($data);
    }

    function details($id){
        $id = base64_decode($id);
        $data = leads::find($id);

        return view('agent1.leads.response.details', ['data' => $data]);
    }

    function viewRemarks($id){
        $data['lead_id'] = $id;
        $data['remarks'] = remarks::where('lead_id', $id)->orderBy('created_at', 'desc')->get();
        return view('agent1.leads.response.remarks')->with($data);
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

    function importLead(){
        
        $data['categories'] = categories::orderBy('name')->get();
        $data['source'] = source::orderBy('source')->get();
        return view('agent1.leads.import')->with($data);
    }

    function importedLead(Request $request){

        Session::put('category_id', $request->get('category_id') );
        Session::put('source', $request->get('source') );
       
        $exData = Excel::import(new leadImport, request()->file('file'));
        
        if(Session::get('format') == 'invalid'){
            return redirect()->back()->with('error', 'Invalid File Format.');
        }else{
            return redirect()->back()->with('success', 'Total: '.Session::get('format').' rows imported sucessfuly!');
        }
    }

    function totalWidget(){
        $data = categories::orderBy('name')->get();
        return view('agent1.leads.response.totalDetails1', ['data' => $data]);
    }
    function pendingWidget(){
        $data['categories'] = categories::orderBy('name')->get();
        return view('agent1.leads.response.pendingDetails1')->with($data);
    }
    function markedWidget(){
        $data['categories'] = categories::orderBy('name')->get();
        return view('agent1.leads.response.markedDetails1')->with($data);
    }
    function freshWidget(){
        $data['categories'] = categories::orderBy('name')->get();
        return view('agent1.leads.response.freshDetails1')->with($data);
    }
    
}
