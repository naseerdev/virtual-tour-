@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <h2 class="panel-heading">
                    List of all Students
                </h2>
                @forelse ($friends as $friend)
                <div style="display: inline-block">
                <a href="{{ route('chat.show', $friend->id) }}"  style="display:inline-block; text-decoration:none; ">
                  <div style="display: inline-block;font-size:30px">  {{ $friend->name }}</div>
                       

               
                <online-user  style="inline-block " v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></online-user>
                </div>
            </a>
                @empty
                <div class="panel-block">
                    You dont have any friends
                </div>

                    
                @endforelse
            </div>
        </div>
    </div>
    <script>
        </script>

@endsection