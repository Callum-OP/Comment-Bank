@extends('base') 

@section('main') 
<div class="row"> 
<div class="col-sm-12"> 
    <body>
        <h1>View Comment Bank</h1> 
        <div> 
            <a style="margin: 15px;" href="/" class = "btn btn-primary">Main Menu</a>
            <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New comment</a>
            <br></br> 
        </div>
        @foreach($comments as $comment) 
        <div>
            <p><input type="checkbox" name="select">{{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}}), {{$comment->id}}<p></p></p> 
            @endforeach 
        </div>
        <div class="output">
        </div> 
    </body>
</div>  
</div> 