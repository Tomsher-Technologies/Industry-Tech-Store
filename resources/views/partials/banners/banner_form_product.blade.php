<div class="form-group row">
    <label class="col-md-3 col-form-label">{{ translate('Link') }}</label>
    <div class="col-md-9">
        <select  class="form-control aiz-selectpicker" name="link_ref_id"
            id="link_ref_id" data-live-search="true" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
</div>