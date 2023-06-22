<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="{{ asset('images/logo.png') }}"
      type="image/x-icon"
    />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  </head>
  <body>
      @yield('content')

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
