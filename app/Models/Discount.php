<?php

namespace App\Models;


use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['product_id,status'];

    public $timestamps = false;
    
    public function products(){

       return $this->belongsTo(Products::class,'product_id','id');

    }

}
