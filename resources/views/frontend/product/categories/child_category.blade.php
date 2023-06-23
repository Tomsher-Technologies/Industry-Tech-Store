<li class="{{ $category->child ? 'menu-item-has-children' : '' }}">
    <div class="ps-checkbox">
        <input {{ in_array($category->id, $selected_id) ? 'checked' : '' }} value="{{ $category->id }}"
            class="form-control" type="checkbox" id="category-{{ $category->slug }}" name="categories" />
        <label for="category-{{ $category->slug }}">{{ $category->name }}</label>
    </div>
    @if ($category->child)
        <span class="sub-toggle">
            <i class="fa fa-angle-down"></i>
        </span>
        <ul class="sub-menu">
            @foreach ($category->child as $cat)
                @include('frontend.product.categories.child_category', [
                    'category' => $cat,
                ])
            @endforeach
        </ul>
    @endif
</li>
