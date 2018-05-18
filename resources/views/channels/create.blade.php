@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Create a new channel</div>

        <div class="card-body">
            
            <form action="{{ route('channels.store') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <input type="text" name="channel" class="form-control" required="">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save Channel
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
        
@endsection
