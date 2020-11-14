@extends('layouts.app')

@section('content')
    
    <meta name="friendId" content="{{$friend->id}}">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 d-flex py-3" style="background-color: #F3EFEF ">
                   <div class="col-lg-6 flex">
                       <p><i style="color:#3490dc " class="fa fa-user fa-2x"></i></p>
                        <h3 class="ml-2" style="color:#3490dc;font-size-35px "> {{ $friend->name }}</h3>
                   </div>
                    <div class="col-lg-6">
                        <a href="{{ url('/chat') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
            </div>
           
                   <chat-component v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat-component>
     </div>
            
        
    </div>
@endsection
