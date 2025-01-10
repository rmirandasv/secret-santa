<div x-data="{
    canShare: false,
    copied: false,
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
    },
    copyLink: function() {
        navigator.clipboard.writeText(this.shareData.url);
        this.copied = true;
        setTimeout(() => {
            this.copied = false;
        }, 8000);
    },
}" x-init="() => {
    try {
        navigator.canShare({ title: 'Join my Secret Santa group', text: 'Join my Secret Santa group by clicking on this link', url: shareData.url });
        this.canShare = true;
    } catch (e) {
        this.canShare = false;
    }
}">
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
        <p class="text-gray-600">
          {{ $group->message }}
        </p>
        <div class="mt-4 flex items-center space-x-2">
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
          Share this group with your friends
        </h2>
        <div class="mt-4 flex flex-col justify-center bg-purple-50 rounded-md shadow divide-y divide-pink-200">
          <button class="w-full p-4 flex justify-between text-purple-900 hover:bg-pink-100" x-on:click="copyLink()">
            <div class="flex items-center space-x-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
              </svg>
              <span class="text-lg">
                Copy link
              </span>
            </div>
            <span x-show="copied" class="text-sm text-green-800">
              Copied!
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
