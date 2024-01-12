<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class birthCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $primaryKey = 'id';
    protected $table = 'enquiry_form';
    
    
    // public function enquiryFormsWithFiles()
    // {
    //     return $this->belongsTo(Files::class);
    // }
    
    public function FilesInfo()
    {
        return $this->belongsTo(Files::class);

    }
}
