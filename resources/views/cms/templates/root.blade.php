<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shecodes.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>

    @include('cms.templates.side_nav')

    <main id="app">

      <div class="container">
        @yield('content')
      </div>

    </main>

  </body>
</html>
