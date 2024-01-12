<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCategoryMap extends Model
{
    use HasFactory;
    protected $table = "plan_category_map";
    protected $guarded = [];
    protected $primaryKey = 'mapping_id';
}
