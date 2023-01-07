<?php

namespace App\Http\Controllers\agent2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\leads;
use App\Models\User;
use App\Models\leads\categories;

class analyticsController extends Controller
{
    public function analytics(){

        $data['categories'] = categories::orderBy('name')->get();
        return view('agent2.leads.analytics')->with($data);
    } 
}
