<div>
  <form wire:submit="save" class="flex flex-col space-y-4">
    <x-group-form />
    <div class="flex items-center justify-end">
      <button type="submit"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
        Save
      </button>
    </div>
  </form>
</div>
