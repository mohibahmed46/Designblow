<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\leads;
use App\Models\User;
use App\Models\leads\categories;


class analyticsController extends Controller
{
    public function analytics(){

        $data['users'] = User::where('role_id', 3)->orderBy('name')->get();
        $data['total_leads'] = leads::count();
        $data['total_pending_leads'] = leads::where('status', 1)->count();
        $data['total_marked_leads'] = leads::where('status', 2)->count();
        $data['categories'] = categories::orderBy('name')->get();
        $data['followup'] = leads::where('status', 4)->count();
        return view('admin.leads.analytics')->with($data);
    }   
}
