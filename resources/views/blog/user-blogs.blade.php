@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h3>{{ $user->id == Auth::user()->id ? 'Your' : $user->name.'\'s' }} Blog Posts</h3>
            </div>
            @foreach($blogs as $blog)
            <div class="card mb-2">
                <div class="card-header">
                    <a href="{{ url('/blog/'.$blog->id) }}" style="display:inline;">{{ $blog->title }}</a>
                </div>
                @include('blog.partials.card-body')
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
