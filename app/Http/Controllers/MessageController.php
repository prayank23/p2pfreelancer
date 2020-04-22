<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use Illuminate\Http\Request;
use wDevStudio\LaravelMessenger\Models\Message;
use wDevStudio\LaravelMessenger\Facades\Messenger;
use wDevStudio\LaravelMessenger\Models\Conversation;
use App\User;
use DB;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * Get messenger page.
     *
     * @param  int  $withId
     * @return Response
     */

    public function defaultLaravelMessenger(){
        $withId = Conversation::where('user_one',\Auth::id())->orWhere('user_two',\Auth::id())->first();
        if($withId){
            return redirect()->route('messenger',['id'=>$withId->id]);
        }else{
            dd('you donot have any active chats');
        }
    }

    public function laravelMessenger($withId)
    {

        Messenger::makeSeen(auth()->id(), $withId);
        $withUser = config('messenger.user.model', 'App\User')::findOrFail($withId);
        $messages = Messenger::messagesWith(auth()->id(), $withUser->id);
        $threads  = Messenger::threads(auth()->id());
        $messages = $messages;
        // dd($messages);
        return view('messenger::messenger', compact('withUser', 'messages', 'threads'));
    }

    /**
     * Create a new message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Message::rules());

        $authId = auth()->id();
        $withId = $request->withId;
        $conversation = Messenger::getConversation($authId, $withId);

        if (! $conversation) {
            $conversation = Messenger::newConversation($authId, $withId);
        }

        $message = Messenger::newMessage($conversation->id, $authId, $request->message);

        // Pusher
        $pusher = new Pusher(
            config('messenger.pusher.app_key'),
            config('messenger.pusher.app_secret'),
            config('messenger.pusher.app_id'),
            [
                'cluster' => config('messenger.pusher.options.cluster')
            ]
        );
        $pusher->trigger('messenger-channel', 'messenger-event', [
            'message'    => $message,
            'senderId'   => $authId,
            'withId'     => $withId
        ]);

        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    /**
     * Load threads view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response.
     */
    public function loadThreads(Request $request)
    {
        if ($request->ajax()) {
            $withUser = config('messenger.user.model', 'App\User')::findOrFail($request->withId);
            $threads  = Messenger::threads(auth()->id());
            $view     = view('messenger::partials.threads', compact('threads', 'withUser'))->render();

            return response()->json($view, 200);
        }
    }

    /**
     * Load more messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response.
     */
    public function moreMessages(Request $request)
    {
        $this->validate($request, ['withId' => 'required|integer']);

        if ($request->ajax()) {
            $messages = Messenger::messagesWith(
                auth()->id(),
                $request->withId,
                $request->take
            );

            // dd($messages);
            $view = view('messenger::partials.messages', compact('messages'))->render();

            return response()->json([
                'view'          => $view,
                'messagesCount' => $messages->count()
            ], 200);
        }
    }

    /**
     * Make a message seen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function makeSeen(Request $request)
    {
        Messenger::makeSeen($request->authId, $request->withId);

        return response()->json(['success' => true], 200);
    }

    /**
     * Delete a message.
     *
     * @param  int  $id
     * @return Response.
     */
    public function destroy($id)
    {
        $confirm = Messenger::deleteMessage($id, auth()->id());

        return response()->json(['success' => true], 200);
    }

    public function sendMessage(User $user)
    {
        // dd(request()->all(),$user->id,\Auth::id());

        $conversation = Conversation::create([
            'user_one' => \Auth::id(),
            'user_two' => $user->id,
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => \Auth::id(),
            'message' => request('message'),
            'is_seen' => false,
            'deleted_from_sender' => false,

        ]);
       

        return back()->with('success' , 'Message Sent Successfully. Go to your Inbox');
    }
}
