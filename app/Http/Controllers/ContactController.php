<?php

namespace App\Http\Controllers;

use App\Contact;
use JWTAuth;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{


    public function __construct()
    {
        $this->middleware('jwt.auth',['only'=>[
            'update','store','destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = Contact::all();
        foreach ($contacts as $contact) {
            $contact->view_meeting = [
                'href' => 'api/v1/contact/' . $contact->id,
                'method' => 'GET',
            ];
        }
        $response = [
            'msg' => 'List of all contacts',
            'contacts' => $contacts
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
//            'company' => 'required',
        ]);

        if(!$user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['msg'=>'User not found'],404);
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $company = $request->input('company');
        $user_id = $user->id;

        $contact = new Contact([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'company' => $company,
            'userId' => $user_id
        ]);
        if ($contact->save()) {

            $contact->view_meeting = [
                'href' => 'api/v1/contact/' . $contact->id,
                'method' => 'GET',
            ];
            $message = [
                'msg' => 'Contact created',
                'contact' => $contact
            ];

            return response()->json($message, 201);

        }
        $response = [
            'msg' => 'Error during creation'
        ];

        return response()->json($response,404);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
