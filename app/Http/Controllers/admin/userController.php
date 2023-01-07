<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    //
    function index(){
        $data['users'] = User::paginate(25);
        return view('admin.users.alluser')->with($data);
    }

    public function deleteUser(Request $req)
        {
            $data = User::find(base64_decode($req->id));
            $data->delete();
            return redirect(route('admin.users.alluser'))->with('success', 'User has been Deleted!');
        }

    public function addnew(){
                return view('admin.users.addnew');
    }

    function addnewSubmit(Request $request){
        $request->validate([
              'email' => 'required|unique:tbl_users_info',
              'password' => '|required_with:confirm_password|same:confirm_password',
              'confirm_password' => 'required'
          ]);

        $data = $request->all();
        $r = new User;
        $r->name = $data['name'];
        $r->username = $data['username'];
        $r->email = $data['email'];
        $r->role_id = $data['role_id'];
        $r->password=bcrypt($request->password);
        $r->status = 1;
        $r->save();
        
        return redirect()->back()->with('success', 'New User Added!');

    }

    public function editUser($id){
        $data = User::find(base64_decode($id));
        return view('admin.users.updateuser',['data' => $data]);
    }

     public function updateUser(Request $req)               
    {
        $data = User::find(base64_decode($req->id));
        $data->name=$req->name;
        $data->username=$req->username;
        $data->email=$req->email;
        $data->role_id=$req->role_id;
        $data->save();
        return redirect(route('admin.users.alluser'))->with('success', 'User Updated!');

    }

}
