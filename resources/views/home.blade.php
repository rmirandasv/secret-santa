<x-layouts.app>
  <div class="max-w-4xl w-full mx-auto mt-12 flex flex-col">
    <h1 class="text-7xl font-semibold text-purple-900">Secret Santa</h1>
    <h2 class="text-2xl font-semibold text-gray-700">
      Simple secret santa generator
    </h2>
    <h3 class="text-lg text-gray-800 mt-6">
      Create a new secret santa event
    </h3>
    <div class="mt-2 p-4 rounded-lg shadow bg-gradient-to-r from-purple-200 to-pink-300">
      <livewire:components.new-secret-santa />
    </div>
  </div>
</x-layouts.app>
