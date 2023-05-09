@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form class="" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Product Enquiries') }}</h5>
                </div>
                <div class="col-lg-2">
                    <div class="form-group mb-0">
                        <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date"
                            placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to "
                            data-advanced-range="true" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group mb-0">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="seller_id"
                            name="user_id">
                            <option value="">{{ translate('All Users') }}</option>
                            @foreach ($users as $key => $user)
                                <option value="{{ $user->id }}" {{ $user->id == $search_user ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th data-breakpoints="lg">#</th>
                        <th width="20%">{{ translate('Customer') }}</th>
                        <th data-breakpoints="lg">{{ translate('Num. of Products') }}</th>
                        <th data-breakpoints="lg">{{ translate('Created At') }}</th>
                        <th data-breakpoints="lg">{{ translate('Status') }}</th>
                        <th class="text-right" width="15%">{{ translate('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enquiries as $enquiry)
                        <tr>
                            <td>
                                {{ $key + 1 + ($enquiries->currentPage() - 1) * $enquiries->perPage() }}
                            </td>
                            <td>
                                {{ $enquiry->user->name }}
                            </td>
                            <td>
                                {{ $enquiry->products_count }}
                            </td>
                            <td>
                                {{ $enquiry->created_at->format('d-m-Y') }}
                            </td>
                            <td>
                                @if ($enquiry->status)
                                    <span
                                        class="badge badge-inline badge-success text-capitalize">{{ translate('viewed') }}</span>
                                @else
                                    <span
                                        class="badge badge-inline badge-danger text-capitalize">{{ translate('New') }}</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                    href="{{ route('enquiries.show', encrypt($enquiry->id)) }}"
                                    title="{{ translate('View') }}">
                                    <i class="las la-eye"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                    data-href="{{ route('enquiries.destroy', $enquiry->id) }}"
                                    title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $enquiries->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function sort_orders(el) {
            $('#sort_orders').submit();
        }
    </script>
@endsection