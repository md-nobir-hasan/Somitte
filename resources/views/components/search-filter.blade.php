@props([
    'placeholder' => 'Search...',
    'searchModel' => 'search',
    'position' => 'right'
])

@php
    $positionClasses = [
        'right' => 'right-4 top-1/2 transform -translate-y-1/2',
        'left' => 'left-4 top-1/2 transform -translate-y-1/2',
        'center' => 'left-1/2 top-4 transform -translate-x-1/2',
    ][$position];
@endphp

<div class="fixed {{ $positionClasses }} bg-white shadow-lg rounded-lg p-4 z-50">
    <div class="relative">
        <input
            type="text"
            x-model="{{ $searchModel }}"
            placeholder="{{ $placeholder }}"
            class="w-64 p-2 pr-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-blue-500 outline-none"
        >
        <div class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <button
            x-show="{{ $searchModel }}.length > 0"
            @click="{{ $searchModel }} = ''"
            class="absolute right-8 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div x-show="{{ $searchModel }}.length > 0" class="mt-2 text-sm text-gray-500">
        Searching for: <span x-text="{{ $searchModel }}" class="font-medium"></span>
    </div>
</div>