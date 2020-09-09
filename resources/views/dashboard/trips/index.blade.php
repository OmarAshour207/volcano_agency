@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.trips') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.trips') }} </h1>
                </div>
                <a href="{{ route('trips.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                        <tr>

                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                                    <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th style="width: 30px"> {{ trans('admin.id') }} </th>
                            <th style="width: 40px"> {{ trans('admin.ar_title') }} </th>
                            <th style="width: 40px"> {{ trans('admin.en_title') }} </th>
                            <th style="width: 40px"> {{ trans('admin.ar_start') }} </th>
                            <th style="width: 40px"> {{ trans('admin.en_start') }} </th>
                            <th style="width: 40px"> {{ trans('admin.ar_destination') }} </th>
                            <th style="width: 40px"> {{ trans('admin.en_destination') }} </th>
                            <th style="width: 40px"> {{ trans('admin.price') }} </th>
                            <th style="width: 40px"> {{ trans('admin.start_at') }} </th>
                            <th style="width: 40px"> {{ trans('admin.start_at_time') }} </th>
                            <th style="width: 40px"> {{ trans('admin.end_at') }} </th>
                            <th style="width: 40px"> {{ trans('admin.end_at_time') }} </th>
                            <th style="width: 30px"> {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($trips->count() > 0)
                            @foreach($trips as $index => $trip)
                                <tr>
                                    <td class="text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                            <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                        </div>
                                    </td>

                                    <td style="width: 30px;">
                                        <div class="badge badge-soft-dark"> {{ $index+1 }} </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->ar_title }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->en_title }}
                                            </div>
                                        </div>
                                    </td>


                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->ar_start }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->en_start }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->ar_destination }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->en_destination }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $trip->price }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('d-m-Y', strtotime($trip->start_at)) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('g:i A', strtotime($trip->start_at_time)) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('d-m-Y', strtotime($trip->end_at)) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('g:i A', strtotime($trip->end_at_time)) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-sm btn-link">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <form action="{{ route('trips.destroy', $trip->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $trips->appends(request()->query())->links() }}
                        @else
                            <h1> {{ trans('admin.no_records') }} </h1>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
