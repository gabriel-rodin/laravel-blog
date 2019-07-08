@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($users) < 1)
            <div class="text-center">
                <h2>No Users!</h2>
            </div>
            @endif
            <h2>List of Users</h2>
            @foreach($users as $user)
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('blog/'.$user->id.'/user') }}">
                        {{ $user->name }} ( {{ $user->posts->count() }} )
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
