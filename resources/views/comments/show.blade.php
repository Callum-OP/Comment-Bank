@extends('base') 
@section('main') 
<div class="container"> 
    @if(session()->get('success')) 
    <div class="alert alert-success"> 
        {{ session()->get('success') }}   
    </div> 
    @endif  
    <body>
        <h1 id="header">View Comment Bank</h1>
        <div> 
        <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#results" class="btn btn-primary">To Results</a><a href="#terminology" class="btn btn-primary">To Terminology</a>
            <br></br> 
        </div> 
        <form method="post" action="{{ route('results.store')}}">
        <div id="selection">
            <h3>Selected Comments</h3>
            <p>You can copy the comments you want to use from here.</p>
            <p id="display" class="display"></p>
            <input type="button" class="btn btn-primary" value="Clear Selection" onclick="clearComments()">
        </div>
        <div id="results">
            <h3>Results Comments</h3>         
            <table class="table table-zebra"> 
                <div>
                    @foreach($results as $comment) 
                    <tr>
                        <td><input type="button" class="btn btn-action" value="Select" onclick="addComment({{$comment}})"> RE {{$comment->id}}. {{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}})<p></p></td> 
                    </tr>
                    @endforeach 
                </div>
            </table>
            <p></p>
            <a href="{{ route('results.create')}}" class="btn btn-primary">New Results Comment</a><a href="#header" class="btn btn-primary">To Header</a>
            <br></br>
        </div>
        <div id="terminology">
            <h3>Terminology Comments</h3>
            <table class="table table-zebra"> 
                <div>
                    @foreach($terminologies as $comment) 
                    <tr>
                        <td><input type="button" class="btn btn-action" value="Select" onclick="addComment({{$comment}})"> TE {{$comment->id}}. {{$comment->comment}}. ({{$comment->first_name}} {{$comment->last_name}})</p></td> 
                    </tr>
                    @endforeach 
                </div>
            </table>
            <p></p>
            <a href="{{ route('terminologies.create')}}" class="btn btn-primary">New Terminology Comment</a><a href="#header" class="btn btn-primary">To Header</a>
            <br></br>
        </div>
        <script>
            let output = "";
            let emptyOutput = "No comments added yet";
            document.getElementById("display").innerHTML = emptyOutput;
            function addComment(comment) {
                let txt = "";
                for (let x in comment) {
                    txt += comment[x] + "  ";
                };
                const myArray = txt.split("  ");
                output += myArray[3] + ".<br>";
                document.getElementById("display").innerHTML = output;
            }
            function clearComments() {
                output = "";
                document.getElementById("display").innerHTML = emptyOutput;
            }
        </script>
    </body>
</div>   