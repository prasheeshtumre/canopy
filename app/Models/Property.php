<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyImage;
use App\Models\Category;
use App\Models\SubCategory;

class Property extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';



    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // without foreign key
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }
}
