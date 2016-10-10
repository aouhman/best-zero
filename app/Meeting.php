<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Meeting extends Model
{
    protected $fillable = ['time', 'title', 'description'];


    static public function AllMeetingByUser($user_id)
    {
        $sql = "SELECT *,
                (SELECT '#4BB815' FROM meeting_user WHERE meeting_user.meeting_id = meet.id AND meeting_user.user_id =$user_id ) as register
                FROM  meetings meet";


        $meetings = DB::select($sql);
        return $meetings;
    }

    public function users()
    {

        return $this->belongsToMany('App\User');
    }
}
