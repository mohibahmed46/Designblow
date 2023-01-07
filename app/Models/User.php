<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\leads\leads;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public static function addUser(array $data){
        $u = new User;
        $u->name = $data['fullname'];
        $u->username = $data['username'];
        $u->email = $data['email'];
        $u->password = bcrypt($data['password']);
        $u->role_id = $data['role_id'];
        $u->status = '1';
        $u->save();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'tbl_users_info';
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pendingLeads(){
        return $this->hasMany(leads::class, 'assign_to', 'id')->where('status', '2');
    }

    public function markedLeads(){
        return $this->hasMany(leads::class, 'assign_to', 'id')->where('status', '3');
    }

    public function followupLeads(){
        return $this->hasMany(leads::class, 'assign_to', 'id')->where('status', '4');
    }

    
}
