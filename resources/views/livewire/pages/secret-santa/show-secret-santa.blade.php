<div>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <div class="max-w-7xl w-full flex flex-col lg:flex-row lg:justify-between">
      <form wire:submit="save"
        class="w-full lg:w-1/2 p-4 flex flex-col space-y-4 border border-gray-400 rounded-md shadow">
        <x-group-form />
        <div class="flex items-center justify-end">
          <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
            Save
          </button>
        </div>
      </form>
      <div class="w-full lg:w-1/2 p-4 flex flex-col">
        <h2 class="text-2xl font-semibold">Participants</h2>
        <div class="flex flex-col p-4 bg-white rounded-md shadow">
          @if ($participants->isEmpty())
            <span class="text-gray-500">No participants yet</span>
          @endif
          @if ($participants->IsNotEmpty())
            <div class="grid grid-cols-3 gap-4">
              <span class="font-semibold">Name</span>
              <span class="font-semibold">Has secret santa</span>
              <span class="font-semibold">Actions</span>
              @foreach ($participants as $participant)
                <div class="py-1 px-4 col-span-3 grid grid-cols-3 gap-4 hover:bg-gray-200 rounded-md"
                  wire:key="participant-{{ $participant->id }}">
                  <span>{{ $participant->name }}</span>
                  @if ($participant->secret_sante_id)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-8 bg-green-600">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                  @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="size-8 text-gray-400">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                  @endif
                  <div>
                    <button wire:click="removeParticipant({{ $participant->id }})"
                      class="text-red-500 hover:text-red-600 focus:outline-none focus:ring focus:ring-red-200">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
        <form wire:submit="addParticipant"
          class="w-full flex flex-col space-y-4 lg:mt-4 p-4 border border-gray-400 rounded-md shadow">
          <x-participant-form />
          <div class="flex items-center justify-end">
            <button type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
              Add
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
