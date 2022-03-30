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
      <a href="/" class="btn btn-primary">Back to Main Menu</a>
      <br></br> 
    </div>
    <div id="unverified"> 
      <h3>Unverified Comments</h3>
            @foreach($unverified as $comment) 
            <form action="{{ route('comments.store')}}" method="post"> 
            @csrf 
            <label for="comment">Comment:</label> 
            <input type="text" class="form-control" name="id" value="{{$comment->id}}">
            <input type="text" class="form-control" name="comment" value="{{$comment->comment}}">
            <label for="comment">Contributer:</label> 
            <input type="text" class="form-control" name="first_name" value="{{$comment->first_name}}">
            <input type="text" class="form-control" name="last_name" value="{{$comment->last_name}}">
            <input type="text" class="form-control" name="email" value="{{$comment->email}}">
            <label for="comment">Tone:</label> 
            <input type="text" class="form-control" name="tone" value="{{$comment->tone}}">
            <label for="comment">Type:</label> 
            <input type="text" class="form-control" name="type" value="{{$comment->type}}">
            <button class="btn btn-primary" type="submit">Verify</button> 
            </form> 
            @endforeach 
        </tbody> 
      </table> 
    </div>
    <div id="verified"> 
      <h3>Verified Comments</h3>
    <div id="results"> 
      <h3>Results Comments</h3>
      <p>Results and Analysis</p>        
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
                    <form action="{{ route('results.destroy', $comment->id)}}" method="post"> 
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
      <p>Method, Mathematics and Proper Terminology</p>        
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
                    <form action="{{ route('terminologies.destroy', $comment->id)}}" method="post"> 
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