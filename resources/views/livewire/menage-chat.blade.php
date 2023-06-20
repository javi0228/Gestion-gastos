<div class="p-8 dark:bg-gray-600 bg-neutral-200 rounded-md grid grid-rows-5 col-span-2 max-h-[30rem] ">
    {{-- Messages container --}}
    <div wire:poll.visible.750ms="getMessages" class="overflow-y-auto overflow-x-hidden row-span-4 p-2">
        @foreach ($messages as $message)
            {{-- Sent messages --}}
            @if ($message->user_id == Auth::user()->id)
                <x-chat.message-end :sentAt="$message->created_at">
                    {{ $message->message }}
                </x-chat.message-end>
            @else
                {{-- Received messages --}}
                <x-chat.message-start :user="$message->user->name" :sentAt="$message->created_at">
                    {{ $message->message }}
                </x-chat.message-start>
            @endif
        @endforeach
        {{-- Sent messages --}}
    </div>
    {{-- Message input --}}
    <div class="mt-3 self-end">
        <div class="flex items-end px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
            <textarea wire:model="message" id="chat" rows="1"
                class=" block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="{{ __('Your message...') }}"></textarea>
            <button wire:click="sendMessage()"
                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</div>
