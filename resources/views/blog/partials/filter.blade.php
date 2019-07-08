<div class="card">
    <article class="card-group-item">
        <header class="card-header">
            <h6 class="title">Choose Category </h6>
        </header>
        <div class="filter-content">
            <div class="card-body">
                @foreach($categories as $category)
                <label class="form-check">
                    <input class="form-check-input" type="radio" name="category" value="{{ $category->id }}" {{ Request::get('cat') == $category->id ? 'checked' : '' }}>
                    <span class="form-check-label">
                        {{ $category->name }}
                    </span>
                </label>
                @endforeach
            </div> <!-- card-body.// -->
            <div class="text-center mb-4" >
                <button class="btn btn-secondary" id="filter-category">Filter</button>
            </div>
        </div>
    </article> <!-- card-group-item.// -->
</div> <!-- card.// -->
