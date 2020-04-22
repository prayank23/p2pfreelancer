<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function viewSearch()
    {
        if(!request('query')){
            return redirect()->route('home')->with('error','Invalid request');
        }
        $query = request('query');
        $query_string = str_replace('-',' ',$query);
        // $profiles = User::where('skills','like','%'.$query_string.'%')
        //             ->where('id','!=',\Auth::id())
        //             ->orWhere('experience','like','%'.$query_string.'%')
        //             ->orWhere('name','like','%'.$query_string.'%')
        //             ->orWhere('first_name','like','%'.$query_string.'%')
        //             ->orWhere('last_name','like','%'.$query_string.'%')
        //             ->get();
        $profiles =  User::search($query_string)->get();
        // dd($profiles);
        if(count($profiles) > 0){

            return view('front.Search.search-results')->withDetails($profiles)->withQuery ( $query_string );
        }else{
            return view('front.Search.search-results')->withMessage('No Details found.Go back and Try to search again ! Or Submit the query to admin below');;
        }


    }
}
