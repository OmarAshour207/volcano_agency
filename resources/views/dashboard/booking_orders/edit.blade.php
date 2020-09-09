@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.booking_orders') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('booking-orders.update', $booking_order->id) }}">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="name"> {{ trans('admin.project') }} / {{ trans('admin.full_name') }}</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('admin.full_name') }}" value="{{ $booking_order->name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone"> {{ trans('admin.project') }} / {{ trans('admin.phone') }}</label>
                        <input id="phone" name="phone" type="text" class="form-control" placeholder="{{ __('admin.phone') }}" value="{{ $booking_order->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="email"> {{ trans('admin.booking_orders') }} / {{ trans('admin.email') }}</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="{{ trans('admin.email') }}" value="{{ $booking_order->email }}">
                    </div>
                    <div class="form-group">
                        <label for="address"> {{ trans('admin.booking_orders') }} / {{ trans('admin.address') }}</label>
                        <input id="address" name="address" type="text" class="form-control" placeholder="{{ trans('admin.address') }}" value="{{ $booking_order->address }}">
                    </div>

                    <div class="form-group">
                        <label for="type"> {{ trans('admin.booking_orders') }} / {{ trans('admin.type') }}</label>
                        <select class="form-control select2" name="type" id="type">
                            <option value="">  {{ __('admin.choose_type') }} </option>
                            @php
                                $types = ['Hotel', 'Flight', 'Trip'];
                                $words = [ __('admin.hotel'), __('home.flight'), __('admin.trip')];
                            @endphp
                            @for($i = 0; $i < count($types); $i++)
                                <option value="{{ $types[$i] }}" {{ $booking_order->type == $types[$i] ? 'selected' : '' }}> {{ $words[$i] }} </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status"> {{ trans('admin.booking_orders') }} / {{ trans('admin.status') }}</label>
                        <select class="form-control select2" name="status" id="status">
                            <option value="">  {{ __('admin.choose_type') }} </option>
                            <option value="0" {{ $booking_order->status == 0 ? 'selected' : '' }}> {{ __('admin.un_called') }} </option>
                            <option value="1" {{ $booking_order->status == 1 ? 'selected' : '' }}> {{ __('admin.called') }} </option>
                        </select>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
