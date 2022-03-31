<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div id="container">
        <!-- Header -->
        <head>
        @if(session()->get('failed')) 
        <div class="alert"> 
            {{ session()->get('failed') }}  
        </div> 
        @endif
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Comment Bank</title>

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css"/> 
        </head>
        <!-- Body -->
        <body>
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </div>
                <!-- PopUp/Modal Login Page -->
                <div id="login" class="modal">
                    <form class="modal-content" action="{{ route('verify.store')}}" method="post">
                    @csrf
                        <div class="imgcontainer">
                            <img src="images/Profile.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <P>Login as Admin</p>
                            <label for="uname"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required autocomplete="off">

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                                
                            <button type="submit" class="btn btn-primary">Login</button>
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('login').style.display='none'">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- Main Menu -->
                <div class="content">
                    <img src="images/Comment.png" alt="Symbol for Comment">
                    <div class="title">
                        Comment Bank
                    </div>

                    <div class="links">
                        <a class="btn btn-primary" href="comments/"><b>View Comments</b></a>
                        <button class="btn btn-primary" onclick="document.getElementById('login').style.display='block'">Verify Comments</button>
                    </div>

                    <script>
                    // Get the login element
                    var modal = document.getElementById('login');

                    // When user clicks outside of login, close the login
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    </script>
                </div>
            </div>
        </body>
    </div>
</html>
