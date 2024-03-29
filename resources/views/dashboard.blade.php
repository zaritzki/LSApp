@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary mb-3" href="/posts/create">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><a class="btn btn-primary mr-2" href="/posts/{{ $post->id }}/edit">Edit</a></td>
                                <td>
                                    {{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) }}
                                        {{ Form::hidden('_method','DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
