<div class="h-screen w-full bg-gray-100 flex justify-center items-center">
    <div class="font-mono bg-slate-300 p-4 w-[55rem]">
        <p class="text-4xl uppercase font-bold">Sessions</p>
        <hr>
        <div class="max-h-[500px] overflow-y-auto">
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
