@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ $channel->title }}</div>

        <div class="card-body">

            @foreach($discussions as $discussion)

                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-header">
                        <img src="{{ $discussion->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                        <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
                        <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-info btn-sm" style="float: right;">
                            View
                        </a>

                        @if($discussion->hasBestAnswer())

                            <span class="btn btn-danger btn-sm" style="float: right;margin-right: 10px">CLOSED</span>

                        @else

                            <span class="btn btn-success btn-sm" style="float: right;margin-right: 10px">OPEN</span>

                        @endif
                        
                    </div>
                    <div class="card-body">

                        <h4 class="text-center">
                            <b>{{ $discussion->title }}</b>
                        </h4>
                        <p class="text-center">
                            {{ str_limit($discussion->content, 50) }}
                        </p>

                        <hr>

                        <span>{{ $discussion->replies->count() }} Replies</span> 

                        <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="btn btn-primary btn-sm" style="float: right;">{{ $discussion->channel->title }}
                        </a>
                        
                    </div>
                </div>

            @endforeach

            <br><br>

            <div class="text-center">
                {{ $discussions->links() }}
            </div>

        </div>
    </div>

@endsection
