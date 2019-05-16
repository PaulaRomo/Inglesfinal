<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <style media="screen">
        html, body {
            background-image:linear-gradient(to bottom,
            rgba(211,135,20, .6),
            rgba(29,241,171, .6),
            rgba(7,109,150, .45)
      ), url({{asset('imagenes/computo.jpg')}});;
            background-repeat:no-repeat;
            background-size: cover;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

    </style>
    <body>
        <div id="app">
          <nav style="background:transparent;" class="navbar navbar-expand-md navbar-light navbar-laravel">
              <div class="container">
                <img alt="" src="{{asset('imagenes/logofinal0.png')}}" style="height:50px; width:50px;">
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
                           <li class="nav-item dropdown">
                                <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  Usuario <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @auth
                              @if ( Auth::user()->rol=='Administrador')
                                <li class="nav-item dropdown">
                                     <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                         Group <span class="caret"></span>
                                     </a>

                                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="{{ url('grupos') }}">
                                           Group
                                         </a>
                                         <a class="dropdown-item" href="{{ route('grupos.create') }}">
                                           Create group
                                         </a>
                                     </div>
                                 </li>
                                 <li class="nav-item dropdown">
                                      <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                          Register <span class="caret"></span>
                                      </a>

                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="{{ route('alumnos.create') }}">
                                            Student
                                          </a>
                                          <a class="dropdown-item" href="{{ route('docentes.create') }}">
                                            Teacher
                                          </a>
                                      </div>
                                  </li>

                                   <li class="nav-item dropdown">
                                     <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                         User <span class="caret"></span>
                                     </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/alumnos') }}">
                                                  Student
                                                </a>
                                                <a class="dropdown-item" href="{{ url('/docentes') }}">
                                                  Teacher
                                                </a>
                                            </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                             <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('grupos') }}">
                                               Ratings
                                             </a>
                                     </li>
                                    <li class="nav-item dropdown">
                                             <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('home') }}">
                                               Home
                                             </a>
                                     </li>
                              @endif
                              @if ( Auth::user()->rol=='Docente')
                                    <li class="nav-item dropdown">
                                             <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('home') }}">
                                               Home
                                             </a>
                                     </li>
                                     <li class="nav-item dropdown">
                                              <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('grupos') }}">
                                                Groups
                                              </a>
                                      </li>
                                      <li class="nav-item dropdown">
                                               <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('grupos') }}">
                                                 Ratings
                                               </a>
                                      </li>
                              @endif
                              @if ( Auth::user()->rol=='Alumno')
                                    <li class="nav-item dropdown">
                                        <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('home') }}">
                                          Home
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a style="color:White;" id="navbarDropdown" class="nav-link dropdown-item" href="{{ url('grupos') }}">
                                          Ratings
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item" href="{{ url('profile') }}">
                                            {{ __('Profile') }}
                                        </a>
                                    </li>
                              @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @include('sweetalert::alert')
    </body>
    </html>
