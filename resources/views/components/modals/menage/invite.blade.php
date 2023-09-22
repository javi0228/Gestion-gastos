 <!-- Invite user modal -->
 <div id="invite-user-modal-{{ $menage->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <button type="button"
                 class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                 data-modal-hide="invite-user-modal-{{ $menage->id }}">
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
                     {{ __('Invite user') }}</h3>
                 <form class="space-y-6 group" novalidate
                     action="{{ route('invitation.invite', ['id' => $menage->id]) }}" method="post">
                     @csrf
                     {{-- Email input --}}
                     <div>
                         <label for="email"
                             class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('User email') }}</label>

                         <div class="relative mb-6">
                             <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                 <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                     </path>
                                     <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                     </path>
                                 </svg>
                             </div>
                             <div class="relative mb-6">
                                 <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                     <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                         </path>
                                         <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                         </path>
                                     </svg>
                                 </div>
                                 <input type="email" name="email" id="email" required
                                     pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 invalid:[&:not(:placeholder-shown):not(:focus)]:border-b-red-500 peer block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                     placeholder="user@gmail.com">
                             </div>
                         </div>
                         <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
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
