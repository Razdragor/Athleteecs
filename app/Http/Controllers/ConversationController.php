<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Conversation_user;
use App\Conversation;
use App\Conversation_message;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Request;
use LRedis;
 

class ConversationController extends Controller
{
    
    public function create()
    {
        
        if(Request::ajax()) 
        {
            $friend_id = Input::get('id');
            
            $id = Auth::user()->id;
            $conversation_user = new Conversation_user;
            $conversation_user = $conversation_user::where('user_id',$friend_id);
            
            //$conv = $conversation_user->conversation;
            
            if($conversation_user->first())
            {
                $conv = $conversation_user->first()->conversation;
                $users = array();
                foreach($conv->conversation_users as $conv_user)
                {
                    array_push($users,$conv_user->user);
                }
                $messages = $conv->conversation_messages;
            }
            else
            {
                $conv = new Conversation;
                $conv->name = 'Nouvelle conversation';
                $conv->save();
                
                $conversation_user_me = new Conversation_user;
                $conversation_user_me->conversation_id = $conv->id;
                $conversation_user_me->user_id = $id;
                $conversation_user_me->save();
                
                $conversation_user_friend = new Conversation_user;
                $conversation_user_friend->conversation_id = $conv->id;
                $conversation_user_friend->user_id = $friend_id;
                $conversation_user_friend->save();
                
                $users = array();
                array_push($users,$conversation_user_me);
                array_push($users,$conversation_user_friend);
                
                $messages = array();
            }
            /*$conversation = new Conversation;

            if($conversation::find($request['id']))
            {
                $messages = $conversation::conversation_messages();
                $interlocutor = $conversation::conversation_users();
                return \Response::json(array(
                    'success' => true,
                    'conversation' => array(
                        'picture' => $user->picture,
                        'firstname' => $user->firstname,
                        'lastname' => $user->lastname,
                        'created_at' => $comment->timeAgo($comment->created_at)
                    )
                ));
            }

            $flight->save();*/
            return \Response::json(array(
                    'success' => true,
                    'conv' => $conv,
                    'users' => $users,
                    'messages' => $messages,
                ));
        }
    }
    
    public function sendMessage()
    {
        if(Request::ajax()) 
        {
            if(!empty(Input::get('conversation_id')) && !empty(Input::get('message')))
            {
                $conv = new Conversation();
                $conv = $conv::where('id',Input::get('conversation_id'));
                
                if($conv->first())
                {
                    $user = Auth::user();
                    
                    $conv_message = new Conversation_message();
                    $conv_message->conversation_id = Input::get('conversation_id');
                    $conv_message->message = Input::get('message');
                    $conv_message->user_id = $user->id;
                    $conv_message->save();
                    
                    $redis = LRedis::connection();
                    $redis->publish('message', json_encode(['message'=>$conv_message->message,'conv_id'=>Input::get('conversation_id'),'user'=>$user]));

                    return \Response::json(array(
                            'success' => true,
                        'conv_id' => Input::get('conversation_id'),
                        ));
                }
                
            }

        }
	}
       
}
