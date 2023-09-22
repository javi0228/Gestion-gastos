 <!-- Add expense modal -->
 <div id="add-expense-modal-{{ $menage->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <button type="button"
                 class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                 data-modal-hide="add-expense-modal-{{ $menage->id }}">
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
                     {{ __('Add expense') }}</h3>
                 <form class="group" novalidate action="{{ route('menages.addUserExpense', ['id' => $menage->id]) }}"
                     method="post">
                     @csrf
                     {{-- Amount input --}}

                     <div class="relative space-y-6">
                         <div>
                             <label for="amount"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Amount') }}</label>
                             <input type="number" name="amount" id="amount" required min="0" max="1000000"
                                 class="appearance-number-none bg-gray-50
                            border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 block w-1/2  
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            peer block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                 placeholder="100€">
                             <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                 {{ __("Enter the expense's total amount.") }}
                             </p>
                         </div>

                         <div> <label for="description"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description') }}</label>
                             <textarea name="description" id="description"
                                 class="bg-gray-50
                       border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 w-full
                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                       peer block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                 placeholder="{{ __('Purchase of the month') }}"></textarea>
                         </div>
                     </div>

                     {{-- Create button --}}
                     <div class="flex justify-center align-items-center mt-5">
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
