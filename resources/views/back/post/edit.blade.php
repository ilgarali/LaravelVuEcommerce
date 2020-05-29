@extends('back.layouts.master')
@section('content')
<div class="col-md-12">
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('admin.post.update',$post->id)}}">
          @csrf
          @method('PUT')            
            <div class="form-group">
              <label for="exampleInputName1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputName1" value="{{$post->title}}">
            </div>
            
              <div class="form-group">
                <label for="exampleInputName1">Price</label>
                <input name="price" type="number" class="form-control" id="exampleInputName1" value="{{$post->price}}">
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Featured</label>
                <select class="form-control" name="featured" id="">
                 
                      
                  
                    <option  @if ($post->featured == 1)   selected @endif value="1">Featured</option>
                    <option @if ($post->featured == 0)   selected @endif value="0">Not in Featured</option>
                   
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Select Category</label>
                <select class="form-control" name="category" id="">
                    @foreach ($categories as $category)
                        
                   
                <option @if ($post->category_id == $category->id)
                    selected
                @endif
                 value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
              </div>
    
    
        
            <div class="form-group">
              <label>Image upload</label>
              <input type="file" name="img" class="form-control" multiple="">
            <img src="{{asset($post->img)}}" class="img-fluid" alt="{{$category->title}}">
            </div>
           
            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
            <textarea name="content" class="form-control" id="exampleTextarea1" rows="4">{{$post->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
           
          </form>
        </div>
</div>
@endsection