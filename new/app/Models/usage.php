<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usage extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $primaryKey = 'usg_id ';
    protected $table = 'usage_mst';
}
