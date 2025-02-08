<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 {{ $isOpen ? '' : 'hidden'}}" id="modal">
  <!-- Modal Content -->
  <div class="bg-white p-6 rounded-lg w-96">
    <h2 class="text-xl font-semibold mb-4 uppercase">Set Appointment</h2>
    <form wire:submit.prevent="submitForm" >
      <!-- Input Fields -->
      <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="text" id="date" class="mt-1 p-2 w-full border border-gray-300 rounded-lg bg-gray-200" disabled value="{{$date}}">
      </div>

      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input wire:model="form_name" type="text" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter your name">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input wire:model="form_email" type="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter your email">
      </div>
      <div class="mb-4">
        <label for="concern" class="block text-sm font-medium text-gray-700">Concern</label>
        <textarea wire:model="form_concern" name="concern" id="concern" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter your concern...">

        </textarea>
      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end space-x-4">
        <button wire:click="modalSwitch(false)" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg cursor-pointer" id="close-modal">
            Cancel
        </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer">
            Submit
        </button>
      </div>
    </form>
  </div>
</div>