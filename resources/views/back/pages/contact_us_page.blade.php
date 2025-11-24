@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Kontak</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kontak
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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
