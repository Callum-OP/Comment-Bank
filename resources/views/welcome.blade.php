<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div id="container">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Comment Bank</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

            <!-- Styles -->
            <link href="{{ asset('css/bank.css') }}" rel="stylesheet" type="text/css"/>
            <style> 
                .full-height {
                    height: 70vh;
                }

                .flex-center {
                    align-items: center;
                    display: flex;
                    justify-content: center;
                }

                .position-ref {
                    position: relative;
                }

                .top-right {
                    position: absolute;
                    right: 10px;
                    top: 18px;
                }

                .content {
                    text-align: center;
                }

                .title {
                    font-size: 84px;
                }

                .links > a {
                    color: #636b6f;
                    padding: 8px 8px 8px 8px;
                    font-size: 13px;
                    font-weight: 600;
                    letter-spacing: .1rem;
                    text-decoration: none;
                    text-transform: uppercase;
                }

                .m-b-md {
                    margin-bottom: 30px;
                }
            </style>
        </head>
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

                <div class="content">
                <img src="images/Comment.png" alt="Symbol for Comment">
                    <div class="title m-b-md">
                        Comment Bank
                    </div>

                    <div class="links">
                        <a style="margin: 15px;" class="btn btn-primary" href="comments/view"><b>View Comments</b></a>
                        <a style="margin: 15px;" class="btn btn-primary" href="comments/"><b>Modify Comments</b></a>
                        <a style="margin: 15px;" class="btn btn-primary" href="verify/"><b>Verify Comments</b></a>
                    </div>
                </div>
            </div>
        </body>
    </div>
</html>
