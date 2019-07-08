@if($blog->user_id == Auth::user()->id)
    <span class="pull-right">
        <a href="/blog/{{ $blog->id }}/edit" style="text-decoration:none;"><i class="fa fa-edit"></i> Edit</a>
        <a class="delete-blog" style="cursor:pointer;" data-id="{{ $blog->id }}"><i class="fa fa-trash"></i> Delete</a>
    </span>
@endif
