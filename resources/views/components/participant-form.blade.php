<div class="flex flex-col space-y-4">
  <div class="flex flex-col space-y-2">
    <label for="participant_form" class="text-sm font-semibold">Name</label>
    <input type="text" id="participant_name" name="participant_name" wire:model="participantForm.name"
      class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
    @error('participantForm.name')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
  </div>
</div>
