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
                    <h1 class="m-0"> {{ trans('admin.hotels_offers') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('offers.update', $offer->id) }}">

                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label> {{ trans('admin.hotels') }} / {{ trans('admin.hotel_name') }}</label>
                        <select class="form-control select2" name="hotel_id">
                            <option value=""> {{ __('admin.choose_hotel') }} </option>
                            @foreach($hotels as $index => $hotel)
                                @php
                                    $name = session('lang') . '_name';
                                @endphp
                                <option value="{{ $hotel->id }}" {{ $hotel->id == $offer->hotel_id ? 'selected' : '' }}> {{ $hotel->$name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price"> {{ trans('admin.hotel') }} / {{ trans('admin.price') }}</label>
                        <input id="price" name="price" type="text" class="form-control" placeholder="{{ __('admin.price') }}" value="{{ $offer->price }}">
                    </div>

                    <div class="form-group">
                        <label for="check_in"> {{ trans('admin.hotel') }} / {{ trans('admin.check_in') }}</label>
                        <input id="check_in" name="check_in" type="date" class="form-control" placeholder="{{ __('admin.check_in') }}" value="{{ $offer->check_in }}">
                    </div>
                    <div class="form-group">
                        <label for="check_out"> {{ trans('admin.hotel') }} / {{ trans('admin.check_out') }}</label>
                        <input id="check_out" name="check_out" type="date" class="form-control" placeholder="{{ __('admin.check_out') }}" value="{{ $offer->check_out }}">
                    </div>

                    <div class="form-group">
                        <label for="rooms"> {{ trans('admin.hotel') }} / {{ trans('admin.rooms') }}</label>
                        <input id="rooms" name="rooms" type="number" class="form-control" placeholder="{{ __('admin.rooms') }}" value="{{ $offer->rooms }}">
                    </div>

                    <div class="form-group">
                        <label for="adults"> {{ trans('admin.hotel') }} / {{ trans('admin.adults') }}</label>
                        <input id="adults" name="adults" type="number" class="form-control" placeholder="{{ __('admin.adults') }}" value="{{ $offer->adults }}">
                    </div>

                    <div class="form-group">
                        <label for="kids"> {{ trans('admin.hotel') }} / {{ trans('admin.kids') }}</label>
                        <input id="kids" name="kids" type="number" class="form-control" placeholder="{{ __('admin.kids') }}" value="{{ $offer->kids }}">
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
