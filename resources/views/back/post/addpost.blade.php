@extends('back.layouts.master')
@section('content')
<div class="col-md-12">
    <div class="card-body">
     
        <form class="forms-sample" enctype="multipart/form-data" method="POST"
    action="{{route('admin.post.store')}}">
          @csrf            
            <div class="form-group">
              <label for="exampleInputName1">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Title">
            </div>
            
              <div class="form-group">
                <label for="exampleInputName1">Price</label>
                <input name="price" type="number" class="form-control" id="exampleInputName1" placeholder="Price">
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Featured</label>
                <select class="form-control" name="featured" id="">
                  
                    <option value="1">Featured</option>
                    <option value="0">Not in Featured</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Select Category</label>
                <select class="form-control" name="category" id="">
                    @foreach ($categories as $category)
                        
                   
                <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
              </div>
    
    
        
            <div class="form-group">
              <label>Image upload</label>
              <input type="file" name="img" class="form-control" >
              
            </div>
           
            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
              <textarea name="content" class="form-control" id="exampleTextarea1" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
           
          </form>
        </div>
</div>
@endsection