<div>
  <div class="flex flex-col">
    <header class="bg-purple-500 text-white p-4">
      <div class="max-w-4xl w-full mx-auto flex items-center justify-between">
        <h1 class="text-2xl font-semibold">
          Secret Santa
        </h1>
        <span class="font-semibold">
          Giff exchange date: {{ $group->gift_exchange_date->format('d M Y') }}
        </span>
      </div>
    </header>
    <div class="mt-20 max-w-4xl w-full mx-auto flex flex-col items-center">
      <div class="w-full flex flex-col">
        <h2 class="text-4xl font-semibold">
          {{ $group->name }}
        </h2>
        <p class="mt-4 text-gray-600">
          {{ $group->description }}
        </p>
        <div class="flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-8 text-purple-900">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>
          <spa class="text-lg font-semibold text-purple-800">
            Organizer
          </spa>
          <span class="text-lg font-semibold">
            {{ $group->organizer }}
          </span>
        </div>
        <div class="flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-8 text-purple-900">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
          </svg>
          <spa class="text-lg font-semibold text-purple-800">
            Gift exchange date
          </spa>
          <span class="text-lg font-semibold">
            {{ $group->gift_exchange_date->format('d M Y') }}
          </span>
        </div>
        <div class="flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-8 text-purple-900">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
          </svg>
          <spa class="text-lg font-semibold text-purple-800">
            Participants
          </spa>
          <span class="text-lg font-semibold">
            {{ $group->participants->count() }}
          </span>
        </div>
        <h2 class="mt-8 text-xl font-semibold">
          Join Secret Santa
        </h2>
      </div>
    </div>
    <div class="max-w-4xl w-full mx-auto flex flex-col p-4">
      @if ($participantId)
        <span class="mt-4 text-2xl text-gray-800 font-bold">
          You are joining as {{ $participant->name }}
        </span>

        @if (!$secretSantaRevealed)
          <button wire:click="revealSecretSanta" @disabled($secretSantaRevealed)
            class="mt-10 p-4 font-bold bg-purple-500 text-white rounded-md shadow hover:bg-purple-600">
            {{ $secretSantaRevealed ? 'Secret Santa revealed' : 'Reveal Secret Santa' }}
          </button>
        @endif

        @if ($secretSantaRevealed)
          <div class="mt-4 p-4 flex flex-col bg-gradient-to-r from-purple-700 to-pink-800 rounded-md shadow">
            <span class="text-white text-3xl text-center">
              Your Secret Santa is {{ $participant->secretSanta->name }}!
            </span>
            <span class="text-white text-lg text-center">
              !Don't tell anyone!
            </span>

            <div class="mt-4 flex flex-col">
              <span class="text-white text-lg font-semibold">
                Secret Santa Details
              </span>
              <div class="mt-2 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-8 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-lg font-semibold">
                  Your Secret Santa
                </span>
                <span class="text-lg font-semibold text-white">
                  Test
                </span>
              </div>
              <div class="mt-2 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-8 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <span class="text-lg font-semibold">
                  Gift exchange date
                </span>
                <span class="text-lg font-semibold text-white">
                  {{ $group->gift_exchange_date->format('d M Y') }}
                </span>
              </div>
              <div class="mt-2 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-8 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span class="text-lg font-semibold">
                  Participants
                </span>
                <span class="text-lg font-semibold text-white">
                  {{ $group->participants->count() }}
                </span>
              </div>
            </div>

            <div class="mt-4 flex justify-end space-x-4">
              <a href="" class="p-4 flex items-center space-x-2 font-bold bg-purple-800 text-white rounded-md shadow hover:bg-purple-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <span>Download</span>
              </a>
            </div>
          </div>
        @endif
      @else
        <span class="mt-4 text-lg text-gray-800 font-bold">
          Who are you?
        </span>
        <div class="mt-2 flex flex-col bg-purple-50 rounded-md shadow">
          @foreach ($group->participants as $participant)
            <button wire:click="setParticipant({{ $participant->id }})"
              class="flex items-center justify-between w-full p-4 border-b border-purple-50 hover:bg-purple-100"
              @disabled($participant->secret_santa_id)>
              <span class="text-purple-800">
                {{ $participant->name }}
              </span>
              @if ($participant->secret_santa_id)
                <span class="text-sm text-green-600">
                  Joined
                </span>
              @endif
            </button>
          @endforeach
        </div>
      @endif
    </div>
  </div>
  @script
    <script>
      $wire.on('secret-santa-revealed', () => {
        window.JSConfetti.addConfetti({
          confettiNumber: 600,
        });
      });
    </script>
  @endscript
</div>
