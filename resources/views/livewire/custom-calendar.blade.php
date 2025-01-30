<div class="w-full h-full">
    <div class="flex gap-2 text-2xl justify-between items-center p-3">
        <div class="cursor-pointer hover:text-blue-500" wire:click="changeMonth('previous')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M9.195 18.44c1.25.714 2.805-.189 2.805-1.629v-2.34l6.945 3.968c1.25.715 2.805-.188 2.805-1.628V8.69c0-1.44-1.555-2.343-2.805-1.628L12 11.029v-2.34c0-1.44-1.555-2.343-2.805-1.628l-7.108 4.061c-1.26.72-1.26 2.536 0 3.256l7.108 4.061Z" />
            </svg>
        </div>
        <div class="uppercase font-bold text-gray-800">
            {{ DateTime::createFromFormat('!m', $selectedMonth)->format('F')  }} ({{ $currYear }})
        </div>
        <div class="cursor-pointer hover:text-blue-500" wire:click="changeMonth('next')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628L12 14.471v2.34c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256l-7.108-4.061C13.555 6.346 12 7.249 12 8.689v2.34L5.055 7.061Z" />
            </svg>
        </div>
    </div>

    <div class="grid grid-cols-7 border-t-2 text-gray-700 border-gray-200 font-semibold">
        <div class="uppercase p-2 text-center truncate">Sun</div>
        <div class="uppercase p-2 text-center truncate">Mon</div>
        <div class="uppercase p-2 text-center truncate">Tue</div>
        <div class="uppercase p-2 text-center truncate">Wed</div>
        <div class="uppercase p-2 text-center truncate">Thu</div>
        <div class="uppercase p-2 text-center truncate">Fri</div>
        <div class="uppercase p-2 text-center truncate">Sat</div>
    </div>

    <div class="grid grid-cols-7 min-h-96 text-gray-700">
        @foreach($calendatDateMatrix as $dates)
            @if (is_null($dates))
                <div></div>
            @elseif (!$dates['is_active_day'] && !$dates['is_the_current_day'])
                <div class="flex justify-center items-center text-md">
                    {{ $dates['day'] }}
                </div>
            @elseif($dates['is_the_current_day'])
                <div class="flex justify-center items-center">
                    <span class="flex justify-center items-center w-10 h-10 text-md rounded-full bg-blue-500 text-white font-semibold">
                        {{ $dates['day'] }}
                    </span>
                </div>
            @elseif ($dates['is_active_day'])
                <div class="flex justify-center items-center text-md hover:border-gray-400 cursor-pointer transition duration-300 hover:scale-150">
                    {{ $dates['day'] }}
                </div>
            @endif
        @endforeach
    </div>
</div>
