<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menages') }}
        </h2>
    </x-slot>

    {{-- Toast container --}}
    @switch(session('status'))
        @case('user-invited')
            <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{-- Toast to notify the user that invitation was done --}}
                <div id="toast-simple"
                    class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                    role="alert">
                    <svg aria-hidden="true" class="w-5 h-5 text-blue-600 dark:text-blue-500" focusable="false" data-prefix="fas"
                        data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z">
                        </path>
                    </svg>
                    <div class="pl-4 text-sm font-normal">{{ __('User invited successfully.') }}</div>
                </div>
            </div>
        @break

        @case('accepted')
            <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{-- Toast to notify the user that invitation was accepted --}}
                <div id="toast-simple"
                    class="flex items-center mt-4 w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-lime-600 dark:text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>

                    <div class="pl-4 text-sm font-normal">{{ __('Invitation accepted.') }}</div>
                </div>
            </div>
        @break

        @case('rejected')
            <div class="flex justify-center" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{-- Toast to notify the user that invitation was rejected --}}
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
                            {{-- Information --}}
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Here you can see all the information about your linked homes.') }}
                            </p>

                            <!-- Modal toggle -->
                            <x-primary-button data-modal-target="create-menage-modal"
                                data-modal-toggle="create-menage-modal" class="my-5">{{ __('Create menage') }}
                            </x-primary-button>

                            {{-- Menages Accordion container --}}
                            <div class="flex flex-wrap align-items-center justify-center">
                                <div id="accordion-flush my-5" class="sm:w-4/5 w-full" data-accordion="collapse"
                                    data-active-classes="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white"
                                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                                    @forelse ($menages as $key => $menage)
                                        <h2 id="accordion-flush-heading-{{ $key }}">
                                            <button type="button"
                                                class="rounded-t-lg px-5 flex items-center
                                                 justify-between w-full py-5 font-medium text-left
                                                 text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                                data-accordion-target="#accordion-flush-body-{{ $key }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-flush-body-{{ $key }}">
                                                <div class="flex gap-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-10 h-10 text-white dark:text-gray-800   rounded"
                                                        style="background-color: {{ $menage->color }}">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                    </svg>

                                                    <span class="leading-10 text-xl">{{ $menage->name }}</span>
                                                </div>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body-{{ $key }}"
                                            class="border-b border-gray-200 dark:border-gray-700 hidden transition-all ease-in duration-200 text-gray-500 dark:text-white dark:bg-gray-600 rounded-b p-5 bg-gray-50"
                                            aria-labelledby="accordion-flush-heading-{{ $key }}">
                                            <div>
                                                {{-- Invite user button --}}
                                                <button data-modal-toggle="invite-user-modal-{{ $menage->id }}"
                                                    class="mb-4 rounded-full text-gray-800 bg-yellow-200 dark:hover:bg-amber-400 hover:bg-yellow-300 dark:bg-amber-300 p-2">
                                                    {{ __('Invite user') }}
                                                </button>
                                                {{-- Add expense button --}}
                                                <button data-modal-toggle="add-expense-modal-{{ $menage->id }}"
                                                    class="mb-4 rounded-full text-gray-800 bg-lime-300 dark:hover:bg-lime-500 hover:bg-lime-400 dark:bg-lime-400 p-2">
                                                    {{ __('Add expense') }}
                                                </button>
                                                {{-- Description --}}
                                                <p class="mb-2">
                                                    {{ $menage->description }}
                                                </p>
                                                {{-- Address --}}
                                                <p>
                                                    {{ $menage->address }}
                                                </p>
                                            </div>
                                            {{-- Menage users list --}}
                                            <div class="mt-3">
                                                {{-- Tittle --}}
                                                <div class="grid grid-cols-4">

                                                    <h3 class="text-xl font-bold col-span-2">Habitantes de la casa</h3>
                                                    <h3 class="text-xl font-bold justify-self-end">Ingresos</h3>
                                                    <h3 class="text-xl font-bold justify-self-end">Gastos</h3>
                                                </div>
                                                {{-- List --}}
                                                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    @foreach ($menage->users as $user)
                                                        <li class="pt-3 pb-0 sm:pt-4 pr-4">
                                                            <div class="grid grid-cols-4 items-center space-x-4">
                                                                {{-- <div class="">
                                                                    {{-- <img class="w-8 h-8 rounded-full"
                                                                        src="/docs/images/people/profile-picture-4.jpg"
                                                                        alt="Neil image"> 
                                                                </div> --}}
                                                                {{-- User name-email --}}
                                                                <div class="col-span-2">
                                                                    <p
                                                                        class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                        {{ $user->name }}
                                                                    </p>
                                                                    <p
                                                                        class="text-sm w-1/2 text-gray-500 truncate dark:text-gray-400">
                                                                        {{ $user->email }}
                                                                    </p>
                                                                </div>
                                                                {{-- User income --}}
                                                                <div
                                                                    class="justify-self-end text-base font-semibold text-gray-900 dark:text-white">
                                                                    {{ $user->income }}€
                                                                </div>
                                                                {{-- User name expenses --}}
                                                                <div
                                                                    class="justify-self-end text-base font-semibold text-gray-900 dark:text-white">
                                                                    {{ $user->expenses()->sum('amount') }}€
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    {{-- Total of incomes and expenses --}}
                                                    @if ($menage->users)
                                                        <div class="dark:bg-gray-500 bg-gray-200 rounded-b-xl grid grid-cols-4 p-4 pr-4">
                                                            <h3 class="text-xl font-bold justify-self-end col-span-2">Total:</h3>
                                                            <h3 class="text-lg font-bold justify-self-end text-lime-600 dark:text-lime-400">{{$menage->totalIncome()}}€</h3>
                                                            <h3 class="text-lg font-bold justify-self-end text-red-600 dark:text-red-400">{{$menage->totalExpenses()}}€</h3>
                                                        </div>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Invite user modal -->
                                        <div id="invite-user-modal-{{ $menage->id }}" data-modal-backdrop="static"
                                            tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="invite-user-modal-{{ $menage->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            {{ __('Invite user') }}</h3>
                                                        <form class="space-y-6 group" novalidate
                                                            action="{{ route('invitation.invite', ['id' => $menage->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            {{-- Email input --}}
                                                            <div>
                                                                <label for="email"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('User email') }}</label>

                                                                <div class="relative mb-6">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <svg aria-hidden="true"
                                                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                                            </path>
                                                                            <path
                                                                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="relative mb-6">
                                                                        <div
                                                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                            <svg aria-hidden="true"
                                                                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                                                fill="currentColor"
                                                                                viewBox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                                                </path>
                                                                                <path
                                                                                    d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                                                </path>
                                                                            </svg>
                                                                        </div>
                                                                        <input type="email" name="email"
                                                                            id="email" required
                                                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 invalid:[&:not(:placeholder-shown):not(:focus)]:border-b-red-500 peer block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            placeholder="user@gmail.com">
                                                                    </div>
                                                                </div>
                                                                <p id="helper-text-explanation"
                                                                    class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    {{ __('An email will be sent to the invited user.') }}
                                                                </p>
                                                                <span
                                                                    class="mt-2 hidden text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                                                                    {{ __('Please enter a valid email address.') }}
                                                                </span>
                                                            </div>
                                                            {{-- Create button --}}
                                                            <div class="flex justify-center align-items-center">
                                                                <button type="submit"
                                                                    class="group-invalid:pointer-events-none group-invalid:opacity-30 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                    {{ __('Invite') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add expense modal -->
                                        <div id="add-expense-modal-{{ $menage->id }}" data-modal-backdrop="static"
                                            tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="add-expense-modal-{{ $menage->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3
                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            {{ __('Add expense') }}</h3>
                                                        <form class="space-y-6 group" novalidate
                                                            action="{{ route('menages.addUserExpense', ['id' => $menage->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            {{-- Amount input --}}

                                                            <div class="relative">
                                                                <label for="amount"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Amount') }}</label>
                                                                <input type="number" name="amount" id="amount"
                                                                    required min="0" max="1000000"
                                                                    class="appearance-number-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 peer block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    placeholder="100€">
                                                            </div>
                                                            <p id="helper-text-explanation"
                                                                class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                                {{ __("Enter the expense's total amount.") }}
                                                            </p>
                                                            {{-- Create button --}}
                                                            <div class="flex justify-center align-items-center">
                                                                <button type="submit"
                                                                    class="group-invalid:pointer-events-none group-invalid:opacity-30 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                    {{ __('Add') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                                            {{ __('No linked homes.') }}
                                        </p>
                                    @endforelse
                                </div>
                            </div>
                        </x-tab-content>
                        {{-- Petitions --}}
                        <x-tab-content id="dashboard" aria-labelledby="dashboard-tab">
                            {{-- Information --}}
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Here you can see all your pending menages petitions.') }}
                            </p>
                            {{-- List of invitations --}}
                            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($invitations as $invitation)
                                    <li class="pt-3 pb-0 sm:pt-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full"
                                                    src="{{ asset('assets/img/users/default-user-profile-picture.jpg') }}"
                                                    alt="user image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    {{ $invitation->menage->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $invitation->fromUser->name }} -
                                                    {{ $invitation->fromUser->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ route('invitation.accept', ['invitation' => $invitation]) }}"
                                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                                    <span
                                                        class="relative px-5 py-2.5 transition-all ease-in duration-300 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                        {{ __('Accept') }}
                                                    </span>
                                                </a>
                                                <a href="{{ route('invitation.reject', ['invitation' => $invitation]) }}"
                                                    class="cursor-pointer relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                                    <span
                                                        class="relative px-5 py-2.5 transition-all ease-in duration-300 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                        {{ __('Reject') }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                                        {{ __('No invitations.') }}
                                    </p>
                                @endforelse
                            </ul>
                        </x-tab-content>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Create menage modal -->
