<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 {{ $isOpen ? '' : 'hidden'}}" id="modal">
  <!-- Modal Content -->
  <div class="bg-white p-6 rounded-lg w-96">
    <h2 class="text-xl font-semibold mb-4">Modal with Form</h2>
    <form>
      <!-- Input Fields -->
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter your name">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter your email">
      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end space-x-4">
        <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg" id="close-modal">Cancel</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>
      </div>
    </form>
  </div>
</div>