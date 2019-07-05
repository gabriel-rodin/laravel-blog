<div class="card-body">
    <div class="card-text">{{ $blog->description }}</div>
    <div class="text-right">
        <small class="form-text text-muted">{{ $categories[$blog->category]->category }}</small>
        <small class="form-text text-muted">by:
            <a href="{{ url('/blog/'.$blog->user_id.'/user') }}">{{ $blog->user->name }}</a>
        </small>
        <small class="form-text text-muted">{{ $blog->created_at->diffForHumans() }}</small>
    </div>
</div>
