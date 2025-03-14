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

<div class="fixed {{ $positionClasses }} bg-gradient-to-r from-indigo-400 to-purple-500 backdrop-blur-sm shadow-xl rounded-xl p-5 z-50 border border-indigo-300 transition-all duration-300 hover:shadow-indigo-300">
    <div class="relative">
        <input
            type="text"
            x-model="{{ $searchModel }}"
            placeholder="{{ $placeholder }}"
            class="w-72 p-3 pl-10 border border-indigo-300 rounded-lg focus:ring-3 focus:ring-yellow-400 focus:border-yellow-500 outline-none transition-all duration-300 bg-indigo-50 shadow-sm"
        >
        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-indigo-600 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <button
            x-show="{{ $searchModel }}.length > 0"
            @click="{{ $searchModel }} = ''"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-indigo-400 hover:text-yellow-500 transition-colors duration-200"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div x-show="{{ $searchModel }}.length > 0" class="mt-3 text-sm font-medium text-white">
        <span class="text-yellow-200">Searching for:</span>
        <span x-text="{{ $searchModel }}" class="text-white font-bold"></span>
    </div>
</div>
