<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    use AuthenticatesUsers;

    public function index()
    {
        //
    }



    public function getUser(Request $request)
    {
      $email=$request->email;

      $user=User::where('email',$email)->first();



       return $user;



    }
    public function emailverify()
    {
        return view('auth/verify');
    }


    public function success(Request $request)
    { 
 

       $header=[    
              "Api-Key"=>"14FF3618556206C62CAD177EC037C952",
              "login_name"=>'Apps_Vila',
              "login_password"=>'password',
             ];




        $response = Http::post("https://demo.signifycrm.net/portaltest/rest_api/v1/rest/login",$header);
         

        $res= $response->json();

        $user=$res['data'];

        $user=json_decode($user);

       $user_id=$user->name_value_list->user_id->value;

       

       $usr=User::find(base64_decode($request->route('id')));

    $data= [
        "Api-Key"=>"14FF3618556206C62CAD177EC037C952",
        "session_id"=>$user->id,
        "module_name"=>"Contacts",
        "name_value_list"=>[
              "first_name"=>$usr->name,
              "last_name"=>$usr->lname,
              /*"description"=>'Test  Lead',*/
               "assigned_user_id"=>$user_id,
              "email1"=>$usr->email,
              /*"citizen_id"=>"0764995947373",*/
              "user_name_s"=>$usr->username,
              "user_hash_s"=>$usr->show_password,
              "phone_mobile"=>$usr->mobile,
              "phone_work"=>$usr->phone
             ]
      ];
    $rsp = Http::post("https://demo.signifycrm.net/portaltest/rest_api/v1/rest/set_entry",$data);
         
        if($rsp->status()==200)
       {
             
            return view('auth/success');
       }
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
        //
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
