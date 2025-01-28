<div class="bg-red-200 flex flex-col">
    <input type="text" wire:model.live="hello" id="">

    <button wire:click="updateHello('asdasd')">update</button>

    @foreach($doctors as $doctor)
        <div class=>{{ $doctor['id']; }}</div>
        <div>{{ $doctor['name']; }}</div>
        <div>{{ $doctor['job_title']; }}</div>
    @endforeach

    {{ $hello }}
</div>
