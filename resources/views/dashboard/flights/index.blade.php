@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.flights') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.flights') }} </h1>
                </div>
                <a href="{{ route('flights.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
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
                            <th style="width: 40px"> {{ trans('admin.ar_start') }} </th>
                            <th style="width: 40px"> {{ trans('admin.en_start') }} </th>
                            <th style="width: 40px"> {{ trans('admin.ar_destination') }} </th>
                            <th style="width: 40px"> {{ trans('admin.en_destination') }} </th>
                            <th style="width: 40px"> {{ trans('admin.price') }} </th>
                            <th style="width: 40px"> {{ trans('admin.status') }} </th>
                            <th style="width: 40px"> {{ trans('admin.take_off') }} </th>
                            <th style="width: 40px"> {{ trans('admin.take_off_time') }} </th>
                            <th style="width: 40px"> {{ trans('admin.landing') }} </th>
                            <th style="width: 40px"> {{ trans('admin.landing_time') }} </th>
                            <th style="width: 40px"> {{ trans('admin.adults') }} </th>
                            <th style="width: 30px"> {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($flights->count() > 0)
                            @foreach($flights as $index => $flight)
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
                                            <div class="d-flex align-items-center btn btn-success">
                                                {{ mb_substr($flight->ar_start, 0, 20) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center btn btn-success">
                                                {{ substr($flight->en_start, 0, 20) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center btn btn-danger">
                                                {{ mb_substr($flight->ar_destination, 0, 20) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center btn btn-danger">
                                                {{ substr($flight->en_destination, 0, 20) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $flight->price }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $flight->status == 0 ? __('admin.one_way') : __('admin.two_way') }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('d-m-Y', strtotime($flight->take_off)) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('g:i A', strtotime($flight->take_off_time)) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('d-m-Y', strtotime($flight->landing)) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ date('g:i A', strtotime($flight->landing_time)) }}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width: 40px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $flight->adults }}
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-sm btn-link">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <form action="{{ route('flights.destroy', $flight->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $flights->appends(request()->query())->links() }}
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
