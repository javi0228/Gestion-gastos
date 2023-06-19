<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('chat') . ' ' . $menage->name }}
        </h2>
    </x-slot>
    {{-- Content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 max-h-[36rem] shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid sm:grid-cols-3 grid-cols-1 gap-y-4">
                    <div class="sm:w-2/3 overflow-y-auto w-full h-56 justify-self-center p-4 sm:mr-6 text-center dark:bg-gray-600 bg-neutral-200 rounded-md">
                        <h3 class=" font-black text-lg">{{ __('Participants') }}</h3>
                        <div class=" mt-3">
                            @foreach ($users as $user)
                                <p>{{ $user->name }}</p>
                            @endforeach
                        </div>
                    </div>
                    @livewire('menage-chat', ['menage' => $menage])
                </div>
            </div>
        </div>
</x-app-layout>
