<?php

namespace App\Models\leads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leads\leads;
use Auth;

class categories extends Model
{
    use HasFactory;
    protected $table = 'tbl_lead_categories';

    public $timestamps = false;



    public function totalLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id');
    }

    public function freshLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '1');
    }

    public function pendingLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '2');
    }

    public function markedLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '3');
    }

    public function followupLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '4');
    }

    public function agent2pendingLead(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '2')->where('assign_to', Auth::id());
    }

    public function agent2markedLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '3')->where('marked_by', Auth::id());
    }

    public function agent2followupLeads(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '4')->where('assign_to', Auth::id());
    }

    public function agent1pendingLead(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '2')->where('created_by', Auth::id());
    }
    public function agent1markedLead(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '3')->where('created_by', Auth::id());
    }
    public function agent1freshLead(){
        return $this->hasMany(leads::class, 'category_id', 'id')->where('status', '1')->where('created_by', Auth::id());
    }
}
