<div class="form-group row">
    <label class="col-md-3 col-form-label">{{ translate('Link Type') }}</label>
    <div class="col-md-9">
        <select class="form-control aiz-selectpicker" name="link_ref_id" id="link_ref_id" data-live-search="true" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}
                </option>
                @foreach ($category->childrenCategories as $childCategory)
                    @include('categories.child_category', [
                        'child_category' => $childCategory,
                    ])
                @endforeach
            @endforeach
        </select>
    </div>
</div>
