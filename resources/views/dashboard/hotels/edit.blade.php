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
                    height: 240
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

                    @if(!empty($hotel->image))
                    @php $name = session('lang') . '_name'; @endphp
                    var mock = { name: '{{ $hotel->$name }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $hotel->hotel_image }}');
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
                    <h1 class="m-0"> {{ trans('admin.hotels') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="ar_name"> {{ trans('admin.hotel') }} / {{ trans('admin.ar_name') }}</label>
                        <input id="ar_name" name="ar_name" type="text" class="form-control" placeholder="{{ __('admin.ar_name') }}" value="{{ $hotel->ar_name }}">
                    </div>
                    <div class="form-group">
                        <label for="en_name"> {{ trans('admin.hotel') }} / {{ trans('admin.en_name') }}</label>
                        <input id="en_name" name="en_name" type="text" class="form-control" placeholder="{{ __('admin.en_name') }}" value="{{ $hotel->en_name }}">
                    </div>

                    <div class="form-group">
                        <label for="address"> {{ trans('admin.hotel') }} / {{ trans('admin.address') }}</label>
                        <input id="address" name="address" type="text" class="form-control" placeholder="{{ __('admin.address') }}" value="{{ $hotel->address }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_description"> {{ trans('admin.hotel') }} / {{ trans('admin.ar_description') }}</label>
                        <textarea id="ar_description" name="ar_description" rows="4" class="form-control" placeholder="{{ trans('admin.hotel') }} / {{ trans('admin.ar_description') }}...">{{ $hotel->ar_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="en_description"> {{ trans('admin.hotel') }} / {{ trans('admin.en_description') }}</label>
                        <textarea id="en_description" name="en_description" rows="4" class="form-control" placeholder="{{ trans('admin.hotel') }} / {{ trans('admin.en_description') }}...">{{ $hotel->en_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="en_meta_tag"> {{ trans('admin.hotels') }} / {{ trans('admin.en_meta_tag') }}</label>
                        <select class="form-control select2" name="stars_number">
                            <option value=""> {{ __('admin.choose_stars') }} </option>
                            @for($i = 1;$i < 6; $i++)
                                <option value="{{ $i }}" {{ $i == $hotel->stars_number ? 'selected' : '' }}> {{ $i }} {{ __('admin.star') }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="{{ $hotel->image }}">
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
