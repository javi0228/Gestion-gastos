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