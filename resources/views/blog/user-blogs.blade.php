@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('blog.partials.filter')
        </div>
        <div class="col-md-8">
            @if(count($blogs) < 1)
            <div class="text-center">
                <h2>Nothing to display!</h2>
            </div>
            @else
            <div class="text-center">
                <h3>{{ $user->id == Auth::user()->id ? 'Your' : $user->name.'\'s' }} Blog Posts</h3>
            </div>
            @php
                $currentDisplay = $blogs->currentPage() * $blogs->perPage();
            @endphp
            <h2>{{ isset($label) ? $label : 'All Categories' }}</h2>
            <div style="text-align:right">
                Showing (
                <span id="start-page">{{ $currentDisplay - ($blogs->perPage() - 1) }}</span>
                -
                <span id="end-page">{{ $currentDisplay < $blogs->total() ? $currentDisplay : $blogs->total() }}</span>
                of
                <span id="total-blog">{{ $blogs->total() }}</span> )
            </div>
            @endif
            @foreach($blogs as $blog)
            <div class="card mb-2">
                <div class="card-header">
                    <a href="{{ url('/blog/'.$blog->id) }}" style="display:inline;">{{ $blog->title }}</a>
                    @include('blog.partials.action')
                </div>
                @include('blog.partials.card-body')
            </div>
            @endforeach
            {{ $blogs->appends(request()->except('page'))->links() }}
        </div>
    </div>
</div>
@endsection
@section('js')
@include('blog.includes.action-js')
@endsection
