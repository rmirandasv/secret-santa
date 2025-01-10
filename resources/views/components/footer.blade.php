<footer class="mt-4 max-w-4xl w-full mx-auto flex flex-col p-4">
  <div class="flex items-center justify-between">
    <div class="flex items-center space-x-4">
      <a wire:navigate href="{{ route('home') }}" class="text-gray-700 hover:text-gray-800">Home</a>
      <a wire:navigate href="{{ route('about') }}" class="text-gray-700 hover:text-gray-800">About</a>
    </div>
    <a target="_blank" href="https://github.com/rmirandasv/secret-santa">
      <img src="{{ asset('images/github.svg') }}" alt="GitHub" class="w-6 h-6">
    </a>
  </div>
  <div class="mt-4 text-gray-600">
    <p>A simple, free and open-source secret santa generator created by <a href="https://rmiranda.dev" target="_blank"
        class="text-purple-700 hover:text-purple-800">Ronald Miranda</a></p>
  </div>
</footer>
