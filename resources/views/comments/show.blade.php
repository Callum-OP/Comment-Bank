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
            <a style="margin: 15px;" href="/" class = "btn btn-primary">Back to Main Menu</a>
            <br></br> 
        </div>
        <h3>Results Comments</h3>         
        <table class="table table-zebra"> 
            <div>
                @foreach($results as $comment) 
                <tr>
                    <td><input type="checkbox" name="select"> {{$comment->id}}. {{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}})<p></p></td> 
                </tr>
                @endforeach 
            </div>
        </table>
        <p></p>
        <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New Results Comment</a>
        <br></br>
        <h3>Terminology Comments</h3>
        <table class="table table-zebra"> 
            <div>
                @foreach($terminologies as $comment) 
                <tr>
                    <td><input type="checkbox" name="select"> {{$comment->id}}. {{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}})<p></p></td> 
                </tr>
                @endforeach 
            </div>
        </table>
        <p></p>
        <a style="margin: 15px;" href="{{ route('comments.create')}}" class="btn btn-primary">New Terminology Comment</a>
        <br></br>
    </body>
</div>  
</div> 