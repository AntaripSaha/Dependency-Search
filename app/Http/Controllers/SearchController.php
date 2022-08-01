<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    //For fetching all countries
    public function index(){
        return DB::table('villages')->get();
    }
    public function country()
    {
        $countries= DB::table("countries")->get();
        return view('home')->with('countries',$countries);
    }
    
    //For fetching states
    public function getStates($id)
    {
        $states = DB::table("states")
                    ->where("country_id",$id)
                    ->pluck("name","id");
        return response()->json($states);
    }
    
    //For fetching cities
    public function getCities($id)
    {
        $cities= DB::table("cities")
                    ->where("state_id",$id)
                    ->pluck("name","id");
        return response()->json($cities);
    }
    public function getVillage($id)
    {
        
        $village= DB::table("villages")
                    ->where("city_id",$id)
                    ->pluck("name","id");
        return response()->json($village);
    }
}
