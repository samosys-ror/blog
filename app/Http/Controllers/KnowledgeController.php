<?php

namespace App\Http\Controllers;

use App\Knowledge;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('knowledges')->get();

        return view('knowledge')->with('data',$data);
    }

   public function search(Request $request)
    {  

       if(empty($request->search)){
           $data=DB::table('knowledges')->get();

          }

       else{

             $data=DB::table('knowledges')->where('title','LIKE','%'.$request->search.'%')->get();

           }
  $html='';
  foreach ($data as $key => $data) 
         {
              


         $html.= ' <div class="col-md-6"style="">
                   <div class="card" style="border-radius: .5rem;box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); margin-top: 2rem;">
               

                   <div class="card-body"style="width: 100%">
                 
                   <div class="grid-sm" style="display:grid;flex-direction: row-reverse;>

                    <div class="p-6" style="padding: 1.5rem;">



               
                     
                      <div class="flex items-center"style="display:flex;align-items: center;">
                              <!--  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>  -->
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="'. route("knowledge.show",$data->slug ).'" class="underline text-gray-900 dark:text-white">"'.$data->title.'"</a></div>
                            </div>
                   

                     <div class="ml-12"style="margin-left: 2rem;box-sizing: border-box;
    border: 0 solid #e2e8f0; display: block;
">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                   "'.Str::limit($data->desc,'100').'"
                                </div>
                            

                            </div>

                

                  </div>  </div>
                    
                </div>
                 
            </div>

         ';


            }
             

        return $html;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knowledges/create');
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

        $data['slug']=(string)Str::uuid();

         $data['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $data['image']);

       // Knowledge::create($data);
         unset($data['_token']);
         DB::table('knowledges')->insert($data);

        return redirect('knowledge');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug )
    {
         //$slug=$request->slug;

          $data=DB::table('knowledges')->where('slug',$slug)->first();
         return view('show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(crm $crm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crm $crm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(crm $crm)
    {
        //
    }
}
