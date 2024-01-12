<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferType extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $primaryKey = 'trnfr_id';
    protected $table = 'transfer_type_mst';
}
