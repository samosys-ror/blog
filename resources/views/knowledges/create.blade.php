@extends('layouts.app')


@section('content')
 
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>


 <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">   </h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('knowledge.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>  

                             <div class="form-group">
                                <label>Select Media</label>
                                <input type="file" name="image" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea id="summernote" class="summernote form-control" name="desc"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  
   





@endsection