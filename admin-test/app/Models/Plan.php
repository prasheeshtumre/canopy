<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlanCategoryMap;

class Plan extends Model
{
    use HasFactory;
    protected $table = "plan_mst";
    protected $guarded = [];
     protected $primaryKey = 'plan_id';
     
     public function planCategoryMap(){
        return $this->hasMany(PlanCategoryMap::class,'plan_id','plan_id');
    }


}
