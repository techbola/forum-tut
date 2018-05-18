@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">

            <div class="card">
                <div class="card-header">
                    <img src="{{ $discussion->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span>{{ $discussion->user->name }}, <b>({{ $discussion->user->points }})</b></span>
                    
                    @if(Auth::id() == $discussion->user->id)

                        @if(!$discussion->hasBestAnswer())

                            <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" class="btn btn-info btn-sm" style="float: right;">
                                EDIT
                            </a>

                        @endif

                    @endif

                    @if($discussion->is_being_watched_by_auth_user())

                        <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-danger btn-sm" style="float: right;margin-right: 10px">
                            unwatch
                        </a>

                    @else

                        <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-warning btn-sm" style="float: right;margin-right: 10px">
                            watch
                        </a>

                    @endif

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

                        {!! Markdown::convertToHtml($discussion->content) !!}
                        <!-- {{ $discussion->content }} -->
                    </p>

                    <hr>

                    @if($best_answer)
                        
                        <h4>Best Answer</h4>
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                                <span>{{ $best_answer->user->name }}, <b>({{ $best_answer->user->points }})</b></span>
                            </div>
                            <div class="card-body">
                                {{ $best_answer->content }}
                            </div>
                        </div>

                    @endif

                    <hr>

                    <span>{{ $discussion->replies->count() }} Replies</span> 

                    <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="btn btn-primary btn-sm" style="float: right;">{{ $discussion->channel->title }}
                    </a>
                    
                </div>
            </div>

        </div>
    </div>

	<h3 style="padding: 20px;">Replies</h3>

    @foreach($discussion->replies as $r)

		<div class="card-body">

            <div class="card">
                <div class="card-header">
                    <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span>{{ $r->user->name }}, <b>({{ $r->user->points }})</b></span>
                    
                    @if(!$best_answer)

                        @if(Auth::id() == $discussion->user->id)

                            <a href="{{ route('discussion.best.answer', ['id' => $r->id]) }}" class="btn btn-sm btn-info" style="float: right;">Mark as best answer</a>

                        @endif

                    @endif

                    @if(Auth::id() == $r->user->id)

                        @if(!$r->best_answer)

                            <a href="{{ route('reply.edit', ['id' => $r->id]) }}" class="btn btn-sm btn-primary" style="float: right;margin-right: 10px;">EDIT</a>

                        @endif

                    @endif

                </div>
                <div class="card-body">

                    <p class="text-center">
                        {{ $r->content }}
                    </p>

                    <p>
                    	@if($r->is_liked_by_auth_user())

                            <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-danger btn-sm">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>

                        @else
                            <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-success btn-sm">Like <span class="badge">{{ $r->likes->count() }}</span></a>

                        @endif
                    </p>
                    
                </div>
                
            </div>

        </div>

    @endforeach

    <div class="card-body">

        <div class="card">

            <div class="card-body">

                @if(Auth::check())

                    <form action="{{ route('discussion.reply', ['$id' => $discussion->id]) }}" method="post">
                    	
    					{{ csrf_field() }}

    					<div class="form-group">
    						<label for="reply">Leave a Reply</label>
    						<textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
    					</div>

    					<div class="form-group">
    						<button class="btn pull-right" type="submit">Reply</button>
    					</div>

                    </form>

                @else

                    <div class="text-center">
                        <h2>Sign in to leave a reply</h2>
                    </div>

                @endif
                
            </div>
            
        </div>

    </div>

@endsection
