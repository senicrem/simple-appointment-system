<!doctype html>
<html>
  <head>
    <title>Appointment System | Admin</title>
    <link rel="icon" type="image/x-icon" href="/favicon_io/favicon.ico">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif
  </head>
  <body>
    <livewire:admin-page />
  </body>
</html>