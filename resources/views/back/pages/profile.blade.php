@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @livewire('admin.profile')

@endsection
@push('scripts')
    <script>
        new Kropify('input[type="file"][id="profilePictureFile"]', {
            preview: 'image#profilePicturePreview',
            viewMode: 1,
            aspectRatio: 1,
            cancelButtonText: 'Cancel',
            resetButtonText: 'Reset',
            cropButtonText: 'Crop & Upload',
            processURL: '{{ route('admin.update_profile_picture') }}',
            maxSize: 2097152,
            showLoader: true,
            // animationClass: 'pulse',
            maxWoH: 255,
            // method: 'POST',
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            onError: function(message) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-full-width",
                    "timeOut": "3000"
                };
                toastr.error(message);
            },
            onDone: function(data) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-full-width",
                    "timeOut": "3000"
                };

                if (data.status == 1) {
                    toastr.success(data.message);
                    // Livewire.dispatch('updateTopUserInfo', []);
                    // Livewire.dispatch('updateProfile', []);
                } else {
                    toastr.error(data.message);
                }
            }
        });
    </script>
@endpush
