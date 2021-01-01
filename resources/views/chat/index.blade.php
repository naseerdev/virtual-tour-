@extends('layouts.app')

@section('content')

    <div  class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <h2 class="panel-heading">
                    List of all Chats
                </h2>
                @forelse ($friends as $friend)
                <div >
                <a href="{{ route('chat.show', $friend->id) }}"  style="display:inline; text-decoration:none; ">
                  <div style="display: inline;font-size:30px">  {{ $friend->name }}</div>
                  
                       

               
                <online-user  style="display:inline;float:right !important " v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></online-user>
                </div>
            </a>
            <hr>
                @empty
                <div class="panel-block">
                    You dont have any friends
                </div>

                    
                @endforelse
            </div>
        </div>
    </div>
    
    
    <footer style="position: absolute;bottom:0" class="foter mt-5">
        <p style="text-align: center;color:white;margin-bottom:0rem">
            Virtual Tours to Hostel © 2020. All Rights Reserved. Terms of Use and Privacy Policy.
        </p>
</footer>
@endsection
