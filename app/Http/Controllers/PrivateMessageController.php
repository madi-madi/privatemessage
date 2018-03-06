<?php

namespace App\Http\Controllers;
use App\PrivateMessage;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    //
    public function getNotifications(Request $request){

    	$notifications = PrivateMessage::where('read',0)
    					 ->where('receiver_id', $request->user()->id)
    					 ->orderBy('created_at','desc')
    					 ->get();

    	return response(['data'=>$notifications],200);
    }

    public function getMessages(Request $request){

    	$pms = PrivateMessage::
    	                   where('receiver_id',$request->user()->id)
    	                   ->orderBy('created_at','desc')
    	                   ->get();

    	  return response(['data'=>$pms],200);
    }

    public function getMessageById(Request $request){
    	$pm = PrivateMessage::
    	                   where('id',$request->input('id'))
	                    	->first();

	          // if the messageis not read , change the status

	              if ($pm->read == 0 ) {
	              	# code...
	              	$pm->read = 1;
	              	$pm->save();
	              }

    	  return response(['data'=>$pm],200);    	
    }

    public function getMessagesSent(Request $request){
    	$pmsent = PrivateMessage::
    	                   where('sender_id',$request->user()->id)
    	                   ->orderBy('created_at','desc')
    	                   ->get();

    	  return response(['data'=>$pmsent],200);
    }

    public function getSentMessages(Request $request){


    	$attributes = [

    			'sender_id'=> $reques->input('sender_id'),
    			'receiver_id'=> $reques->input('receiver_id'),
    			'subject'=> $reques->input('subject'),
    			'message'=> $reques->input('message'),
    			'read'=> 0,

    	];


    		$pm = PrivateMessage::create($attributes);
    		$data = PrivateMessage::where('id',$pm->id)->first();

    		return response(['data'=>$data],201);
    }



}
