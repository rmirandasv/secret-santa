<x-layouts.app>
  <div class="flex flex-col">
    <header class="flex flex-col lg:flex-row items-center justify-center bg-gradient-to-r from-zinc-400/75 to-gray-400">
      <div class="w-full lg:w-7/12 px-4 h-full flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold text-pink-600">Secret Santa</h1>
        <p class="text-gray-900">A simple Secret Santa generator</p>
        <p class="text-gray-900">Create a new Secret Santa event and invite your friends to join</p>
        <a href="#new-secret-santa"
          class="transition ease-in-out duration-200 mt-4 px-4 py-2 bg-pink-500 text-white rounded-md shadow-md hover:shadow-lg hover:scale-110 hover:bg-pink-600">Create a new Secret
          Santa</a>
      </div>
      <div class="w-full lg:w-5/12">
        <img src="{{ asset('images/header2.jpg') }}" alt="Secret Santa" class="w-full">
      </div>
    </header>
    <section id="new-secret-santa" class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-7/12 px-4 flex flex-col py-6">
        <h2 class="text-2xl font-bold text-gray-900 text-center">Create a new Secret Santa event</h2>
        <p class="text-gray-900 text-center mb-4">Fill out the form below to create a new Secret Santa event</p>
        <livewire:components.new-secret-santa />
      </div>
      <div class="w-full lg:w-5/12 px-4 bg-red-200 py-6 flex flex-col items-center justify-center">
        <h2 class="text-2xl font-bold text-gray-900 text-center">How it works</h2>
        <p class="text-gray-900 text-center mb-4">Follow these simple steps to create a new Secret Santa event</p>
        <ul class="text-gray-900 space-y-2">
          <li class="flex items-center space-x-2">
            <span class="text-red-600">1.</span>
            <span>Fill out the form to create a new Secret Santa event</span>
          </li>
          <li class="flex items-center space-x-2">
            <span class="text-red-600">2.</span>
            <span>Invite your friends to join the event</span>
          </li>
          <li class="flex items-center space-x-2">
            <span class="text-red-600">3.</span>
            <span>Draw names and send the results to your friends</span>
          </li>
        </ul>
      </div>
    </section>
  </div>
</x-layouts.app>
