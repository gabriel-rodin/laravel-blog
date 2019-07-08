<div class="card-body">
    <div class="card-text">{{ $blog->description }}</div>
    <div class="text-right">
        <small class="form-text text-muted">
            <a {!! isset($label) ? '' : 'style="cursor:pointer;" class="card-category"' !!}  data-id="{{ $blog->category->id }}">{{ $blog->category->name }}</a>
        </small>
        <small class="form-text text-muted">by:
            <a {{ Request::segment(3) == 'user' ? '' : 'href='.url('/blog/'.$blog->user_id.'/user').'' }} >{{ $blog->user->name }}</a>
        </small>
        <small class="form-text text-muted">{{ $blog->created_at->diffForHumans() }}</small>
    </div>
</div>
