@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    @livewire('admin.contacts')
@endsection
@push('scripts')
    <script>
        window.addEventListener('deleteContact', function(event) {
            var id = event.detail[0].id;
            Swal.fire({
                title: 'Are you sure?',
                html: "You are about to delete this contact!",
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
                    // console.log('Deleting contact with id:', id);
                    Livewire.dispatch('deleteContactAction', {
                        id: id
                    });
                }
            })
        });
    </script>
@endpush
