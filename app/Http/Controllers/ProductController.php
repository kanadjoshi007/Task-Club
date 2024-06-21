<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Discount;
use App\Models\Products;

use App\Jobs\DiscountJob;
use Illuminate\Http\Request;
use App\Http\Requests\ProductForm;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('product');
    }

    public function discount(){

        $data  = Products::with('discounts')->get()->pluck('discounts')[0];
    
        return response()->json($data);
    }



    public function create(Request $request)
    {
        

        $product = Products::paginate(5);

        return response()->json($product);
       
    }

    public function fetchClub()
    {
        $clubs = DB::select('select id,club_name from clubs');

        return response()->json($clubs);
    }


    public function fetchId()
    {

        if (Products::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Products::get('id')->last()->getOriginal('id') + 1;
        }

        return response()->json(['id' => $id]);
    }

    
    public function store(ProductForm $request)
    {

        if (Products::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Products::get('id')->last()->getOriginal('id') + 1;
        }

        // discount entries for product

        dispatch(new DiscountJob($id));

        $product = new Products();
        $product->id = $id;
        $product->club_id = $request->input('attr');
        $product->title = $request->input('title');
        $product->product_title = $request->input('Ptitle');
        $product->type = $request->input('type');

        $product->save();


                // Artisan::call('app:check-expiry',['expiry_date'=>$id]);

        return response()->json();
        // return redirect()->route("checkExpiry",$id);
    }

    public function checkExpiry($id){

        $expiry_date = Discount::where('product_id',$id)->get('expiry_date');

        dd($expiry_date[0]->pluck('expiry_date'));
        

        Artisan::call('app:check-expiry',['expiry_date'=>$expiry_date]);

    }


    public function show(string $title)
    {
        
        $products = Products::where('title','=',$title)->orWhere('product_title','=',$title)->orWhere('type','=',$title)->paginate(5);

        return response($products);

    }



    public function edit(string $id)
    {

        $id = array('id' => $id);
        $product  = Products::where($id)->first();

        return response()->json($product);
    }

    public function update(ProductForm $request, string $id)
    {

        $product = Products::where('id', '=', $id)->first();
        $product['club_id'] = $request->attr;
        $product['title'] = $request->title;
        $product['product_title'] = $request->Ptitle;
        $product['type'] = $request->type;

        // Products::where('id','=',$id)->update([$product]);

        $product->save();

        return response()->json();
    }

    public function destroy(string $id)
    {
        $post = Products::where('id', $id)->delete();

        return response()->json($post);
    }
}