<div id="create-menage-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="create-menage-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                    {{ __('Menage creation') }}</h3>
                <form class="space-y-6 group" novalidate action="{{ route('menages.store') }}" method="post">
                    @csrf
                    {{-- Name input --}}
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" pattern=".{4,}"
                            class="invalid:[&:not(:placeholder-shown):not(:focus)]:border-b-red-500 peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="{{ __('Beach house') }}" required>
                        <span
                            class="mt-2 hidden text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ __('Name must contains at least 4 characters.') }}
                        </span>

                    </div>
                    {{-- Address input --}}
                    <div>
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Address') }}</label>
                        <input type="text" name="address" id="address" pattern=".{8,}"
                            placeholder="C/ paraje de paterna, 4"
                            class="invalid:[&:not(:placeholder-shown):not(:focus)]:border-b-red-500 peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                        <span
                            class="mt-2 hidden text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ __('Address must contains at least 8 characters.') }}
                        </span>
                    </div>
                    {{-- Color input --}}
                    <div>
                        <label for="color"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Color') }}</label>
                        <input type="color" value="#CAF787" name="color" id="color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 "
                            required>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            {{ __('The color to identify your menage.') }}
                        </p>
                    </div>
                    {{-- Description textarea --}}
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Description') }}
                        </label>
                        <textarea id="message" rows="2" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('My house where I live with my partner.') }}"></textarea>

                    </div>
                    {{-- Create button --}}
                    <div class="flex justify-center align-items-center">
                        <button type="submit"
                            class="group-invalid:pointer-events-none group-invalid:opacity-30 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('Create menage') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
