<?php

namespace App\Http\Controllers;

use App\AdminQuery;
use App\User;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Message;
use App\Service;
use App\Hire;
use App\Conversation;

class UserController extends Controller
{
    public function profile()
    {
        // $conversations = Conversation::with(['messages'=> function ($query) {
        //                 $query->where('is_read', '<>', 1);
        //                 }])->where('reciever',\Auth::id())->get();
        $user = \Auth::user();

        return view('front.User.profile',['user'=>$user]);
    }

    public function postprofile(Request $request)
    {
        $user = \Auth::user();

        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'mail'=>'unique:users,email,'.$user->id,
            'phone'=>'required|string',
            'skills'=>'required|string',
            'experience'=>'required|string',
        ]);


        if($request->has('avatar'))
        {
            $request->validate([
                'avatar' => 'mimes:jpeg,jpg,png|required|max:300' // max 300kb
                ]);
            $img = Image::make($_FILES['avatar']['tmp_name']);
            $imageName = $_FILES['avatar']['name'];
            $uniqueImageName = time().'_'.$imageName;
             // resize image
            // $img->fit(300, 200);

            $path = 'front/images/users/';
            $img->save($path.$uniqueImageName);
        }

        DB::beginTransaction();
        try{
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->mail;
            $user->phone = $request->phone;
            $user->skills = $request->skills;
            $user->experience = $request->experience;
            if($request->has('avatar')){
                $user->avatar = $uniqueImageName;
            }

            $user->save();
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }

        DB::commit();
       return back()->with('flash_message','Settings Updated Successfully');
    }

    public function viewprofile(User $user)
    {
        return view('front.User.user-public-profile',['user'=>$user]);
    }

    public function viewglobalprofile(User $user)
    {
        return view('front.User.user-public-mainprofile',['user'=>$user]);
    }

    public function submitquery()
    {
        request()->validate([
            'query'=>'required|string',
        ]);

        $user = \Auth::user();
        $query = request('query');

        $data = [
            'user_id' => $user->id,
            'query' => $query,
        ];
        AdminQuery::create($data);

        return redirect()->route('home')->with('success','Query Submitted Successfully');
    }

    public function switchprofile()
    {
        $profile_switch = request('switch_id');
        $user = \Auth::user();
        if($profile_switch == \App\User::consultant){
            $user->current_profile = \App\User::consultant;
        }elseif ($profile_switch == \App\User::lookingForSupport) {
            $user->current_profile = \App\User::lookingForSupport;
        }

        $user->save();

        return back()->with('success','Profile Switched Successfully');
    }

    public function myServices()
    {
        $services = Service::where('user_id',\Auth::id())->get();
        return view('front.User.my-services')->withServices($services);
    }

    public function myReviews()
    {
        return view('front.User.my-reviews');
    }

    public function myProjects()
    {
       $projects =  Hire::where('user_id',\Auth::id())->get();
        return view('front.User.my-projects')->withProjects($projects);
    }

    public function userReviews(User $user)
    {
        return view('front.User.user-reviews');
    }
}
