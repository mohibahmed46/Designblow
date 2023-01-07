<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads\leads;
use App\Models\leads\categories;


class settingController extends Controller


{
    //
        function categories()
            {
                $data['status'] = '1';
                $data['leads'] = categories::orderBy('name')->get();
                return view('admin.settings.categories')->with($data);
            }

        function addCatogery(Request $req)
        {

            $validated = $req->validate([
            'name' => 'required|unique:tbl_lead_categories',
        ]);
            $data = new categories;
            $data->name=$req->name;

            $data->save();
            return redirect()->back()->with('success', 'New category Added!');
        }

        public function editCatogery($id)
        {
                $data['val'] = categories::find(base64_decode($id));
                $data['status'] = '2';
                $data['leads'] = categories::orderBy('name')->get();
                return view('admin.settings.categories')->with($data);

        }         
        function updateCatogery(Request $req)
        {

            $validated = $req->validate([
            'name' => 'required|unique:tbl_lead_categories',
        ]);
            $data = categories::find(base64_decode($req->id));
            $data->name=$req->name;

            $data->save();
            return redirect(route('admin.setting.categories'))->with('success', 'Category has been Updated!');
        }

        public function deleteCategory(Request $req)
        {
            $data = categories::find(base64_decode($req->id));
            $data->delete();
            return redirect(route('admin.setting.categories'))->with('success', 'Category has been Deleted!');
        }

}
