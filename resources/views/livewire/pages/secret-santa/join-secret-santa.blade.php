<div>
  <div class="flex flex-col">
    <header class="bg-pink-500 text-white p-4">
      <div class="max-w-4xl w-full mx-auto flex items-center justify-between">
        <h1 class="text-2xl font-semibold">
          Join {{ $group->name }}
        </h1>
        <span class="font-semibold">
          {{ $group->gift_exchange_date }}
        </span>
      </div>
    </header>
    <div class="max-w-4xl w-full mx-auto flex flex-col p-4">
      <h1 class="text-2xl font-semibold text-gray-800">
        Join Secret Santa
      </h1>
      <span class="text-sm text-gray-600">
        Organizer: {{ $group->organizer }}
      </span>
      <span class="text-sm text-gray-600">
        Gift exchange date: {{ $group->gift_exchange_date }}
      </span>
      <span class="text-sm text-gray-600">
        Participants: {{ $group->participants->count() }}
      </span>

      @if ($participantId)
        <span class="mt-4 text-2xl text-gray-800 font-bold">
          You are joining as {{ $participant->name }}
        </span>
        <button wire:click="revealSecretSanta"
          @disabled($secretSantaRevealed)
          class="mt-10 p-4 bg-pink-500 text-white rounded-md shadow hover:bg-pink-600">
          {{ $secretSantaRevealed ? 'Secret Santa revealed' : 'Reveal Secret Santa' }}
        </button>

        @if ($secretSantaRevealed)
          <div class="mt-4 flex flex-col bg-white rounded-md shadow">
            <span class="p-4 text-gray-800">
              Your Secret Santa is {{ $participant->secretSanta->name }}
            </span>
          </div>
        @endif
      @else
        <span class="mt-4 text-2xl text-gray-800 font-bold">
          Who are you?
        </span>
        <div class="mt-2 flex flex-col bg-white rounded-md shadow">
          @foreach ($group->participants as $participant)
            <button wire:click="setParticipant({{ $participant->id }})"
              class="flex items-center justify-between w-full p-4 border-b border-gray-100 hover:bg-gray-100"
              @disabled($participant->secret_santa_id)>
              <span class="text-gray-800">
                {{ $participant->name }}
              </span>
              @if ($participant->secret_santa_id)
                <span class="text-sm text-gray-600">
                  Joined
                </span>
              @endif
            </button>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
