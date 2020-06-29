<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Facebook') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="bg-fixed" style="background-image: url(/images/bg5.jpg)">
    <div id="app">
        
            
        <section class="px-8 py-4 mb-6 ">
            @if (auth()->user())
            <header class="container mx-auto ">
              <ul class="flex">
                  <li class="mr-6">
                    <a href="/posts"> 
                        <img src="/images/logo.svg" alt="facebook">
                    </a>
                  </li>
                <li class="mr-6 mt-3">
                    <input class="border-2 border-black rounded-lg w-full" type="text" placeholder="Search..">
                </li>
                {{-- <li class="mr-6 mt-3">
                    <h1 class="border-2 border-black rounded-lg w-full">
                        Groups
                    </h1>
                </li>
                <li class="mr-6 mt-3">
                    <h1 class="border-2 border-black rounded-lg w-full ">
                        Pages
                    </h1>
                </li> --}}


            </ul>
            </header>
            @endif
        </section>
        
          {{ $slot }}
    </div>
</body>
</html>
