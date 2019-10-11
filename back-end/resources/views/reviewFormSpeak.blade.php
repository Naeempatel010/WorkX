<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Speech to text conversion using JavaScript</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="/showInvestments">
                                        My Investments
                                    </a>

                                    <a class="dropdown-item" href="/showIdeas">
                                        My Ideas
                                    </a>

                                    <a class="dropdown-item" href="/showStartups">
                                        My Start-ups
                                    </a>

                                    <a class="dropdown-item" href="/myApplications">
                                        My Job Applications
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Post Review</div>

                            <div class="card-body">
                                <form method="POST" action="/postReviewAudio">
                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control" name="title">
                                        </div>

                                        <!-- <button type="button" id="start-btn" title="Start">Start</button> -->

                                        <!-- <span id="instructions">Press the Start button</span> -->
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control" name="description">
                                        </div>

                                        <!-- <button type="button" id="start-btn" title="Start">Start</button> -->

                                        <!-- <span id="instructions" style="float:right;">Press the Start button</span> -->
                                    </div>

                                    <div class="form-group row">
                                        <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>

                                        <div class="input col-md-6">
                                            <textarea class="form-control" name="review" id="textbox" rows="1"></textarea>

                                            <!-- <input type="hidden" name="review"> -->
                                        </div>

                                        <button type="button" id="start-btn" title="Start" onclick="record()">Start</button>

                                        <!-- <span id="instructions">Press the Start button</span> -->
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Submit Review
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //console.log('chal jaa');
        var SpeechRecognition = window.webkitSpeechRecognition;  
        var recognition = new SpeechRecognition();
        //console.log('api running');
        
        /*var title = $('#title');
        var description = $('#description');
        var review = $('#review');*/
        
        var Textbox = $('#textbox');
        //var instructions = $('instructions');
        var Content = '';
        recognition.continuous = true;
        //console.log('before function');
        
        recognition.onresult = function(event)
        {
            console.log("Inside function");
          var current = event.resultIndex;
            var transcript = event.results[current][0].transcript;
            Content += transcript;
        console.log(Content);

        document.getElementById('textbox').innerHTML = Content; 

        /*Textbox.val(Content);*/
        };
             
        /*recognition.onstart = function() {
        instructions.text('Voice recognition is ON.');
        }
         
        recognition.onspeechend = function() {
          instructions.text('No activity.');
        }
         
        recognition.onerror = function(event) {
          if(event.error == 'no-speech') {
            instructions.text('Try again.');  
          }
        }*/
         
        function record(){
            if (Content.length) {
            Content += ' ';
            console.log('Button clicked');
          }
          else{
            console.log("else in button clicked");
          }
          recognition.start();
        console.log('recording start');
        }

        /*document.getElementById('start-btn').addEventListener('click', function(){
            if (Content.length) {
            Content += ' ';
            console.log('Button clicked');
          }
          else{
            console.log("else in button clicked");
          }
          recognition.start();
        console.log('recording start');    
        });*/
        /*$('#start-btn').on('click', function(e) {
          if (Content.length) {
            Content += ' ';
            console.log('Button clicked');
          }
          else{
            console.log("else in button clicked");
          }
          recognition.start();
        console.log('recording start');
        });*/

         
        /*Textbox.on('input', function() {
          Content = $(this).val();
        })*/

        Textbox.on('input', function() {
            Content = $(this).val();
        });
    </script>


</body>
</html>

