<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['id','club_id','title','product_title','type'];

    public function clubs(){

        return $this->belongsTo(Club::class,'club_id','id');

    }

    // public function discounts(){

        
    //     return $this->hasMany(Discount::class,'product_id','id');

    // }
    

}
