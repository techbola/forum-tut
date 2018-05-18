@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
        
            Create a new discussion

        </div>

        <div class="card-body">

            <form action="{{ route('discussions.store') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="channel">Pick a channel</label>
                    <select name="channel_id" id="channel_id" class="form-control">
                        
                        @foreach($channels as $channel)

                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success pull-right" type="submit">Create Discussion</button>
                </div>

            </form>

        </div>
    </div>

@endsection
