@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    {{-- <a href="/posts/create" class="btn btn-primary">New Post</a> --}}
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-body mb-3">
                <div class="row">
                    @if( $post->cover_img !== '' || $post->cover_img !== 'noimage.jpg' )
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%" src="/storage/cover_images/{{ $post->cover_img }}" />
                    </div>
                    @endif
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                        <small>Written on {{ $post->created_at }} by {{ $post->user->name}}</small>
                        {{-- <p>{{ $post->body }}</p> --}}
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found</p>
    @endif
@endsection