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
                    width: 360,
                    height: 255
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

                    @if(!empty($trip->image))
                    @php $title = session('lang') . '_title'; @endphp
                    var mock = { name: '{{ $trip->$title }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $trip->trip_image }}');
                    this.emit('complete', mock);
                    $('.dz-progress').remove();
                    @endif

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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.trips') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('trips.update', $trip->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="ar_title"> {{ trans('admin.trips') }} / {{ trans('admin.ar_title') }}</label>
                        <input id="ar_title" name="ar_title" type="text" class="form-control" placeholder="{{ __('admin.ar_title') }}" value="{{ $trip->ar_title }}">
                    </div>
                    <div class="form-group">
                        <label for="en_title"> {{ trans('admin.trips') }} / {{ trans('admin.en_title') }}</label>
                        <input id="en_title" name="en_title" type="text" class="form-control" placeholder="{{ __('admin.en_title') }}" value="{{ $trip->en_title }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_description"> {{ trans('admin.trips') }} / {{ trans('admin.ar_description') }}</label>
                        <textarea id="ar_description" name="ar_description" class="form-control ckeditor">{{ $trip->ar_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="en_description"> {{ trans('admin.trips') }} / {{ trans('admin.en_description') }}</label>
                        <textarea id="en_description" name="en_description" class="form-control ckeditor">{{ $trip->en_description }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="ar_start"> {{ trans('admin.trips') }} / {{ trans('admin.ar_start') }}</label>
                        <input id="ar_start" name="ar_start" type="text" class="form-control" placeholder="{{ __('admin.ar_start') }}" value="{{ $trip->ar_start }}">
                    </div>
                    <div class="form-group">
                        <label for="en_start"> {{ trans('admin.trips') }} / {{ trans('admin.en_start') }}</label>
                        <input id="en_start" name="en_start" type="text" class="form-control" placeholder="{{ __('admin.en_start') }}" value="{{ $trip->en_start }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_destination"> {{ trans('admin.trips') }} / {{ trans('admin.ar_destination') }}</label>
                        <input id="ar_destination" name="ar_destination" type="text" class="form-control" placeholder="{{ __('admin.ar_destination') }}" value="{{ $trip->ar_destination }}">
                    </div>
                    <div class="form-group">
                        <label for="en_destination"> {{ trans('admin.trips') }} / {{ trans('admin.en_destination') }}</label>
                        <input id="en_destination" name="en_destination" type="text" class="form-control" placeholder="{{ __('admin.en_destination') }}" value="{{ $trip->en_destination }}">
                    </div>

                    <div class="form-group">
                        <label for="price"> {{ trans('admin.trips') }} / {{ trans('admin.price') }}</label>
                        <input id="price" name="price" type="text" class="form-control" placeholder="{{ __('admin.price') }}" value="{{ $trip->price }}">
                    </div>

                    <div class="form-group">
                        <label for="start_at"> {{ trans('admin.trips') }} / {{ trans('admin.start_at') }}</label>
                        <input id="start_at" name="start_at" type="date" class="form-control" placeholder="{{ __('admin.start_at') }}" value="{{ $trip->start_at }}">
                    </div>
                    <div class="form-group">
                        <label for="start_at_time"> {{ trans('admin.trips') }} / {{ trans('admin.start_at_time') }}</label>
                        <input id="start_at_time" name="start_at_time" type="time" class="form-control" placeholder="{{ __('admin.start_at_time') }}" value="{{ $trip->start_at_time }}">
                    </div>

                    <div class="form-group">
                        <label for="end_at"> {{ trans('admin.trips') }} / {{ trans('admin.end_at') }}</label>
                        <input id="end_at" name="end_at" type="date" class="form-control" placeholder="{{ __('admin.end_at') }}" value="{{ $trip->end_at }}">
                    </div>
                    <div class="form-group">
                        <label for="end_at_time"> {{ trans('admin.trips') }} / {{ trans('admin.end_at_time') }}</label>
                        <input id="end_at_time" name="end_at_time" type="time" class="form-control" placeholder="{{ __('admin.end_at_time') }}" value="{{ $trip->end_at_time }}">
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="{{ $trip->image }}">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
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
