<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonalOffice extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $primaryKey = 'zo_id';
    protected $table = 'zonal_office_mst';
}
