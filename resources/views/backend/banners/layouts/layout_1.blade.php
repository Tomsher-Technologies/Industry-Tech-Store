<div class="form-group row">
    <label class="col-md-3 col-form-label" for="signinSrEmail">
        Banner
        <small>(1300x650)</small>
    </label>
    <div class="col-md-9">
        <div class="input-group" data-toggle="aizuploader" data-type="image">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">
                    Browse
                </div>
            </div>
            <div class="form-control file-amount">Choose File</div>
            <input value="{{ old('banner') }}" type="hidden" name="banner" class="selected-files" required>
        </div>
        <div class="file-preview box sm">
        </div>
        @error('banner')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 col-form-label" for="signinSrEmail">
        Mobile Banner
        <small>(1300x650)</small>
    </label>
    <div class="col-md-9">
        <div class="input-group" data-toggle="aizuploader" data-type="image">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">
                    Browse
                </div>
            </div>
            <div class="form-control file-amount">Choose File</div>
            <input value="{{ old('mobile_banner') }}" type="hidden" name="mobile_banner" class="selected-files"
                required>
        </div>
        <div class="file-preview box sm">
        </div>
        @error('mobile_banner')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 col-form-label">Link Type</label>
    <div class="col-md-9">
        <select onchange="banner_form()" class="form-control aiz-selectpicker" name="link_type" id="link_type"
            data-live-search="true" required>
            <option {{ old('link_type') == 'external' ? 'selected' : '' }} value="external">
                External
            </option>
            <option {{ old('link_type') == 'product' ? 'selected' : '' }} value="product">Product
            </option>
            <option {{ old('link_type') == 'category' ? 'selected' : '' }} value="category">
                Category</option>
        </select>
        @error('link_type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div id="banner_form">
</div>
