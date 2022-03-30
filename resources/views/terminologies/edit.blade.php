@extends('base')  
@section('main') 
<div class="container"> 
    <h1 class="display-3">Update Terminology Comment</h1>
    <div> 
        <a style="margin: 15px;" href="/" class = "btn btn-primary">Back to Main Menu</a>
        <br><p></p></br>
    </div> 
    @if ($errors->any()) 
    <div class="alert alert-danger"> 
        <ul> 
            @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
    </div> 
    <br />  
    @endif 
    <form method="post" action="{{ route('terminologies.update', $terminologies->id) }}"> 
        @method('PATCH')  
        @csrf 
        <div class="form-group">     
            <label for="comment">Comment:</label> 
            <input type="text" class="form-control" name="comment" required> 
        </div>  
        <div class="form-group"> 
        <label for="first_name">First Name:</label> 
            <input type="text" class="form-control" name="first_name" value={{ $terminologies->first_name }} /> 
        </div> 
        <div class="form-group"> 
            <label for="last_name">Last Name:</label> 
            <input type="text" class="form-control" name="last_name" value={{ $terminologies->last_name }} /> 
        </div> 
        <div class="form-group"> 
            <label for="email">Email:</label> 
            <input type="text" class="form-control" name="email" value={{ $terminologies->email }} /> 
        </div> 
        <div class="form-group"> 
            <label for="tone">Comment Tone:</label> 
            <input type="radio" class="form-control" name="tone" value="Positive">Positive</input>
            <input type="radio" class="form-control" name="tone" value="Negative">Negative</input>
        </div> 
        <button style="margin: 15px;" type="submit" class="btn btn-primary">Update</button> 
    </form> 
</div>  
@endsection