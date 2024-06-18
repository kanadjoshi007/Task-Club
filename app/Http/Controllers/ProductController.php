<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\ProductForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('product');
    }


    public function create(Request $request)
    {

        $product = Products::all();

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        $request->validate([

            'attr' => 'required',
            'title' => 'required|max:255',
            'Ptitle' => 'required|max:255',
            'type' => 'required|max:100',
        ]);

        if (Products::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Products::get('id')->last()->getOriginal('id') + 1;
        }



        $product = new Products();
        $product->id = $id;
        $product->club_id = $request->input('attr');
        $product->title = $request->input('title');
        $product->product_title = $request->input('Ptitle');
        $product->type = $request->input('type');

        $product->save();

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        // if (Products::get('id')->all() == []) {

        //     $id = 1;
        // } else {

        //     $id = Products::get('id')->last()->getOriginal('id') + 1;
        // }

        // $club = Club::all();

        // $data = Products::all();

        // return view('product', compact('data', 'club', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $id = array('id' => $id);
        $product  = Products::where($id)->first();

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request->all());

        // $data =  Products::where('id',$id)->get();

        $request->validate([

            'attr' => 'required',
            'title' => 'required|max:255',
            'type' => 'required|max:100',
        ]);
       

        $product = Products::where('id', '=', $id)->first();
        $product['club_id'] = $request->attr;
        $product['title'] = $request->title;
        $product['product_title'] = $request->Ptitle; 
        $product['type'] = $request->type;
        

        // Products::where('id','=',$id)->update([$product]);

        $product->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Products::where('id', $id)->delete();

        return response()->json($post);
    }
}
