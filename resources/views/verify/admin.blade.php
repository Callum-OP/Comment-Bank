@extends('base') 
@section('main') 
<div class="container">  
  @if(session()->get('success')) 
  <div class="alert alert-success"> 
    {{ session()->get('success') }}   
  </div> 
  @endif  
  <body>
    <!-- Header -->
    <h1 id="header">Verify Comment Bank</h1>
    <div> 
      <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#unverified" class="btn btn-primary">To Unverified</a><a href="#verified" class="btn btn-primary">To Verified</a>
      <br></br> 
    </div>
    <!-- Show Unverified Comments -->
    <div id="unverified"> 
      <h2>Approve Unverified Comments</h2>  
      @foreach($unverified as $comment) 
      <form action="{{ route('comments.store')}}" method="post"> 
      @csrf 
      <input type="hidden" class="form-control" name="id" value="{{$comment->id}}">
      <label for="comment">Comment:</label> 
      <input type="text" class="form-control" name="comment" value="{{$comment->comment}}">
      <label for="details">Context:</label>
      <input type="text" class="form-control" name="details" value="{{$comment->tone}} {{$comment->type}} comment by {{$comment->first_name}} {{$comment->last_name}}, ({{$comment->email}}).">
      <input type="hidden" class="form-control" name="first_name" value="{{$comment->first_name}}">
      <input type="hidden" class="form-control" name="last_name" value="{{$comment->last_name}}">
      <input type="hidden" class="form-control" name="email" value="{{$comment->email}}">
      <input type="hidden" class="form-control" name="tone" value="{{$comment->tone}}">
      <input type="hidden" class="form-control" name="type" value="{{$comment->type}}">
      <button class="btn btn-primary" type="submit">Approve</button> 
      </form>
      <form action="{{ route('verify.destroy', $comment->id)}}" method="post"> 
        @csrf        
        @method('DELETE') 
        <button style="margin-left:15px" class="btn btn-danger" type="submit">Disapprove</button> 
        <br></br>
      </form> 
      @endforeach  
    </div>
    <!-- Show Verified Comments -->
    <div id="verified"> 
      <h2>Modify Verified Comments</h2>
      <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#results" class="btn btn-primary">To Results</a><a href="#terminology" class="btn btn-primary">To Terminology</a>
    <!-- Show Results Comments -->
    <div id="results"> 
      <h3>Results Comments</h3>
      <p>Results and Analysis</p>        
      <table class="table table-zebra"> 
        <thead> 
            <tr> 
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
    <!-- Show Terminology Comments -->
    <div id="terminology"> 
      <h3>Terminology Comments</h3>
      <p>Method, Mathematics and Proper Terminology</p>        
      <table class="table table-zebra"> 
        <thead> 
            <tr> 
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