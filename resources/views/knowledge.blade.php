@extends('layouts.app')


@section('content')
<style type="text/css">
	
	body{
		background-color: #ffff;
	}
</style>
<script type="text/javascript">
  
  function search()
  {
    
     
     var search =$('#search').val();

    $.ajax({
         url:"{{route('search')}}",
         method:"GET",
         data:{search:search},
         success: function(data)
         {

           $('#content').html(data);

         }



         });


  }

     // Will also return 20
 

</script>

<div class="container-fluid"style="width:100%;margin-left: 6%">
    <div class="row justify-content-center mx-0 mx-md-auto">
        <div class="col-lg-10 col-md-11 px-1 px-sm-2">
            <div class="card" style="border-radius: .5rem;box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); margin-top: 1rem;width:900px;">

              <div class="card-body">

                  <div class="md-form mt-0">
                      <input class="form-control"id="search"onkeypress="search()" type="text" placeholder="Search Article Here" aria-label="Search Article Here"style="barder:none;background-color: transparent;
    border: none;
    border-bottom: 1px solid #ced4da;
    border-radius: 0;
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;">
                   </div>
                
              </div>
             </div>
        </div>
    </div>
 </div>    


<div class="container"style="width:100%;">
    <div class="row justify-content-center"id="content">
       
     </div>
  </div>
</div>

@endsection