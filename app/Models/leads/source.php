<?php

namespace App\Models\leads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class source extends Model
{
    use HasFactory;
    protected $table = 'tbl_source_info';
    public $timestamps = false;
}
