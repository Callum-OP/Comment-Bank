@extends('base') 

@section('main') 
<div class="row"> 
<div class="col-sm-12">  
@if(session()->get('success')) 
    <div class="alert alert-success"> 
      {{ session()->get('success') }}   
    </div> 
@endif 
</div> 
    <h1 class="display-3">Comments</h1>
    <div> 
    <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New comment</a> 
    <br></br>
    </div>        
  <table class="table table-striped"> 
    <thead> 
        <tr> 
          <td>ID</td>
          <td>Comment</td> 
          <td>Name</td> 
          <td>Email</td> 
          <td>Tone</td>  
          <td colspan = 2>Actions</td> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach($comments as $comment) 
        <tr> 
            <td>{{$comment->id}}</td> 
            <td>{{$comment->comment}}</td> 
            <td>{{$comment->first_name}} {{$comment->last_name}}</td> 
            <td>{{$comment->email}}</td> 
            <td>{{$comment->tone}}</td>
            <td> 
                <a href="{{ route('comments.edit',$comment->id)}}" class="btn btn-primary">Edit</a> 
            </td> 
            <td> 
                <form action="{{ route('comments.destroy', $comment->id)}}" method="post"> 
                  @csrf 
                  @method('DELETE') 
                  <button class="btn btn-danger" type="submit">Delete</button> 
                </form> 
            </td> 
        </tr> 
        @endforeach 
    </tbody> 
  </table> 
<div> 
</div> 
@endsection 