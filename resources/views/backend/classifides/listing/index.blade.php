@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">Classifieds</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('classifides.create') }}" class="btn btn-primary">
                    <span>Add new classified</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6">Classified</h5>
            <form class="" id="sort_categories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search"
                            name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset
                            placeholder="Type name & Enter">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th data-breakpoints="lg">#</th>
                        <th>Name</th>
                        <th data-breakpoints="lg">Parent Category</th>
                        <th data-breakpoints="lg">Banner</th>
                        <th width="10%" class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classifides as $key => $classifide)
                        <tr>
                            <td>{{ $key + 1 + ($classifides->currentPage() - 1) * $classifides->perPage() }}</td>
                            <td>{{ $classifide->title }}</td>
                            <td>
                                @if ($classifide->category)
                                    {{ $classifide->category->title }}
                                @else
                                    —
                                @endif
                            </td>
                            <td>
                                @if ($classifide->image != null)
                                    <img src="{{ uploaded_asset($classifide->image) }}" alt="Banner" class="h-50px">
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                    href="{{ route('classifides.edit', [
                                        'classifide' => $classifide,
                                    ]) }}"
                                    title="Edit">
                                    <i class="las la-edit"></i>
                                </a>
                                @include('backend.parts.deleteform', [
                                    'route' => route('classifides.destroy', [
                                        'classifide' => $classifide,
                                    ]),
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $classifides->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection
