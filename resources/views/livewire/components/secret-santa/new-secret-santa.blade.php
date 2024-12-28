<div>
    <form wire:submit="save" class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-sm font-semibold">Group name</label>
            <input type="text" id="name" wire:model="form.name" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <label for="organizer" class="text-sm font-semibold">Organizer</label>
            <input type="text" id="organizer" wire:model="form.organizer" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            @error('form.organizer') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <label for="message" class="text-sm font-semibold">Message</label>
            <textarea id="message" wire:model="form.message" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"></textarea>
            @error('form.message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <label for="gift_exchange_date" class="text-sm font-semibold">Gift Exchange Date</label>
            <input type="date" id="gift_exchange_date" wire:model="form.gift_exchange_date" class="p-2 border
            border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            @error('form.gift_exchange_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <label for="budget" class="text-sm font-semibold">Budget</label>
            <input type="number" id="budget" wire:model="form.budget" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            @error('form.budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Save</button>
        </div>
    </form>
</div>
