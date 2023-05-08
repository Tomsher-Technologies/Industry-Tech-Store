@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">{{ translate('Create Brands') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Add New Brand') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('brands.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Name') }}</label>
                            <input type="text" placeholder="{{ translate('Name') }}" name="name"
                                class="form-control slug_title" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @livewire('slug-check', ['model' => 'App\\Models\\Brand'])

                        <div class="form-group  mb-3">
                            <label>{{ translate('Is Featured') }}</label>
                            <select class="select2 form-control" name="top">
                                <option {{ old('top') == 1 ? 'selected' : '' }} value="1">{{ translate('Yes') }}
                                </option>
                                <option {{ old('top') == 0 ? 'selected' : '' }} value="0">{{ translate('No') }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label
                                for="name">{{ translate('Logo') }}<small>({{ translate('150x70') }})</small></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ translate('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" value="{{ old('logo') }}" name="logo" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Meta Title') }}</label>
                            <input type="text" class="form-control" name="meta_title"
                                placeholder="{{ translate('Meta Title') }}" value="{{ old('meta_title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Meta Description') }}</label>
                            <textarea name="meta_description" rows="5" class="form-control">{{ old('meta_description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Meta Keywords') }}</label>
                            <input type="text" class="form-control" name="meta_keywords"
                                placeholder="{{ translate('Meta Keywords') }}" value="{{ old('meta_keywords') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">{{ translate('OG Title') }}</label>
                            <input type="text" class="form-control" name="og_title"
                                placeholder="{{ translate('OG Title') }}" value="{{ old('og_title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ translate('OG Description') }}</label>
                            <textarea name="og_description" rows="5" class="form-control">{{ old('og_description') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Twitter Title') }}</label>
                            <input type="text" class="form-control" name="twitter_title"
                                placeholder="{{ translate('Twitter Title') }}" value="{{ old('twitter_title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ translate('Twitter Description') }}</label>
                            <textarea name="twitter_description" rows="5" class="form-control">{{ old('twitter_description') }}</textarea>
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

                        <div class="form-group mb-3 text-right">
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
