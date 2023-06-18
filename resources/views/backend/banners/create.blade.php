@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Create Banner</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('banners.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Name" value="{{ old('name') }}" id="name"
                                    name="name" class="form-control" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Layout</label>
                            <div class="col-md-9">
                                <select onchange="get_layout()" class="select2 form-control aiz-selectpicker" id="layout"
                                    name="layout" data-toggle="select2" data-placeholder="Choose ..."
                                    data-live-search="true">
                                    @foreach ($layouts as $key => $layout)
                                        <option value="{{ $key }}">{{ $layout['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('layout')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="layout_form">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="status" id="status" required>
                                    <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Enabled</option>
                                    <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Disabled</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            get_layout();
        });

        function get_layout() {
            var layout = $('#layout').val();
            $.post('{{ route('banners.get_layout') }}', {
                _token: '{{ csrf_token() }}',
                layout_type: layout,
            }, function(data) {
                $('#layout_form').html(data);
            });
        }

        function banner_form() {
            var link_type = $('#link_type').val();
            var link_error = "{{ $errors->getBag('default')->first('link') }}"
            var link_id_error = "{{ $errors->getBag('default')->first('link_ref_id') }}"
            $.post('{{ route('banners.get_form') }}', {
                _token: '{{ csrf_token() }}',
                link_type: link_type,
            }, function(data) {
                $('#banner_form').html(data);
            });
        }
    </script>
@endsection
