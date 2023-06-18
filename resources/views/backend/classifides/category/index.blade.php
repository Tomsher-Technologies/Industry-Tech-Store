@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">Classifieds Categories</h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('classifides_categories.create') }}" class="btn btn-primary">
                    <span>Add new category</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-block d-md-flex">
            <h5 class="mb-0 h6">Categories</h5>
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
                        <th data-breakpoints="lg">Order Level</th>
                        <th data-breakpoints="lg">Level</th>
                        <th data-breakpoints="lg">Banner</th>
                        <th width="10%" class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                @if ($category->parent)
                                    {{ $category->parent->title }}
                                @else
                                    —
                                @endif
                            </td>
                            <td>{{ $category->order_level }}</td>
                            <td>{{ $category->level }}</td>
                            <td>
                                @if ($category->image != null)
                                    <img src="{{ uploaded_asset($category->image) }}" alt="Banner" class="h-50px">
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                    href="{{ route('classifides_categories.edit', [
                                        'classifides_category' => $category,
                                    ]) }}"
                                    title="Edit">
                                    <i class="las la-edit"></i>
                                </a>
                                @include('backend.parts.deleteform', [
                                    'route' => route('classifides_categories.destroy', [
                                        'classifides_category' => $category,
                                    ]),
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $categories->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection
