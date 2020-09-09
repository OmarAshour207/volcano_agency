@push('admin_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.change_status', function (e) {
                e.preventDefault();
                let url = $(this).data('url');
                let id = $(this).data('id');

                $.ajax({
                    url: url,
                    method: 'POST',
                    beforeSend: function () {
                        $('.loading-' + id).removeClass('d-none');
                        $('.data_error').html('');
                        $('.error_message').addClass('d-none');
                        $('.success_message').html('').addClass('d-none');
                    }, success: function (data) {
                        if (data.status == true) {
                            $('.loading-' + id).addClass('d-none');
                            $('.success_message').html('<h1>' + data.message + '</h1>').removeClass('d-none');
                            window.location.reload();
                        }
                    }, error: function (response) {
                        $('.loading-' + id).addClass('d-none');
                        let error_li = '';
                        $.each(response.responseJSON.errors, function(index, value){
                            error_li += '<li>' + value + '</li>'
                        });
                        $('.data_error').html(error_li);
                        $('.error_message').removeClass('d-none');
                    }
                });
            })
        });
    </script>
@endpush


@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.booking_orders') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.booking_orders') }} </h1>
                </div>
                <a href="{{ route('booking-orders.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <div class="alert alert-danger error_message d-none">
                        <ul class="data_error">
                        </ul>
                    </div>
                    <div class="alert alert-success success_message d-none"></div>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                            <tr>

                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                                    <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th style="width: 30px;"> # </th>
                            <th style="width: 40px;"> {{ trans('admin.name') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.email') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.phone') }}</th>
                            <th style="width: 40px;"> {{ trans('admin.address') }}</th>
                            <th style="width: 40px;"> {{ trans('admin.status') }}</th>
                            <th style="width: 40px;"> {{ trans('admin.type') }}</th>
                            <th style="width: 30px;"> {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($booking_orders->count() > 0)
                            @foreach($booking_orders as $index => $booking_order)
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
                                        {{ $booking_order->name }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 30px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $booking_order->email }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:50px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $booking_order->phone }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:120px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $booking_order->address }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:120px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $booking_order->type }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:120px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center btn btn-{{ $booking_order->status == 0 ? 'danger' : 'success' }}">
                                        {{ $booking_order->status == 0 ? __('admin.un_called') : __('admin.called') }}
                                    </div>
                                    <a href="javascript:void(0)"
                                       data-url = "{{ route('change.status', $booking_order->id) }}"
                                       data-id="{{ $booking_order->id }}"
                                       class="btn btn-info ml-1 change_status">
                                        {{ __('admin.change') }}
                                        <i class="fa fa-spin fa-spinner loading-{{ $booking_order->id }} d-none"></i>
                                    </a>
                                </div>
                            </td>

                            <td>
                                <a href="{{ route('booking-orders.edit', $booking_order->id) }}" class="btn btn-sm btn-link">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <form action="{{ route('booking-orders.destroy', $booking_order->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                            {{ $booking_orders->appends(request()->query())->links() }}
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
