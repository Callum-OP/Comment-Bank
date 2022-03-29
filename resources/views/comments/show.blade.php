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
        <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#results" class="btn btn-primary">Results</a><a href="#terminology" class="btn btn-primary">Terminology</a>
            <br></br> 
        </div> 
        <div id="results">
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
            <a href="{{ route('results.create')}}" class="btn btn-primary">New Results Comment</a>
            <br></br>
        </div>
        <div id="terminology">
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
            <a href="{{ route('terminologies.create')}}" class="btn btn-primary">New Terminology Comment</a>
            <br></br>
        </div>
    </body>
</div>  
</div> 