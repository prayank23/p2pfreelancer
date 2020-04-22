<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Hire;
use App\Conversation;
use App\Message;
use Image;
use DB;

class ServiceController extends Controller
{
    public function add()
    {
        // dd(request()->all());

        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2000',
            'charges' => 'required',
        ]);
        $user_id = \Auth::id();

                // open an image file
        $img = Image::make(request('image'));

        // now you are able to resize the instance
        $img->resize(320, 240);
        $imageName = time() . $_FILES['image']['name'];
        // dd($imageName);
        // and insert a watermark for example
        // $img->insert('public/services/'.$imageName);

        // finally we save the image as a new file
        $img->save(public_path('front/images/services/'.$imageName),90);

        $data = [
            'title' => request('title'),
            'user_id' => $user_id,
            'description' => request('description'),
            'image' => $imageName,
            'charges' => request('charges'),
        ];

        Service::create($data);

        return back()->with('success' , 'Service added successfully');
    }

    public function hire()
    {
        // dd(request()->all());

        request()->validate([
            'consultant_id' => 'required|numeric',
            'description' => 'required',
            'charges' => 'required|numeric' 
        ]);

        $data = [
            'consultant_id' => request('consultant_id'),
            'user_id' => \Auth::id(),
            'description' => request('description'),
            'charges' => request('charges')  
        ];


        DB::beginTransaction();
        Hire::create($data);

        $conversation = Conversation::create([
            'sender' => \Auth::id(),
            'reciever' => request('consultant_id'),
        ]);
        $price = request('charges');
        $offer = \View::make('front.partials.offer',compact('price'));
        $html = $offer->render();
        $message = Message::create([
            'sender_id' => \Auth::id(),
            'reciever_id' => request('consultant_id'),
            'conversation_id' => $conversation->id,
            'message' => $html,
        ]);

        if($conversation && $message){
            DB::commit();
        }else{
            DB::rollback();
            return back()->with('error' , 'Something went wrong on our side');
        }

        return back()->with('success','Request sent to consultant Successfully');
    }
}
