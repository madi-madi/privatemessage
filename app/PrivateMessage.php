<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class PrivateMessage extends Model
{
    //

    protected $fillabe = ['sender_id','receiver_id','subject','message','read'];

    // protected $appends = ['sender','receiver'];

    // public function getCreatedAtAttribute($value){

    // 	return Carbon::parse($value)->diffForHumans();

    // }

    // public function getSenderAttribute(){
    // 	return User::where('id',$this->sender_id)->first();
    // }

    // public function getReceiverAttribute(){
    // 	return User::where('id',$this->receiver_id)->first();
    // }

}
