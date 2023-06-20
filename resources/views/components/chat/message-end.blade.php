<div class="chat chat-end w-96">
    <div class="chat-image avatar">
        <div class="w-10 rounded-full">
            <img src="{{ asset('assets/img/users/default-user-profile-picture.jpg') }}" />
        </div>
    </div>
    <div class="chat-header">
        {{ __('You') }}
        <time class="text-xs opacity-50 mx-1">{{ $sentAt }}</time>
    </div>
    <div class="chat-bubble bg-white text-ellipsis">{{ $slot }}</div>
    {{-- <div class="chat-footer opacity-50">
    cvc 
    </div> --}}
</div>
