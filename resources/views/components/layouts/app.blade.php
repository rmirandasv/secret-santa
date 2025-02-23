<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col antialiased bg-cover bg-center bg-no-repeat"
  style='background-image: url("{{ asset('images/bg.jpg') }}");'>
  <main>
    {{ $slot }}
  </main>
  <x-footer />
  @stack('scripts')
</body>

</html>
