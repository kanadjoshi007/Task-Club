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

        $data = Club::all(); 

        return view('club',compact('data'));
        // return view('club');

    }

    // to display the club
    // public function display()
    // {


       
    //     // return response()->json(['data' => $data, 'id' => $id]);
    // }


    // to fetch  the unique id
    public function fetchId()
    {

        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }

        return response()->json(['id' => $id]);
    }

    public function create()
    { 
        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }

        $data  = Club::paginate(5);
        // $data  = Club::all();

        
        
        return response([$data,$id]);

     }

    
    public function store(Request $request)
    {
        // dd($request->all());

        if (Club::get('id')->all() == []) {

            $id = 1;
        } else {

            $id = Club::get('id')->last()->getOriginal('id') + 1;
        }


        $bannerPath = public_path('uploads/banner');
        $logoPath = public_path('uploads/logo');

        $bannerFile = $request->file('banner');
        $logoFile = $request->file('logo');


        

        if ($logoFile->isValid() &&  $bannerFile->isValid()) {
            $logo = time().'.' . $logoFile->getClientOriginalExtension();
            $banner = time().'.' . $bannerFile->getClientOriginalExtension();
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


        return response()->json([$bannerFile->getClientOriginalName(),$logoFile->getClientOriginalName(),$id]);
    }


    public function show(string $name)
    {
        // dd($name);

      $club =  Club::where('club_name','=',$name)->orWhere('club_slug','=',$name)->orWhere('club_state','=',$name)->paginate(5);

        return response([$club,null]);

    }


    public function edit(string $id)
    {   
        $club = Club::where('id', $id)->first();

        return response()->json($club);
    }

    public function update(Request $request, string $id)
    {
        $club = Club::where('id', '=', $id)->first();


        $Logofile = public_path() . '/' . $club->club_logo;
        $Bannerfile = public_path() . '/' . $club->club_banner;

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


    public function destroy(string $id)
    {

        $club = Club::where('id', $id)->get();


        $Logofile = public_path() . '/' . $club->first()->getOriginal('club_logo');
        $Bannerfile = public_path() . '/' . $club->first()->getOriginal('club_banner');


        unlink($club->first()->getOriginal('club_logo'));
        unlink($club->first()->getOriginal('club_banner'));


        // File::delete($Logofile);
        $club = Club::where('id', $id)->delete();

        // dd($club_logo->first()->getOriginal('club_logo'));


        return response()->json($club);
    }
}

