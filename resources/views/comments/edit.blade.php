@extends('base')  
@section('main') 
<div class="row"> 
    <div class="col-sm-8 offset-sm-2"> 
        <h1 class="display-3">Update a comment</h1> 
@if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
        <br />  
        @endif 
        <form method="post" action="{{ route('comments.update', $comment->id) }}"> 
            @method('PATCH')  
            @csrf 
            <div class="form-group">     
              <label for="comment">Comment:</label> 
              <input type="text" class="form-control" name="comment" required> 
          </div>  
            <div class="form-group"> 
            <label for="first_name">First Name:</label> 
                <input type="text" class="form-control" name="first_name" value={{ $comment->first_name }} /> 
            </div> 
            <div class="form-group"> 
                <label for="last_name">Last Name:</label> 
                <input type="text" class="form-control" name="last_name" value={{ $comment->last_name }} /> 
            </div> 
            <div class="form-group"> 
                <label for="email">Email:</label> 
                <input type="text" class="form-control" name="email" value={{ $comment->email }} /> 
            </div> 
            <div class="form-group"> 
              <label for="tone">Comment Tone:</label> 
              <input type="radio" class="form-control" name="tone" value="positive">Positive</input>
              <input type="radio" class="form-control" name="tone" value="negative">Negative</input>
          </div> 
            <button type="submit" class="btn btn-primary">Update</button> 
        </form> 
    </div> 
</div> 
@endsection