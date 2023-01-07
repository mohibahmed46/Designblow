<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\source;
use App\Models\leads\remarks;
use App\Models\leads\leads;
use App\Models\leads\categories;
use App\Models\User;
use Auth;
use App\Imports\leadImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class leadsController extends Controller
{
    //
    function index(){
        $data['leads'] = leads::orderBy('created_at', 'desc')->get();
        // $data['leads'] = leads::where('status', 1)->orderBy('created_at', 'desc')->get();
        $data['total_leads'] = leads::count();
        return view('admin.leads.index')->with($data);
    }

    function pendingLead(){
        $data['leads'] = leads::where('status', 2)->orderBy('created_at', 'desc')->paginate(25);
        $data['total_leads'] = leads::count();
        $data['total_pending_leads'] = leads::where('status', 2)->count();
        $data['total_marked_leads'] = leads::where('status', 3)->count();
        return view('admin.leads.pending')->with($data);
    }

    function freshLead(){
        $data['leads'] = leads::where('status', 1)->orderBy('created_at', 'desc')->paginate(25);
        $data['categories'] = categories::orderBy('name')->get();
        $data['users'] = User::where('role_id', 3)->orderBy('name')->get();
        return view('admin.leads.fresh')->with($data);
    }

    function assignfreshLead(Request $req){
        $data = $req->all();
        $ids = array();
        $leads = leads::where('status', 1)->where('category_id', $data['category_id'])->where('assign_to', null)->limit($data['num_list'])->get();
        foreach($leads as $val){
            array_push($ids, $val->id);
        }

        leads::whereIn('id', $ids)->update([
            'status' => '2',
            'assign_to' => $data['user_id']
        ]);

        return redirect()->back()->with('success', count($ids).' Leads Assigned.');

    }


    function markLead($id){
        $id = base64_decode($id);
        $data = leads::find($id);
        $data->status = '3';
        $data->marked_by = Auth::id();
        $data->save();

        return redirect()->back()->with('success', 'Lead Marked!');
    }

    function markedLead(){
        $data['leads'] = leads::where('status', 3)->orderBy('created_at', 'desc')->paginate(25);
        return view('admin.leads.marked')->with($data);
    }

    function filterLead()
     {
                $data['status'] = '1';
                $data['data'] = array();
                $data['categories'] = categories::orderBy('name')->get();
                $data['source'] = source::orderBy('source')->get();
                // $data['status'] = leads::orderBy('status')->get();
                return view('admin.leads.filter')->with($data);
     }

    function filterLeadSubmit(Request $request)
            {
                $search = $request->all();
                $from = date('Y-m-d 00:00:01', strtotime($search['fromdate']));
                $to = date('Y-m-d 23:59:59', strtotime($search['todate']));
                //dd($from, $to);
                $data['categories'] = categories::orderBy('name')->get();
                $data['source'] = source::orderBy('source')->get();
                // $data['status'] = leads::orderBy('status')->get();

                $data['data'] = leads::when(!empty($search['fullname']), function($q) use ($search){
                                    return $q->where('name', 'LIKE', '%'.$search['fullname'].'%'); 
                                })
                                ->when(!empty($search['mobile']), function($q) use ($search){
                                    return $q->where('mobile', 'LIKE', '%'.$search['mobile'].'%'); 
                                })
                                ->when(!empty($search['email']), function($q) use ($search){
                                    return $q->where('email', 'LIKE', '%'.$search['email'].'%'); 
                                })
                                ->when(!empty($search['category_id']), function($q) use ($search){
                                    return $q->where('category_id',$search['category_id']); 
                                })
                                ->when(!empty($search['source_id']), function($q) use ($search){
                                    return $q->where('source_id',$search['source_id']); 
                                })
                                ->when(!empty($search['status']), function($q) use ($search){
                                    return $q->where('status',$search['status']); 
                                })
                                ->where('created_at', '>=', $from)
                                ->where('created_at', '<=', $to)
                                ->get();
                $data['search'] = $search;
                return view('admin.leads.filter')->with($data);
            }        

    function add(){
        $data['source'] = source::all();
        $data['categories'] = categories::orderBy('name')->get();

        return view('admin.leads.add')->with($data);
    }

    function addSubmit(Request $request){
        $data = $request->all();
        leads::addLead($data);
        
        return redirect()->back()->with('success', 'Lead Updated.');
    }

    function details($id){
        $id = base64_decode($id);
        $data = leads::find($id);

        return view('admin.leads.response.details', ['data' => $data]);
    }
    function pendingWidget(){
        $data = User::where('role_id', 3)->orderBy('name')->get();
        return view('admin.leads.response.pendingDetails', ['data' => $data]);
    }
    function markedWidget(){
        $data = User::where('role_id', 3)->orderBy('name')->get();
        return view('admin.leads.response.markedDetails', ['data' => $data]);
    }
    function totalWidget(){
        $data = categories::orderBy('name')->get();
        return view('admin.leads.response.totalDetails', ['data' => $data]);
    }

    function viewRemarks($id){
        $data['lead_id'] = $id;
        $data['remarks'] = remarks::where('lead_id', $id)->orderBy('created_at', 'desc')->get();
        return view('admin.leads.response.remarks')->with($data);
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
        return view('admin.leads.import')->with($data);
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

    function followView($id){
        $data['id'] = $id;
        $data['lead'] = leads::find($id);
        // $data['followup_date'];
        return view('admin.leads.response.followupDetails')->with($data);
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

    function upcomingView(){
        $data['leads'] = leads::where('status', 4)->where('followup_date', '>=', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate (25);
        $data['total_leads'] = leads::count();
        return view('admin.leads.upcoming')->with($data);
    }

    function missedView(){
        $data['leads'] = leads::where('status', 4)->where('followup_date', '<', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate (25);
        $data['total_leads'] = leads::count();
        return view('admin.leads.missed')->with($data);
    }
}
