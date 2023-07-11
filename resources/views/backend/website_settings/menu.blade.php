@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h6 class="fw-600 mb-0">Menu</h6>
                </div>
                <div class="card-body">
                    {!! Menu::render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! Menu::scripts() !!}
@endsection
