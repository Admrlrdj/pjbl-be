@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    @livewire('admin.locations')
@endsection
@push('scripts')
    <script>
        window.addEventListener('showLocationModalForm', function() {
            $('#location_modal').modal('show');
        });

        window.addEventListener('hideLocationModalForm', function() {
            $('#location_modal').modal('hide');
        });

        window.addEventListener('deleteLocation', function(event) {
            var id = event.detail[0].id;
            Swal.fire({
                title: 'Are you sure?',
                html: "You are about to delete this location!",
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonColor: '#D33',
                confirmButtonColor: '#3085D6',
                width: 320,
                allowOutsideClick: false,
                customClass: {
                    popup: 'fs-6' // untuk font-size 1rem
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteLocationAction', {
                        id: id
                    });
                }
            })
        });
    </script>
@endpush
