<?php

namespace App\Models\leads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class remarks extends Model
{
    use HasFactory;
    protected $table = 'tbl_remarks_info';

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
