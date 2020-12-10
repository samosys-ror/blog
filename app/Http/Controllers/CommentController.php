<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

       $data=$request->all();

        //$data['user_id']=Auth::user()->id;


        $comments=new Comment();

        $comments->user_id=Auth::user()->id;

        $comments->k_id=$data['k_id'];

        $comments->rating=$data['rating'];

        $comments->comment=$data['comment']; 

       // Comment::create($data);

        $comments->save();


        $data=Comment::join('users','users.id','=','comments.user_id')->get();

        $html="";


        foreach ($data as $key => $value) {



            $html.='<div class="row d-flex">
                        <div class="profile-pic"><img src="https://i.imgur.com/Mcd6HIg.jpg" width="60px" height="60px"></div>
                        <div class="d-flex flex-column pl-3">
                            <h4>'.$value->name.'</h4>
                            <p class="grey-text">30 min ago</p>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="fa fa-circle green-dot my-auto rating-dot"></div>
                        <div class="fa fa-circle green-dot my-auto rating-dot"></div>
                        <div class="fa fa-circle green-dot my-auto rating-dot"></div>
                        <div class="fa fa-circle green-dot my-auto rating-dot"></div>
                        <div class="fa fa-circle green-dot my-auto rating-dot"></div>
                        <div class="green-text">
                            <h5 class="mb-0 pl-3">Excellent</h5>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <p>'.$value->comment.'</p>
                    </div>
                    ';
            
             }

        return $html;
        
       
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
