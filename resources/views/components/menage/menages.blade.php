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
                    <div class="flex justify-between sm:justify-normal flex-wrap sm:gap-5">
                        {{-- Invite user button --}}
                        <button data-modal-toggle="invite-user-modal-{{ $menage->id }}"
                            class="mb-4 rounded-full text-black bg-lime-300 dark:hover:bg-lime-500
                            hover:bg-lime-400 dark:bg-lime-400 p-2">
                            {{ __('Invite user') }}
                        </button>
                        {{-- Add expense button --}}
                        <button data-modal-toggle="add-expense-modal-{{ $menage->id }}"
                            class="mb-4 rounded-full text-black  bg-rose-300 dark:hover:bg-rose-500
                            hover:bg-rose-400 dark:bg-rose-400 p-2">
                            {{ __('Add expense') }}
                        </button>

                        {{-- View expenses button --}}
                        <a href="{{ route('menages.expenses', $menage->id) }}"
                            class="mb-4 rounded-full text-black bg-yellow-300 dark:hover:bg-amber-400
                             hover:bg-yellow-400 p-2">
                            {{ __('View expenses') }}
                        </a>

                        {{-- View chat button --}}
                        <a href="{{ route('menages.chat', $menage->id) }}"
                            class="mb-4 rounded-full text-black bg-teal-300 dark:hover:bg-teal-400
                             hover:bg-teal-400 p-2">
                            {{ __('Chat') }}
                        </a>

                    </div>
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

                        <h3 class="text-xl font-bold col-span-2">{{ __('Habitants') }}
                        </h3>
                        <h3 class="text-xl font-bold justify-self-end">{{ __('Incomes') }}
                        </h3>
                        <h3 class="text-xl font-bold justify-self-end">
                            {{ __('Expenses') }}</h3>
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
                                        <a href="{{ route('menages.chat', $menage->id) }}"
                                            class="text-sm hover:underline font-medium text-gray-900 truncate dark:text-white">
                                            {{ $user->name }}
                                        </a>
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
                                        {{ $user->currentMonthExpensesByMenage($menage->id) }}€
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        {{-- Total of incomes and expenses --}}
                        @if ($menage->users)
                            <div
                                class="dark:bg-gray-500 bg-gray-200 rounded-b-xl grid grid-cols-4 p-4 pr-4">
                                <h3 class="text-xl font-bold justify-self-end col-span-2">
                                    {{ __('Total:') }}</h3>
                                <h3
                                    class="text-lg font-bold justify-self-end text-lime-600 dark:text-lime-400">
                                    {{ $menage->totalIncome() }}€</h3>
                                <h3
                                    class="text-lg font-bold justify-self-end text-red-600 dark:text-red-400">
                                    {{ $menage->totalExpenses() }}€</h3>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Invite user --}}
            <x-modals.menage.invite :menage="$menage"></x-modals.menage.invite>

            <!-- Add expense modal -->
            <x-modals.menage.add-expense :menage="$menage"></x-modals.menage.add-expense>

        @empty
            <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                {{ __('No linked homes.') }}
            </p>
        @endforelse
    </div>
</div>