@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Category Information') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Name') }}</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Name') }}" id="name" name="name"
                                    class="form-control slug_title" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Parent Category') }}</label>
                            <div class="col-md-9">
                                <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2"
                                    data-placeholder="Choose ..." data-live-search="true">
                                    <option value="0">{{ translate('No Parent') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                        @foreach ($category->childrenCategories as $childCategory)
                                            @include('categories.child_category', [
                                                'child_category' => $childCategory,
                                            ])
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Ordering Number') }}
                            </label>
                            <div class="col-md-9">
                                <input type="number" name="order_level" class="form-control" id="order_level"
                                    placeholder="{{ translate('Order Level') }}">
                                <small>{{ translate('Higher number has high priority') }}</small>
                            </div>
                        </div>

                        @livewire('slug-check', ['model' => 'App\\Models\\Category', 'template' => 2])
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group  row">
                            <label class="col-md-3 col-form-label">{{ translate('Is Featured') }}</label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="featured">
                                    <option {{ old('featured') == 1 ? 'selected' : '' }} value="1">{{ translate('Yes') }}
                                    </option>
                                    <option {{ old('featured') == 0 ? 'selected' : '' }} value="0">{{ translate('No') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-md-3 col-form-label">{{ translate('Is Top') }}</label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="top">
                                    <option {{ old('top') == 1 ? 'selected' : '' }} value="1">{{ translate('Yes') }}
                                    </option>
                                    <option {{ old('top') == 0 ? 'selected' : '' }} value="0">{{ translate('No') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ translate('Banner') }}
                                <small>({{ translate('200x200') }})</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ translate('Icon') }}
                                <small>({{ translate('32x32') }})</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="icon" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">{{ translate('Meta Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title"
                                    placeholder="{{ translate('Meta Title') }}" value="{{ old('meta_title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('Meta Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" rows="5" class="form-control">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">{{ translate('Meta Keywords') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    placeholder="{{ translate('Meta Keywords') }}" value="{{ old('meta_keywords') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">{{ translate('OG Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="og_title"
                                    placeholder="{{ translate('OG Title') }}" value="{{ old('og_title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('OG Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="og_description" rows="5" class="form-control">{{ old('og_description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('Twitter Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter_title"
                                    placeholder="{{ translate('Twitter Title') }}" value="{{ old('twitter_title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('Twitter Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="twitter_description" rows="5" class="form-control">{{ old('twitter_description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('Footer Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="footer_title"
                                    placeholder="{{ translate('Footer Title') }}" value="{{ old('footer_title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="name">{{ translate('Footer Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="footer_description" rows="5" class="form-control aiz-text-editor">{{ old('footer_description') }}</textarea>
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Filtering Attributes')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="filtering_attributes[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" multiple>
                                @foreach (\App\Models\Attribute::all() as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @livewireScripts
    @livewireStyles
    <script type="text/javascript">
        function sort_brands(el) {
            $('#sort_brands').submit();
        }

        $('.slug_title').on('change', function() {
            console.log($(this).val());
            Livewire.emit('titleChanged', $(this).val())
        });
    </script>
@endsection