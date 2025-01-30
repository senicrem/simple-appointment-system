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
    <div class="flex justify-center m-32">
      <div class="p-2 w-[600px] h-[500px] bg-gray-300/60 backdrop-blur-lg">
        <livewire:custom-calendar />
      </div>
      <div class="w-72 bg-gray-700 px-7">
        <div class="pt-4 pb-2">
          <p class="text-xl text-center uppercase text-orange-500">Appointments</p>
          <p class="text-center text-sm uppercase font-sans text-slate-300">Today</p>
        </div>
        <div class="flex justify-center m-0 p-0">
          <hr class="w-20 bg-gray-500 h-1 text-gray-500">
        </div>
        <div class="mt-7 space-y-2">
          <div class="text-cyan-400 text-bold border-b-2 py-1 cursor-pointer">
            <p class="uppercase">Sleep</p>
          </div>
          <div class="text-cyan-400 text-bold border-b-2 py-1 cursor-pointer">
            <p class="uppercase">eat</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>