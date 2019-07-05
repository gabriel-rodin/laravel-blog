@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($blogs as $blog)
            <div class="card mb-2">
                <div class="card-header">
                    {{ $blog->title }}<small id="emailHelp" class="form-text text-muted">{{ $categories[$blog->category] }}</small>
                </div>
                <div class="card-body">{{ $blog->description }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
