<div class="chat chat-start">
    <div class="chat-image avatar">
        <div class="w-10 rounded-full">
            <img src="{{asset('assets/img/users/default-user-profile-picture.jpg')}}" />
        </div>
    </div>
    <div class="chat-header">
        {{ $user }}
        <time class="text-xs opacity-50 mx-1">{{ $sentAt }}</time>
    </div>
    <div class="chat-bubble ">{{ $slot }}</div>
    {{-- <div class="chat-footer opacity-50">
        {{$sentAt}}
    </div> --}}
</div>
