<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif
  </head>
  <body>
    <div>
      <div class="bg-gray-200 p-2">
        <livewire:custom-calendar />
      </div>
        {{-- <livewire:appointment /> --}}
    </div>
  </body>
</html>