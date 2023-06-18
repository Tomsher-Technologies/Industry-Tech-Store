@php
    $value = null;
    for ($i = 0; $i < $child_category->level; $i++) {
        $value .= '--';
    }
@endphp
<option {{ isset($old_data) ? ($old_data == $child_category->id ? 'selected' : '') : '' }}
    value="{{ $child_category->id }}">{{ $value . ' ' . $child_category->title }}</option>
@if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @if ($classifides_category_id && $classifides_category_id !== $childCategory->id)
            @include('backend.classifides.category.cls_child_category', [
                'child_category' => $childCategory,
                'classifides_category_id' => $classifides_category_id,
            ])
        @endif
    @endforeach
@endif
