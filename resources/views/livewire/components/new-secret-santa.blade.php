<div x-data="newSecretSanta()" class="max-w-4xl w-full mx-auto flex flex-col bg-white rounded-md shadow">
  <div class="flex items-center space-x-8 bg-gray-100 p-4 rounded-t-md">
    <button class="flex items-center space-x-2 text-sm" x-on:click="step = 1">
      <div class="size-2 rounded-full"
        :class="{
            'bg-blue-500': step === 1,
            'bg-green-500': step > 1,
        }">
      </div>
      <span :class="{ 'font-semibold': step === 1 }">Participants</span>
    </button>
    <button class="flex items-center space-x-2 text-sm" x-on:click="step = 2">
      <div class="size-2 rounded-full"
        :class="{
            'bg-blue-500': step === 2,
            'bg-gray-300': step !== 2,
        }">
      </div>
      <span :class="{ 'font-semibold': step === 2 }">Secret Santa details</span>
    </button>
  </div>
  <div x-cloak x-show="step === 1" class="p-4 min-h-96 h-full flex flex-col justify-between">
    <div class="flex flex-col space-y-2">
      <template x-for="(participant, index) in participants" :key="index">
        <input type="text"
          class="p-2 block w-full mt-1 text-gray-600 border border-gray-300 rounded-md focus:outline-indigo-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          x-model="participant.name" placeholder="Name" x-on:keydown.enter="checkParticipants"
          x-on:keydown.backspace="removeParticipant(index)" x-on:blur="checkParticipants">
      </template>
    </div>
    <div class="h-auto flex items-end justify-end">
      <button class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md" x-on:click="next">
        Next
      </button>
    </div>
  </div>
  <div x-cloak x-show="step === 2" class="p-4 min-h-96 h-full">
    <div class="mt-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
      <input id="title" name="title" type="text"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        x-model="title">
    </div>
    <div class="mt-4">
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <textarea id="description" name="description" rows="3"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        x-model="description"></textarea>
    </div>
    <div class="mt-4">
      <button class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md"
        x-on:click="createSecretSanta">Create</button>
    </div>
  </div>
</div>
