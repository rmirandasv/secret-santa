<div x-data="newSecretSanta($wire)" class="max-w-xl w-full mx-auto flex flex-col">
  <form wire:submit="save">
    <div class="flex items-center space-x-8 p-4 rounded-t-md">
      <button type="button" class="flex items-center space-x-2 text-sm" x-on:click="step = 1">
        <div class="size-2 rounded-full"
          :class="{
              'bg-pink-500': step === 1,
              'bg-green-500': step > 1,
          }">
        </div>
        <span :class="{ 'font-semibold': step === 1 }">Participants</span>
      </button>
      <button type="button" class="group flex items-center space-x-2 text-sm" x-on:click="step = 2" x-bind:disabled="step < 2">
        <div class="size-2 rounded-full"
          :class="{
              'bg-pink-500': step === 2,
              'bg-gray-300': step !== 2,
          }">
        </div>
        <span class="group-disabled:opacity-50" :class="{ 'font-semibold': step === 2 }">Secret Santa details</span>
      </button>
    </div>
    <div x-cloak x-show="step === 1" class="p-4 flex flex-col justify-between">
      <div class="flex flex-col space-y-2">
        <template x-for="(participant, index) in participants" :key="index">
          <input type="text"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            x-model="participant.name" x-bind:placeholder="`Name ${index+1}`" x-on:keydown.enter="checkParticipants"
            x-on:keydown.backspace="removeParticipant(index)" x-on:blur="checkParticipants">
        </template>
      </div>
      <div class="mt-4">
        <button type="button" class="py-1 px-2 bg-white border border-gray-400 rounded-md" x-on:click="addParticipant">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </button>
      </div>
      <div class="mt-10">
        <button type="button" class="w-full px-4 py-2 text-sm font-medium text-white bg-pink-500 rounded-md disabled:opacity-50"
          x-on:click="next" x-bind:disabled="!enableNext()">
          Next
        </button>
      </div>
    </div>
    <div x-cloak x-show="step === 2" class="p-4">
      <div class="flex flex-col space-y-2">
        <div class="flex flex-col">
          <label for="organizer" class="text-sm font-medium text-gray-700">Organizer</label>
          <input type="text" id="organizer" name="organizer" x-model="organizer"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('organizer') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
          <label for="name" class="text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="name" name="name" x-model="name"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
          <label for="gift_exchange_date" class="text-sm font-medium text-gray-700">Gift exchange date</label>
          <input type="date" id="gift_exchange_date" name="gift_exchange_date" x-model="gift_exchange_date"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('gift_exchange_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
          <label for="budget" class="text-sm font-medium text-gray-700">Budget</label>
          <input type="number" id="budget" name="budget" x-model="budget"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
          <label for="message" class="text-sm font-medium text-gray-700">Message</label>
          <textarea id="message" name="message" x-model="message"
            class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-pink-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="mt-10 flex items-center space-x-4">
        <button type="button" class="px-4 py-2 text-sm font-medium text-white bg-gray-500 rounded-md" x-on:click="back">
          Previous
        </button>
        <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-white bg-pink-500 rounded-md disabled:opacity-50"
          x-bind:disabled="!enableSubmit() || isLoading" x-text="isLoading ? 'Loading...' : 'Submit'">
          Submit
        </button>
      </div>
    </div>
  </form>
</div>
