@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Create a new song</h3>

                    <form class="form" method="POST" action="{{ url('index') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="input @error('title') is-danger @enderror}} form-control" value="{{ old('title') }}" placeholder="Enter Song Title">

                                @error('title')
                                    <p class="error is-danger">{{ $errors->first('title') }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="artist" id="artist" class="input @error('artist') is-danger @enderror}} form-control" value="{{ old('artist') }}" placeholder="Enter Song Artist">

                                @error('artist')
                                    <p class="error is-danger">{{ $errors->first('artist') }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="textarea @error('lyrics') is-danger @enderror}} form-control" name="lyrics" id="lyrics">Enter Song Lyrics {{ old('lyrics') }}</textarea>
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
