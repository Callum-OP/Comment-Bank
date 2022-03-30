@extends('base') 
@section('main') 
<div class="container">  
  @if(session()->get('success')) 
  <div class="alert alert-success"> 
    {{ session()->get('success') }}   
  </div> 
  @endif  
  <body>
    <h1 id="header">Verify Comment Bank</h1>
    <div> 
      <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#results" class="btn btn-primary">To Results</a><a href="#terminology" class="btn btn-primary">To Terminology</a>
      <br></br> 
    </div>
    <div id="results"> 
      <h3>Results Comments</h3>
      <table class="table table-zebra"> 
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
            @foreach($results as $comment) 
            <tr> 
                <td>{{$comment->id}}</td> 
                <td>{{$comment->comment}}</td> 
                <td>{{$comment->first_name}} {{$comment->last_name}}</td> 
                <td>{{$comment->email}}</td> 
                <td>{{$comment->tone}}</td>
                <td> 
                    <a href="{{ route('results.edit',$comment->id)}}" class="btn btn-action">Edit</a> 
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
      <p></p>
      <a href="{{ route('results.create')}}" class="btn btn-primary">New Results Comment</a><a href="#header" class="btn btn-primary">To Header</a>
      <br></br>
    </div>
    <div id="terminology"> 
      <h3>Terminology Comments</h3>
      <table class="table table-modify"> 
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
            @foreach($terminologies as $comment) 
            <tr> 
                <td>{{$comment->id}}</td> 
                <td>{{$comment->comment}}</td> 
                <td>{{$comment->first_name}} {{$comment->last_name}}</td> 
                <td>{{$comment->email}}</td> 
                <td>{{$comment->tone}}</td>
                <td> 
                    <a href="{{ route('terminologies.edit',$comment->id)}}" class="btn btn-action">Edit</a> 
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
      <p></p>
      <a href="{{ route('terminologies.create')}}" class="btn btn-primary">New Terminology Comment</a><a href="#header" class="btn btn-primary">To Header</a>
      <br></br>
    </div>
  </body>
</div> 
@endsection 