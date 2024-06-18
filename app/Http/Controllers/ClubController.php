<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('club');
    }

    public function display()
    {


        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }

        $data  = Club::all();

        return response()->json(['data' => $data, 'id' => $id]);
    }

    public function fetchId()
    {

        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }

        return response()->json(['id' => $id]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $id = 1;

        if (Club::get('id')) {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }

        return view('club', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }


        $bannerPath = public_path('uploads/logo'); // Example path outside 'public' folder
        $logoPath = public_path('uploads/banner'); // Example path outside 'public' folder

        $logoFile = $request->file('logo');
        $bannerFile = $request->file('banner');

        
        if ($logoFile->isValid() &&  $bannerFile->isValid()) {
            $logo = time() . '.' . $logoFile->getClientOriginalExtension();
            $banner = time() . '.' . $bannerFile->getClientOriginalExtension();
            $logoFile->move($logoPath, $logo);
            $bannerFile->move($bannerPath, $banner);
        }

        $Logo = "uploads/logo/$logo";
        $Banner = "uploads/banner/$banner";

        Club::create([
            'id' => $id,
            'group_id' => $request->input('groupId'),
            'business_name' => $request->input('Bname'),
            'club_number' => $request->number,
            'club_name' => $request->name,
            'club_state' => $request->state,
            'club_description' => $request->desc,
            'club_slug' => $request->slug,
            'website_title' => $request->title,
            'website_link' => $request->link,
            'club_logo' => $Logo,
            'club_banner' => $Banner,
        ]);


        return response()->json();
    }

  
    public function show(string $id)
    {
    }

  
    public function edit(string $id)
    {

        $club = Club::where('id', $id)->first();
        // dd($club);

        return response()->json($club);
    }

    public function update(Request $request, string $id)
    {
        $club = Club::where('id', '=', $id)->first();
      
        
        $Logofile = public_path().'/'.$club->club_logo;
        $Bannerfile = public_path().'/'.$club->club_banner;

           unlink($Logofile);
           unlink($Bannerfile);

        
        $bannerPath = public_path('uploads/banner');
        $logoPath = public_path('uploads/logo');
        
        // dd($request->file('logo'));
        $logoFile = $request->logo;
        $bannerFile = $request->banner;
    


        if ($logoFile->isValid() &&  $bannerFile->isValid()) {
            $logo = time() . '.' . $logoFile->getClientOriginalExtension();
            $banner = time() . '.' . $bannerFile->getClientOriginalExtension();
            $logoFile->move($logoPath, $logo);
            $bannerFile->move($bannerPath, $banner);
        }

        $Logo = "uploads/logo/$logo";
        $Banner = "uploads/banner/$banner";


        $data = [
            'id' => $id,
            'group_id' => $request->input('groupId'),
            'business_name' => $request->input('Bname'),
            'club_number' => $request->number,
            'club_name' => $request->name,
            'club_state' => $request->state,
            'club_description' => $request->desc,
            'club_slug' => $request->slug,
            'website_title' => $request->title,
            'website_link' => $request->link,
            'club_logo' => $Logo,
            'club_banner' => $Banner,
        ];

        $club = Club::where('id', '=', $id)->first();

        $club->fill($data);

        $club->save();


        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */

     
    public function destroy(string $id)
    {

        $club = Club::where('id', $id)->get();


        $Logofile = public_path().'/'.$club->first()->getOriginal('club_logo');
        $Bannerfile = public_path().'/'.$club->first()->getOriginal('club_banner');


           unlink($club->first()->getOriginal('club_logo'));
           unlink($club->first()->getOriginal('club_banner'));


        // File::delete($Logofile);
        $club = Club::where('id', $id)->delete();

        // dd($club_logo->first()->getOriginal('club_logo'));


        return response()->json($club);
    }
}
