<div class="w-full">
    <div class="flex gap-2 font-extrabold text-3xl justify-between items-center p-3">
        <div class="cursor-pointer hover:text-blue-500" wire:click="changeMonth('previous')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M9.195 18.44c1.25.714 2.805-.189 2.805-1.629v-2.34l6.945 3.968c1.25.715 2.805-.188 2.805-1.628V8.69c0-1.44-1.555-2.343-2.805-1.628L12 11.029v-2.34c0-1.44-1.555-2.343-2.805-1.628l-7.108 4.061c-1.26.72-1.26 2.536 0 3.256l7.108 4.061Z" />
            </svg>
        </div>
        <div class="uppercase">{{ DateTime::createFromFormat('!m', $selectedMonth)->format('F'); }}</div>
        <div class="cursor-pointer hover:text-blue-500" wire:click="changeMonth('next')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628L12 14.471v2.34c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256l-7.108-4.061C13.555 6.346 12 7.249 12 8.689v2.34L5.055 7.061Z" />
            </svg>
        </div>
    </div>

    <div class="grid grid-cols-7 border-t-2 border-white text-xl">
        <div class="font-bold uppercase p-2 text-center">Sunday</div>
        <div class="font-bold uppercase p-2 text-center">Monday</div>
        <div class="font-bold uppercase p-2 text-center">Tuesday</div>
        <div class="font-bold uppercase p-2 text-center">Wednesday</div>
        <div class="font-bold uppercase p-2 text-center">Thursday</div>
        <div class="font-bold uppercase p-2 text-center">Friday</div>
        <div class="font-bold uppercase p-2 text-center">Saturday</div>
    </div>

    <div class="grid grid-cols-7 h-[calc(100vh-125px)]">
        @foreach($calendatDateMatrix as $dates)
        @if(!is_null($dates) && $dates['full_date'] === $dateNow)
                <div class="flex items-center justify-center w-full h-full">
                    <span class="bg-blue-700 text-white w-10 h-10 flex items-center justify-center rounded-full">
                        {{ $dates['day'] }}
                    </span>
                </div>
            @elseif (is_null($dates))
                <div class="flex items-center justify-center w-full h-full"></div>
            @else
                <div class="flex items-center justify-center w-full h-full">{{ $dates['day'] }}</div>
            @endif
        @endforeach
    </div>
</div>
