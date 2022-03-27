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
          <td>Select</td>
          <td>Comment</td> 
          <td>Name</td>  
        </tr> 
    </thead> 
    <tbody> 
        @foreach($comments as $comment) 
        <tr> 
            <td><input type="checkbox" name="select" required> </td> 
            <td>{{$comment->comment}}</td> 
            <td>{{$comment->first_name}} {{$comment->last_name}}</td>  
        </tr> 
        @endforeach 
    </tbody> 
  </table> 
<div> 
</div> 
@endsection 