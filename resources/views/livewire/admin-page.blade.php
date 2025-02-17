<div class="h-screen w-full bg-gray-100 flex justify-center items-center">
    <div class="font-mono bg-slate-300 p-4 w-[55rem]">
        <div class="flex justify-between items-center mb-2">
            <p class="text-4xl uppercase font-bold">Sessions</p>
            <div class="flex gap-2">
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
                <div class="text-xl bg-white px-2 py-1">
                    <span>Year</span>
                    <select wire:change="changeYear($event.target.value)">
                        @for ($j = 2024; $j <= 2030; $j++)
                        <option 
                        value="{{ $j }}"
                        {{ $j == $year ? 'selected' : '' }}
                        >{{ $j }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="max-h-[500px] overflow-y-auto">
            @if(empty($appointments))
                <div class="w-full text-center">
                    No Session/s for this month. ({{ $month }}/{{ $year}})
                </div>
            @endif

            @foreach($appointments as $appointment)
                @foreach($appointment as $p)
                <div class="group">
                    <div class="text-sm p-2 border-b-1 border-slate-800 group-hover:bg-slate-200 transition-all delay-100">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-lg">{{ $p['name'] }}</p>
                            </div>
                            <div class="text-lg">{{ $p['scheduled_date'] }}</div>
                        </div>
                        <div class="flex justify-between">
                            <p>{{$p['concern']}}</p>
                            @if ($p['status'] === 'completed')
                            <div>
                                <p class="bg-green-700 px-3 py-1 text-white">Completed</p>
                            </div>
                            @elseif ($p['status'] === 'cancel')
                            <div>
                                <p class="bg-red-700 px-3 py-1 text-white">Cancelled</p>
                            </div>
                            @else
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                                <button wire:click="onCompleted({{ $p['id'] }})" class="border-2 border-green-700 px-3 py-1 cursor-pointer hover:text-white hover:bg-green-700">Completed</button>
                                <button wire:click="onCancelled({{ $p['id'] }})" class="border-2 border-red-700 px-3 py-1 cursor-pointer hover:text-white hover:bg-red-700">Cancel</button>
                            </div>
                            @endif
                            </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
