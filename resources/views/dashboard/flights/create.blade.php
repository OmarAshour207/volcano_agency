@push('admin_scripts')
    <script type="text/javascript">
        var url = window.location.href;
        var path = url.split('/')[4];
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('#mainphoto').dropzone({
                url: '{{ route('upload.image') }}',
                paramName:'image',
                autoDiscover: false,
                uploadMultiple: false,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                dictDefaultMessage: '{{ __('admin.upload_photo') }}',
                dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
                params: {
                    _token: '{{ csrf_token() }}',
                    path: path,
                    width: 180,
                    height: 85
                },
                addRemoveLinks: true,
                removedfile:function (file) {
                    var imageName = $('.image_name').val();
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '{{ route('remove.image') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image: imageName,
                            path: path
                        }
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init: function () {
                        this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    })
                }
            });
        });
    </script>
    <style type="text/css">

        .dropzone {
            width: 200px;
            height: 90px;
            min-height: 0px !important;
            background-color: #1C2260;
            border: #1C2260;
        }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.flights') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('flights.store') }}" enctype="multipart/form-data">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="ar_start"> {{ trans('admin.flights') }} / {{ trans('admin.ar_start') }}</label>
                        <input id="ar_start" name="ar_start" type="text" class="form-control" placeholder="{{ __('admin.ar_start') }}" value="{{ old('ar_start') }}">
                    </div>
                    <div class="form-group">
                        <label for="en_start"> {{ trans('admin.flights') }} / {{ trans('admin.en_start') }}</label>
                        <input id="en_start" name="en_start" type="text" class="form-control" placeholder="{{ __('admin.en_start') }}" value="{{ old('en_start') }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_destination"> {{ trans('admin.flights') }} / {{ trans('admin.ar_destination') }}</label>
                        <input id="ar_destination" name="ar_destination" type="text" class="form-control" placeholder="{{ __('admin.ar_destination') }}" value="{{ old('ar_destination') }}">
                    </div>
                    <div class="form-group">
                        <label for="en_destination"> {{ trans('admin.flights') }} / {{ trans('admin.en_destination') }}</label>
                        <input id="en_destination" name="en_destination" type="text" class="form-control" placeholder="{{ __('admin.en_destination') }}" value="{{ old('en_destination') }}">
                    </div>

                    <div class="form-group">
                        <label for="price"> {{ trans('admin.flights') }} / {{ trans('admin.price') }}</label>
                        <input id="price" name="price" type="text" class="form-control" placeholder="{{ __('admin.price') }}" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label> {{ trans('admin.flights') }} / {{ trans('admin.status') }}</label>
                        <select class="form-control select2" name="status">
                            <option value=""> {{ __('admin.choose_ways_number') }} </option>
                            <option value="0"> {{ __('admin.one_way') }} </option>
                            <option value="1"> {{ __('admin.two_way') }} </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="take_off"> {{ trans('admin.flights') }} / {{ trans('admin.take_off') }}</label>
                        <input id="take_off" name="take_off" type="date" class="form-control" placeholder="{{ __('admin.take_off') }}" value="{{ old('take_off') }}">
                    </div>
                    <div class="form-group">
                        <label for="take_off_time"> {{ trans('admin.flights') }} / {{ trans('admin.take_off_time') }}</label>
                        <input id="take_off_time" name="take_off_time" type="time" class="form-control" placeholder="{{ __('admin.take_off_time') }}" value="{{ old('take_off_time') }}">
                    </div>

                    <div class="form-group">
                        <label for="landing"> {{ trans('admin.flights') }} / {{ trans('admin.landing') }}</label>
                        <input id="landing" name="landing" type="date" class="form-control" placeholder="{{ __('admin.landing') }}" value="{{ old('landing') }}">
                    </div>
                    <div class="form-group">
                        <label for="landing_time"> {{ trans('admin.flights') }} / {{ trans('admin.landing_time') }}</label>
                        <input id="landing_time" name="landing_time" type="time" class="form-control" placeholder="{{ __('admin.landing_time') }}" value="{{ old('landing_time') }}">
                    </div>

                    <div class="form-group">
                        <label for="adults"> {{ trans('admin.flights') }} / {{ trans('admin.adults') }}</label>
                        <input id="adults" name="adults" type="number" class="form-control" placeholder="{{ __('admin.adults') }}" value="{{ old('adults') }}">
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
