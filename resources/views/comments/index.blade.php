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
        <h1 id="header">View Comment Bank</h1>
        <div> 
        <a href="/" class="btn btn-primary">Back to Main Menu</a><a href="#results" class="btn btn-primary">To Results</a><a href="#terminology" class="btn btn-primary">To Terminology</a>
            <br></br> 
        </div> 
        <form method="post" action="{{ route('results.store')}}">
        <!-- Show Selected Comments -->
        <div id="selection">
            <h3>Selected Comments</h3>
            <input type="button" class="btn btn-primary" value="Copy Selection" onclick="copyComments()">
            <p>You can copy the comments you want to use from here.</p>
            <p id="display" class="display"></p>
            <input type="button" class="btn btn-primary" value="Clear Selection" onclick="clearComments()">
        </div>
        <!-- Show Results Comments -->
        <div id="results">
            <h3>Results Comments</h3>        
            <table class="table table-zebra">
                <thead>  
                    <td>Results and Analysis</td> 
                </thead> 
                <tbody>
                    @foreach($results as $comment) 
                    <tr>
                        <td><input type="button" class="btn btn-action" value="Select" onclick="addComment({{$comment}})"> RE. {{$comment->comment}} (by {{$comment->first_name}} {{$comment->last_name}})<p></p></td> 
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
            <table class="table table-zebra"> 
                <thead>  
                    <td>Method, Mathematics and Proper Terminology</td> 
                </thead> 
                <tbody>
                    @foreach($terminologies as $comment) 
                    <tr>
                        <td><input type="button" class="btn btn-action" value="Select" onclick="addComment({{$comment}})"> TE. {{$comment->comment}} (by {{$comment->first_name}} {{$comment->last_name}})</p></td> 
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            <p></p>
            <a href="{{ route('terminologies.create')}}" class="btn btn-primary">New Terminology Comment</a><a href="#header" class="btn btn-primary">To Header</a>
            <br></br>
        </div>
        <script>
            let output = "";
            let emptyOutput = "No comments added yet";
            document.getElementById("display").innerHTML = emptyOutput;
            
            //function to add comments to be displayed in selection
            function addComment(comment) {
                let txt = "";
                for (let x in comment) {
                    txt += comment[x] + "  ";
                };
                const myArray = txt.split("  ");
                output += myArray[3] + "<br>";
                document.getElementById("display").innerHTML = output;
            }
            //function to remove all comments being displayed in selection
            function clearComments() {
                output = "";
                document.getElementById("display").innerHTML = emptyOutput;
            }
            //function to copy comments in selection
            function copyComments() {
                var copy = document.getElementById("display").innerHTML;
                copy.select();
                navigator.clipboard.writeText("Hello World");
            }
        </script>
    </body>
</div>   