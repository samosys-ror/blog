<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

use Auth;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function login(Request $request)
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

         $session_id=$user->id;
        
        $password=$request->password;  

    // dd($password);

    $data=[
          "Api-Key"=>"14FF3618556206C62CAD177EC037C952",
          "session_id"=>$session_id, 
          "module_name"=>"Contacts",
          "str_query"=>" contacts.user_name_s = '".$request->username."' AND contacts.user_hash_s = '".$password."' ",
          "str_order_by"=>"",
           "offset"=>"0", 
          "select_fields"=>"",       
          "link_name_to_fields"=>"", 
          "max_results"=>"20"
         ];




      $rsp = Http::post("https://demo.signifycrm.net/portaltest/rest_api/v1/rest/get_entry_list",$data);
         
        $login=$rsp->json();


        $id=$login['data']['entry_list'];


       


        if($rsp->status()==200){

              //$user_name=$user->id;
             if(!empty($id)){ //dd($id);

                    $credentials=['username'=>$request->username,'password'=>$request->password];   


             if (Auth::attempt($credentials)) 
               {
            // Authentication passed...
                        return redirect()->intended('Home');
                 }

              }
              else{
                          return $this->sendFailedLoginResponse($request); 

                    }  
         


          }
        
    }
}
