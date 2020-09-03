@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    {{ __('Dashboard') }}

                    <div class="float-right">
                        <a href="{{ url('show', [$songs->id]) }}/edit" class="btn btn-info btn-sm">Update</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this song?')" href="{{url('delete', [$songs->id])}}/delete">Delete</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="song-details">
                        <h2 class="title"><strong>Title:</strong> {{ $songs->title }}</h2>
                        <h4 class="artist"><strong>Artist:</strong> {{ $songs->artists }}</h4>
                    </div>

                    <div class="song-lyrics"><strong>Song Lyric:</strong> {{ $songs->lyrics }}</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
