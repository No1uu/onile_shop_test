<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded =[]; //hamgaalalt muutai


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // protected $fillable = [

    //     'category_id',
    //     'name',
    //     'price',
    //     'description',
    //     'stock',
    //     'image',
    // ];  //hamgaalalt sain
}
