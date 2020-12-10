@extends('layouts.app')


@section('content')
<style type="text/css">
    
    body{
        background-color: #ffff;
    }

    body {
    overflow-x: hidden
}

.container-fluid {
    background-image: linear-gradient(to right, #7B1FA2, #E91E63)
}

.sm-text {
    font-size: 10px;
    letter-spacing: 1px
}

.sm-text-1 {
    font-size: 14px
}

.green-tab {
    background-color: #00C853;
    color: #fff;
    border-radius: 5px;
    padding: 5px 3px 5px 3px
}

.btn-red {
    background-color: #E64A19;
    color: #fff;
    border-radius: 20px;
    border: none;
    outline: none
}

.btn-red:hover {
    background-color: #BF360C
}

.btn-red:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.round-icon {
    font-size: 40px;
    padding-bottom: 10px
}

.fa-circle {
    font-size: 10px;
    color: #EEEEEF
}

.green-dot {
    color: #4CAF50
}

.red-dot {
    color: #E64A19
}

.yellow-dot {
    color: #FFD54F
}

.grey-text {
    color: #BDBDBD
}

.green-text {
    color: #4CAF50
}

.block {
    border-right: 1px solid #F5EEEE;
    border-top: 1px solid #F5EEEE;
    border-bottom: 1px solid #F5EEEE
}

.profile-pic img {
    border-radius: 50%
}

.rating-dot {
    letter-spacing: 5px
}

.via {
    border-radius: 20px;
    height: 28px
}
</style>

<div class="container-fluid"style="width:100%;margin-top: -50px">
    <div class="row justify-content-center mx-0 mx-md-auto">
        <div class="col-lg-10 col-md-11 px-1 px-sm-2">
            <div class="card" style="border-radius: .5rem;box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); margin-top: 2rem;width:900px;">
               

                <div class="card-body"style="width: 100%">
                 
                   <h1>{{ $data->title}}</h1>

                    <?php 

                       $image=strip_tags($data->image);

                       $ext=pathinfo($image, PATHINFO_EXTENSION);


                     ?>

                     @if($ext=="jpg"|| $ext=="png" ||$ext =="bmp"||$ext=="gif")
                       <img src="http://localhost/blog/public/image/{{$image}}"height="400"style="width: 100%">

                     @else
                     
                     <video width="800"height="400"controls>
                             <source src="http://localhost/blog/public/image/{{$image }}" >
                     </video>  

                     @endif
                   <p>{{ $data->desc}}
                    An Operating System (OS) is an interface between a computer user and computer hardware. An operating system is a software which performs all the basic tasks like file management, memory management, process management, handling input and output, and controlling peripheral devices such as disk drives and printers.

Some popular Operating Systems include Linux Operating System, Windows Operating System, VMS, OS/400, AIX, z/OS, etc.

An Operating System (OS) is an interface between a computer user and computer hardware. An operating system is a software which performs all the basic tasks like file management, memory management, process management, handling input and output, and controlling peripheral devices such as disk drives and printers.

Some popular Operating Systems include Linux Operating System, Windows Operating System, VMS, OS/400, AIX, z/OS, etc.</p>


                    
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center mx-0 mx-md-auto">
        <div class="col-lg-10 col-md-11 px-1 px-sm-2">
            <div class="card border-0 px-3"style="border-radius: .5rem;box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); margin-top: 2rem;width:900px;">
                <!-- top row -->
                <div class="d-flex row py-5 px-5 bg-light">
                    <div class="green-tab p-2 px-3 mx-2">
                        <p class="sm-text mb-0">OVERALL RATING</p>
                        <h4>4.8</h4>
                    </div>
                    <div class="white-tab p-2 mx-2 text-muted">
                        <p class="sm-text mb-0">ALL REVIEWS</p>
                        <h4>124</h4>
                    </div>
                    <div class="white-tab p-2 mx-2">
                        <p class="sm-text mb-0 text-muted">POSITIVE REVIEWS</p>
                        <h4 class="green-text">93%</h4>
                    </div>
                    <div class="ml-md-auto p-2 mx-md-2 pt-4 pt-md-3"> <button class="btn btn-red px-4">WRITE A REVIEW</button> </div>
                </div> <!-- middle row -->
              

                <div class="row bg-light"style="text-align: center;">
                    
                
                   <form method="post"style="width:70%;margin-left: 10%">
                     <div class="form-group">
                        @csrf
                       <input type="number" id="rating"class="form-control"name="rating"placeholder="Enter Your Rating">

                     </div>
                     
                     <div class="form-group">


                        <textarea id="comment"class="form-control"placeholder="Your Comment"name="comment">
                            


                        </textarea>

                      </div>  

                      <div class="form-group">
                        <input type="hidden"id="k_id" name="k_id"value="{{$data->id}}">

                        <button type="button" class="btn btn-primary"onclick="Save()">Save Review</button>

                      </div>

                   </form>





                </div> <!-- Review by user -->
                <div class="review p-5">
                    
                   <div id="user_review">


                   </div>

                    <div class="row ml-1">
                        <div class="row bg-light via">
                            <div class="px-2"><img src="https://i.imgur.com/8lJt6UN.png" width="18px" height="18px"></div>
                            <p class="grey-text mb-0 px-3">via Google</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    
    function Save()
    {
      
        var k_id=$("#k_id").val();

        var rating=$("#rating").val();

        var comment=$("#comment").val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        $.ajax({

            method:"POST",
            url:"{{route('comment.store')}}",

            data:{k_id:k_id,rating:rating,comment:comment},
            success:function(data)
            {
   
               $("#user_review").html(data);
               
            }


        });
    }
</script>

@endsection