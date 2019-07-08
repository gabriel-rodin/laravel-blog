@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">
                    {{ $blog->title }}
                    @include('blog.partials.action')
                </div>
                @include('blog.partials.card-body')
            </div>
        </div>
    </div>
</div>
@endsection
