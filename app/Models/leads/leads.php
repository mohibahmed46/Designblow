<?php

namespace App\Models\leads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leads\source;
use App\Models\leads\categories;
use App\Models\leads\remarks;
use App\Models\User;
use Auth;

class leads extends Model
{
    use HasFactory;
    protected $table = 'tbl_lead_info';

    public static function addLead(array $data){
        $l = new leads;
        $l->name = $data['fullname'];
        $l->email = $data['email'];
        $l->mobile = $data['mobile'];
        $l->business_email = $data['business_email'];
        $l->company = $data['company'];
        $l->phone = $data['phone'];
        $l->designation = $data['designation'];
        $l->city = $data['city'];
        $l->country = $data['country'];
        $l->profile_url = $data['profile_url'];
        $l->website_url = $data['website_url'];
        $l->category_id = $data['category_id'];
        $l->source_id = $data['source'];
        $l->description = $data['description'];
        $l->status = '1';
        $l->created_by = Auth::id(); 
        $l->save();


    }


    public function source(){
        return $this->belongsTo(source::class, 'source_id');
    }
    public function category(){
        return $this->belongsTo(categories::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function assigned(){
        return $this->belongsTo(User::class, 'assign_to');
    }
    public function remarks(){
        return $this->hasMany(remarks::class, 'lead_id', 'id');
    }
}
