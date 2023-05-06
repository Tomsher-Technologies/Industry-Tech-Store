@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Enquiry') }}</h5>
                </div>
                <div class="card-body">


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ translate('Customer') }}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{ translate('Customer') }}" id="name" name="name"
                                class="form-control" value="{{ $enquiry->user->name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ translate('Query') }}</label>
                        <div class="col-md-9">
                            <textarea name="" class="form-control" disabled id="" cols="30" rows="10">{{ $enquiry->comment }}</textarea>
                        </div>
                    </div>



                    @if ($enquiry->products)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Products') }}</label>
                            <div class="col-md-9">
                                <table class="table aiz-table mb-0">
                                    <thead>
                                        <tr>
                                            <th width="20%">{{ translate('Product Name') }}</th>
                                            <th width="20%">{{ translate('Product Variation') }}</th>
                                            <th data-breakpoints="lg">{{ translate('Product SKU') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiry->products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    {{ $product->pivot->varient ?? '-' }}
                                                </td>
                                                <td>
                                                    {{ $product->pivot->sku }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
