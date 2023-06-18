@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6">Category Information</h5>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body p-0">
                    <form class="p-4" action="{{ route('classifides_categories.update', $classifides_category->id) }}"
                        method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Name </label>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{ $classifides_category->title }}"
                                    class="form-control" id="name" placeholder="Name" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Parent Category</label>
                            <div class="col-md-9">
                                <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2"
                                    data-placeholder="Choose ..."data-live-search="true"
                                    data-selected="{{ $classifides_category->parent_id }}">
                                    <option value="0">No Parent</option>
                                    @foreach ($categories as $classifides_child_category)
                                        <option value="{{ $classifides_child_category->id }}">
                                            {{ $classifides_child_category->title }}
                                        </option>
                                        @foreach ($classifides_child_category->childrenCategories as $childCategory)
                                            @if ($childCategory->id !== $classifides_category->id)
                                                @include(
                                                    'backend.classifides.category.cls_child_category',
                                                    [
                                                        'child_category' => $childCategory,
                                                        'classifides_category_id' => $classifides_category->id,
                                                    ]
                                                )
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Ordering Number
                            </label>
                            <div class="col-md-9">
                                <input type="number" name="order_level" value="{{ $classifides_category->order_level }}"
                                    class="form-control" id="order_level" placeholder="Order Level">
                                <small>Higher number has high priority</small>
                            </div>
                        </div>

                        @livewire('slug-check', ['model' => 'App\\Models\\Classifieds\\ClassifiedCategory', 'model_id' => $classifides_category->id, 'template' => 2])
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group  row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="status">
                                    <option {{ old('status', $classifides_category->status) == 1 ? 'selected' : '' }}
                                        value="1">Enabled
                                    </option>
                                    <option {{ old('status', $classifides_category->status) == 0 ? 'selected' : '' }}
                                        value="0">Disabled
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Banner
                                <small>(200x200)</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                    <input type="hidden" name="image" class="selected-files"
                                        value="{{ $classifides_category->image }}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Meta Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title"
                                    value="{{ old('meta_title', $classifides_category->meta_title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Meta Description</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" rows="5" class="form-control">{{ old('meta_description', $classifides_category->meta_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Meta Keywords</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keywords"
                                    value="{{ old('meta_keyword', $classifides_category->meta_keyword) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">OG Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="og_title" placeholder="OG Title"
                                    value="{{ old('og_title', $classifides_category->og_title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">OG Description</label>
                            <div class="col-md-9">
                                <textarea name="og_description" rows="5" class="form-control">{{ old('og_description', $classifides_category->og_description) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Twitter Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter_title"
                                    placeholder="Twitter Title"
                                    value="{{ old('twitter_title', $classifides_category->twitter_title) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Twitter Description</label>
                            <div class="col-md-9">
                                <textarea name="twitter_description" rows="5" class="form-control">{{ old('twitter_description', $classifides_category->twitter_description) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
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
@endsection
