<div x-data="{
    canShare: false,
    shareData: {
        url: '{{ route('secret-santa.join', $group) }}',
        email: 'mailto:?subject=Join my Secret Santa group&body=Join my Secret Santa group by clicking on this link: {{ route('secret-santa.show', $group) }}',
        shareOnWhatsApp: function() {
            navigator.share({
                title: 'Join my Secret Santa group',
                text: 'Join my Secret Santa group by clicking on this link',
                url: shareData.url,
            });
        },
    }
}" x-init="() => {
    try {
        navigator.canShare({ title: 'Join my Secret Santa group', text: 'Join my Secret Santa group by clicking on this link', url: shareData.url });
        this.canShare = true;
    } catch (e) {
        this.canShare = false;
    }
}">
  <div class="flex flex-col">
    <header class="bg-pink-500 text-white p-4">
      <div class="max-w-4xl w-full mx-auto flex items-center justify-between">
        <h1 class="text-2xl font-semibold">
          {{ $group->name }}
        </h1>
        <span class="font-semibold">
          {{ $group->gift_exchange_date }}
        </span>
      </div>
    </header>
    <div class="mt-20 max-w-4xl w-full mx-auto flex flex-col items-center">
      <div class="max-w-lg w-full mx-auto bg-pink-100 p-4 grid grid-cols-2 gap-x-4 rounded-md shadow text-pink-700">
        <span class="text-lg text-gray-500">
          Organizer
        </span>
        <span class="text-lg">
          {{ $group->organizer }}
        </span>
        <span class="text-lg text-gray-500">
          Group name
        </span>
        <span class="text-lg">
          {{ $group->name }}
        </span>
        <span class="text-lg text-gray-500">
          Gift exchange date
        </span>
        <span class="text-lg">
          {{ $group->gift_exchange_date }}
        </span>
        <span class="text-lg text-gray-500">
          Participants
        </span>
        <span class="text-lg">
          {{ $group->participants->count() }}
        </span>
        <span class="text-lg text-gray-500">
          Created at
        </span>
        <span class="text-lg">
          {{ $group->created_at->format('d/m/Y') }}
        </span>
      </div>

      <div class="mt-8 w-full flex flex-col items-center">
        <h2 class="text-xl font-semibold">
          Share this group with your friends
        </h2>
        <div
          class="max-w-lg w-full mx-auto mt-4 flex flex-col justify-center bg-white rounded-md shadow divide-y divide-gray-200">
          <button class="w-full p-4 flex space-x-4 hover:bg-gray-100"
            x-on:click="navigator.clipboard.writeText(shareData.url); alert('Copied')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
            </svg>
            <span class="text-lg text-gray-600">
              Copy link
            </span>
          </button>
          <button x-show="canShare" class="p-4 flex space-x-4 hover:bg-gray-100"
            x-on:click="navigator.share({
            title: 'Join my Secret Santa group',
            text: 'Join my Secret Santa group by clicking on this link',
            url: shareData.url,
          })">
            <img src="{{ asset('images/whatsapp.svg') }}" alt="whatsapp" class="w-6 h-6">
            <span class="text-lg text-gray-600">
              WhatsApp
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
