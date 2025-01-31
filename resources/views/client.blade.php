<!doctype html>
<html class=h-full>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif
  </head>
  <body class="bg-linear-to-t from-sky-500 to-indigo-500">
      <div class="flex mt-32 justify-center">
        <livewire:custom-calendar  />
      </div>
  </body>
</html>