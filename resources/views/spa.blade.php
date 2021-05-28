@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
    'data' => [
      'user' => Auth::user(),
    ],
    'wsURL' => env('WS_URL'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="light-style">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  <!-- Main font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ mix('/vendor/fonts/ionicons.css') }}">
  <link rel="stylesheet" href="{{ mix('/vendor/fonts/linearicons.css') }}">
  <!-- <link rel="stylesheet" href="{{ mix('/vendor/fonts/open-iconic.css') }}"> -->
  <!-- <link rel="stylesheet" href="{{ mix('/vendor/fonts/pe-icon-7-stroke.css') }}"> -->

  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">

  <!-- Layout helpers -->
  <script src="{{ mix('/vendor/js/layout-helpers.js') }}"></script>

  <!-- IE10 polyfills (remove if you don't plan to support IE10) -->
  <script>
    if (navigator.userAgent.match('MSIE 10.0;')) {
        document.write('<script src="https:\/\/cdn.polyfill.io\/v2\/polyfill.min.js?features=Intl.~locale.en"><\/script>');
    }
  </script>
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>
