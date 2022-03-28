@extends('base') 

@section('main') 
<div class="row"> 
<div class="container"> 
@if(session()->get('success')) 
    <div class="alert alert-success"> 
      {{ session()->get('success') }}   
    </div> 
@endif 
</div> 
    <body>
        <h1>View Comment Bank</h1> 
        <div> 
            <a style="margin: 15px;" href="/" class = "btn btn-primary">Main Menu</a>
            <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New comment</a>
            <br></br> 
        </div>
        <div> 
            @foreach($comments as $comment) 
            <div>
                <p><input type="checkbox" name="select"> {{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}}), {{$comment->id}}<p></p></p> 
            </div>
            @endforeach 
        </div>
    </body>
</div>  
</div> 