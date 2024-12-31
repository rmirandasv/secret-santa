<div>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <div class="max-w-4xl w-full mx-auto flex flex-col p-4">
      <h1 class="text-2xl font-semibold text-gray-800">
        {{ $group->name }}
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
      {{-- links to join group --}}
      <h2 class="text-lg font-semibold text-gray-800 mt-4">
        Share this link to invite participants to join the group
      </h2>
      <div class="flex items-center justify-between">
        <input
          type="text"
          class="w-full p-2 border border-gray-300 rounded"
          value="{{ route('secret-santa.join', $group->slug) }}"
          readonly
        />
        <button
          class="bg-blue-500 text-white px-4 py-2 rounded"
        >
          Copy
        </button>
      </div>
    </div>
  </div>
</div>
