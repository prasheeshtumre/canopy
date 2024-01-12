<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Plan;


class QrCodeGenerator extends Model
{
    use HasFactory;
    protected $table = "qr_code_generator";
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
    public function plan(){
        return $this->belongsTo(Plan::class, 'plan_id', 'plan_id');
    }

}
