@extends('base') 

@section('main') 
<div class="row"> 
<div class="col-sm-12"> 
    <h1>Comment Bank</h1> 
    <div> 
        <a style="margin: 15px;" href="/comments" class = "btn btn-primary">Main Menu</a>
        <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New comment</a>
        <br></br> 
    </div>
    <table class="table table-display"> 
    <tbody> 
        @foreach($comments as $comment) 
        <tr> 
            <td><input type="checkbox" name="select"></td> 
            <td>{{$comment->comment}}</td> 
            <td>{{$comment->first_name}} {{$comment->last_name}}</td> 
        </tr> 
        @endforeach 
    </tbody> 
  </table>
  <div class="output">
</div>  
</div> 
</div> 