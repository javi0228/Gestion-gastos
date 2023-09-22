<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menages') }}
        </h2>
    </x-slot>

    {{-- Toast container --}}
    @switch(session('status'))
        @case('user-invited')
            {{-- Toast to notify the user that invitation was done --}}
            <x-common.toast>
                <svg aria-hidden="true" class="w-5 h-5 text-blue-600 dark:text-blue-500" focusable="false" data-prefix="fas"
                    data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27
                 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 
                 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8
                  .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z">
                    </path>
                </svg>
                <div class="pl-4 text-sm font-normal">{{ __('User invited successfully.') }}</div>
            </x-common.toast>
        @break

        @case('accepted')
            {{-- Notify invitation was accepted --}}
            <x-common.toast>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 text-lime-600 dark:text-lime-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0
                     01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 
                     3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745
                      0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                </svg>
                <div class="pl-4 text-sm font-normal">{{ __('Invitation accepted.') }}</div>
            </x-common.toast>
        @break

        @case('rejected')
            {{-- Toast to notify the user that invitation was rejected --}}
            <x-common.toast>
                <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                    <div id="toast-simple"
                        class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                        role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-red-600 dark:text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="pl-4 text-sm font-normal">{{ __('Invitation rejected.') }}</div>
                    </div>
                </div>
            </x-common.toast>
        @break

        @case('expenseAdded')
            <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{-- Toast to notify the user that exepense was done successfully --}}
                <div id="toast-simple"
                    class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-lime-600 dark:text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>


                    <div class="pl-4 text-sm font-normal">{{ __('Expense added.') }}</div>
                </div>
            </div>
        @break

        @case('user-not-found')
            <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{-- Toast to notify the user that exepense was done successfully --}}
                <div id="toast-simple"
                    class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-red-600 dark:text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="pl-4 text-sm font-normal">{{ __('User not found.') }}</div>
                </div>
            </div>
        @break

        @default
    @endswitch

    {{-- Content container --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Tabs links --}}
                    <div class="mb-4 border-b  border-gray-200 dark:border-gray-700">
                        <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            {{-- My menages --}}
                            <li class="mr-2">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="menages-tab"
                                    data-tabs-target="#menages" type="button" role="tab" aria-controls="menages"
                                    aria-selected="true">
                                    {{ __('My menages') }}
                                </button>
                            </li>
                            {{-- Petitions --}}
                            <li class="mr-2">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    {{ __('Petitions') }}
                                    @if (count($invitations) > 0)
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                            {{ count($invitations) }}
                                        </span>
                                    @endif
                                </button>
                            </li>
                        </ul>
                    </div>
                    {{-- Tabs content --}}
                    <div id="myTabContent">
                        {{-- My menages --}}
                        <x-tab-content id="menages" aria-labelledby="menages-tab">
                          <x-menage.menages :menages="$menages"></x-menage.menages>
                        </x-tab-content>
                        {{-- Petitions --}}
                        <x-tab-content id="dashboard" aria-labelledby="dashboard-tab">
                            <x-menage.invitations-tab-content :invitations="$invitations"></x-menage.invitations-tab-content>
                        </x-tab-content>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- Modals --}}
{{-- Create menage --}}
<x-modals.menage.create></x-modals.menage.create>
