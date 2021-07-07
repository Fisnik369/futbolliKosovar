@extends('layouts.app')

@section('content')

<h1>Blogs</h1>
    @if (count($posts) > 0)
       @foreach($posts as $post)
        <div class="card p-3 mt-3 mb-3">
            <h3> <a href="posts/{{$post->id}}">{{$post->title}}</a></h3>

            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            {{-- <a href="/posts/edit/{id}" class="btn btn-default">Edit Post</a> --}}

        </div>

       @endforeach
    @else

    <p>No Posts found</p>
        
    @endif
@endsection