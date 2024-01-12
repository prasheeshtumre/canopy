<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class birthCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $primaryKey = 'app_id';
    protected $table = 'birth_certificate';
}
