@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    @if(count($post) > 0)
        <h1>{{ $post->title }}</h1>
        @if( $post->cover_img !== '' )
        <img style="width: 100%" src="/storage/cover_images/{{ $post->cover_img }}" />
        <br /><br />
        @endif
        <div>
            {!! $post->body !!}
        </div>
        <hr />
        <small>Written on {{ $post->created_at }} by {{ $post->user->name}}</small>
        <hr />
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary float-left">Edit</a>

                {{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) }}
                    {{ Form::hidden('_method','DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
                {{ Form::close() }}
            @endif
        @endif
    @else
        <p>No post found</p>
    @endif
@endsection