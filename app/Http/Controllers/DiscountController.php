<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
   public function display($id){

    $discount =  Discount::with('products')->where('product_id','=',$id)->get();

    return response()->json($discount);

   }





}
