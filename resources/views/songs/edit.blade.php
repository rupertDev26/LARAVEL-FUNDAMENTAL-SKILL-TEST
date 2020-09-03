@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Edit {{ $song->title }}</h3>

                    <form class="form" method="POST" action="{{ url('show', [$song->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="input @error('title') is-danger @enderror}} form-control" value="{{ $song->title }}">

                                @error('title')
                                    <p class="error is-danger">{{ $errors->first('title') }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="artist" id="artist" class="input @error('artist') is-danger @enderror}} form-control" value="{{ $song->artists }}" placeholder="Enter Song Artist">

                                @error('artist')
                                    <p class="error is-danger">{{ $errors->first('artist') }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="textarea @error('lyrics') is-danger @enderror}} form-control" name="lyrics" id="lyrics">{{ $song->lyrics }}</textarea>
                            @error('lyrics')
                                <p class="error is-danger">{{ $errors->first('lyrics') }}</p>
                            @enderror
                        </div>

                        <button class="btn btn-success" type="submit">Save Song</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
