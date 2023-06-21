{{-- <li class="{{ $category->child ? 'menu-item-has-children' : '' }}">
    <div class="ps-checkbox">
        <label for="category-{{ $category->slug }}">{{ $category->name }}</label>
    </div>
    @if ($category->child)
        <ul class="sub-menu">
            @foreach ($category->child as $cat)
                @include('frontend.product.categories.menu_child_category', [
                    'category' => $cat,
                ])
            @endforeach
        </ul>
    @endif
</li> --}}


@php
    $value = null;
    for ($i = 0; $i < $category->level; $i++) {
        $value .= '-';
    }
@endphp
<option {{ isset($old_data) ? ( $old_data == $category->id ? 'selected' : '' ) : '' }} value="{{ $category->id }}">{{ $value . ' ' . $category->name }}</option>
@if ($category->child)
    @foreach ($category->child as $childCategory)
        @include('frontend.product.categories.menu_child_category', [
            'category' => $childCategory,
        ])
    @endforeach
@endif