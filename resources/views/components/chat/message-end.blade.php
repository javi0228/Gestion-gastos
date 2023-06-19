<div class="chat chat-end">
    <div class="chat-image avatar">
        <div class="w-10 rounded-full">
            <img src="{{asset('assets/img/users/default-user-profile-picture.jpg')}}" />
        </div>
    </div>
    <div class="chat-header">
        {{__('You')}}
    </div>
    <time class="text-xs opacity-50">{{ $sentAt }}</time>
    <div class="chat-bubble bg-white">{{$slot}}</div>
    {{-- <div class="chat-footer opacity-50">
        {{$seenAt}} 
    </div> --}}
</div>
