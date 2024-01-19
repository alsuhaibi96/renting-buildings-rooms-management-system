<form wire:submit.prevent="submit" class="space-y-4 bg-gray-50 px-8 py-4 rounded">
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white d-block ">Reserve a room</span>
    <label for="" class="text-slate-400 mb-8  block">
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur tempore qui nisi itaque​</label>
    <div class="mt-2">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" wire:model.defer="name" class="mt-1 h-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" wire:model.defer="email" class="h-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" id="date" wire:model.defer="date" class="h-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
        <input type="time" id="time" wire:model.defer="time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="guests" class="block text-sm font-medium text-gray-700">Number of Guests</label>
        <input type="number" id="guests" wire:model.defer="guests" class="h-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1">
        @error('guests') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="text-center">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 ">Reserve</button>
    </div>

    @if (session()->has('success'))
        <div class="text-center text-green-500">
            {{ session('success') }}
        </div>
    @endif
</form>
