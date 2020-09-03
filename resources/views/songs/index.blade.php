@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <a href="{{ url('create') }}" class="btn btn-success">Create Song</a>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artists</th>
                                <th>Songs Lyrics</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($songs as $song_list)
                            <tr>
                                <td>{{ $song_list->title }}</td>
                                <td>{{ $song_list->artists }}</td>
                                <td><a href="{{ url('show', [$song_list->id]) }}">View Lyrics</a></td>
                                <td>{{ $song_list->published_at }}</td>
                                <td>
                                    <a href="{{ url('show', [$song_list->id]) }}/edit" class="btn btn-info btn-sm">Update</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this song?')" href="{{url('delete', [$song_list->id])}}/delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
