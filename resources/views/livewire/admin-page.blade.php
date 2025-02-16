<div class="h-screen w-full bg-gray-100 flex justify-center items-center">
    <div class="font-mono bg-slate-300 p-4 w-[55rem]">
        <div class="flex justify-between items-center mb-2">
            <p class="text-4xl uppercase font-bold">Sessions</p>
            <div class="text-xl bg-white px-2 py-1">
                <span>Month</span>
                <select wire:change="changeMonth($event.target.value)">
                    @for ($i = 1; $i <= 12; $i++)
                        <option 
                            value="{{ $i }}"
                            {{ $i == $month ? 'selected' : '' }}
                        >{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <hr>
        <div class="max-h-[500px] overflow-y-auto">
            @if(empty($appointments))
                <div class="w-full text-center">
                    No Session/s for this month. {{ $month }}
                </div>
            @endif

            @foreach($appointments as $appointment)
                @foreach($appointment as $p)
                <div class="group">
                    <div class="text-sm p-2 border-b-1 border-slate-800 group-hover:bg-slate-200 transition-all delay-100">
                        <div class="flex justify-between">
                            <p class="text-lg">{{ $p['name'] }}</p>
                            <div class="text-lg">{{ $p['scheduled_date'] }}</div>
                        </div>
                        <div class="flex justify-between">
                            <p>{{$p['concern']}}</p>
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                                <button class="bg-green-700 px-3 py-1 text-white cursor-pointer hover:bg-green-600">Done</button>
                                <button class="bg-red-700 px-3 py-1 text-white cursor-pointer hover:bg-red-600">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
