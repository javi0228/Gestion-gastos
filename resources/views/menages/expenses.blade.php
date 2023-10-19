<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Menage's expenses") }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden
                 shadow-sm sm:rounded-lg p-6 text-gray-900
                  dark:text-gray-100">
                  
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                {{ $menage->name }}
            </h3>
            {{-- Seach input to filter table --}}
            <div class="my-8">
                <x-common.search-input buttonId="search-button" inputId="search-input"></x-common.search-input>
            </div>
            {{-- Expenses table --}}
            <div>
                <table class="display w-full" id="expenseDatatable">
                    <thead>
                        <tr>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('User') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
