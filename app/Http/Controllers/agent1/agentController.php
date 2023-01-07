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

class agentController extends Controller
{
    //
    function index(){
        // $data['leads'] = leads::orderBy('created_at', 'desc')->get();
        $data['leads'] = leads::where('status', 1)->where('created_by', Auth::id())->whereMonth('created_at', Carbon::now()->month)->get();
        // $data['total_leads'] = leads::where('created_by', Auth::id())->count();
        $data['total_leads'] = leads::count();
        $data['total_fresh_leads'] = leads::where('created_by', Auth::id())->where('status', 1)->count();
        $data['total_pending_leads'] = leads::where('created_by', Auth::id())->where('status', 2)->count();
        $data['total_marked_leads'] = leads::where('created_by', Auth::id())->where('status', 3)->count();

        return view('agent1.index')->with($data);
    }

}
