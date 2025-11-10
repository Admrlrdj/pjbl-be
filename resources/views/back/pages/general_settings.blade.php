{{-- general_settings.blade.php --}}
@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Settings</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-4">
        @livewire('admin.settings')
    </div>
@endsection
@push('scripts')
    <script>
        $('#updateLogoForm').submit(function(e) {
            e.preventDefault();
            var form = this;
            var inputVal = $(form).find('input[type="file"]').val();

            if (inputVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 1) {
                            $(form)[0].reset();
                            toastr.success(data.message);
                            $('img.site_logo').each(function() {
                                $(this).attr('src', '/' + data.image_path);
                            });
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error("Upload failed! " + xhr.responseText);
                    }
                });
            } else {
                toastr.error('Please select a logo file to upload.');
            }
        });
        $('#updateFaviconForm').submit(function(e) {
            e.preventDefault();
            var form = this;
            var inputVal = $(form).find('input[type="file"]').val();

            if (inputVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 1) {
                            $(form)[0].reset();
                            var linkElement = document.querySelector("link[rel='icon']");
                            linkElement.href = '/' + data.image_path;
                            toastr.success(data.message);
                            $('img.site_favicon').each(function() {
                                $(this).attr('src', '/' + data.image_path);
                            });
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error("Upload failed! " + xhr.responseText);
                    }
                });
            } else {
                toastr.error('Please select a favicon file to upload.');
            }
        });
    </script>
@endpush
