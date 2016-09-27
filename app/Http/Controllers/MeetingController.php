<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

use App\Http\Requests;

class MeetingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('name');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();
        foreach ($meetings as $meeting) {
            $meeting->view_meeting = [
                'href' => 'api/v1/meeting/' . $meeting->id,
                'method' => 'GET',
            ];
        }
        $response = [
            'msg' => 'List of all Meetings',
            'meetings' => $meetings
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'title' => 'required',
//            'description' => 'required',
//            'time' => 'required|date_format:YmdHie'
//        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');

        $meeting = new Meeting([
            'title' => $title,
            'description' => $description,
            'time' => $time,
            'user_id' => $user_id]);
        $meeting->save();

        $response = [
            'msg' => 'Meeting created',
            'meeting' => $meeting
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = [
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'user_id' => 'User Id',
            'view_meetings' => [
                'href' => 'api/v1/meeting',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'Meeting information',
            'meeting' => $meeting
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');
        $meeting = [
            'title' => $title,
            'description' => $description,
            'time' => $time,
            'user_id' => $user_id,
            'view_meeting' => [
                'href' => 'api/v1/meeting/1',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'Meeting updated',
            'meeting' => $meeting
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
//        if(!$user = JWTAuth::parseToken()->authenticate()){
//            return response()->json(['msg'=>'User not found'],404);
//        }
//        if (!$meeting->users()->where('users.id', $user->id)->first()) {
//            return response()->json(['msg' => 'user not registered for meeting, update not successful'], 401);
//        }
//        $users =  $meeting->users;
//        $meeting->users()->detach();
        if(!$meeting->delete()){
//            foreach ($users as $user) {
//                $meeting->users()->attach($user);
//            }
            return response()->json(['msg'=>'deletion failed'],404);
        }
        $response = [
            'msg'=> 'Meeting deleted' ,
            'create'=> [
                'href' => 'api/v1/meeting',
                'method' => 'POST',
                'params' => 'title, description, time'
            ]
        ];
        return response()->json($response, 200);
    }
}