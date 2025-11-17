@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    @livewire('admin.products')
@endsection
@push('scripts')
    <script>
        window.addEventListener('showProductModalForm', function() {
            $('#product_modal').modal('show');
        });

        window.addEventListener('hideProductModalForm', function() {
            $('#product_modal').modal('hide');
        });

        window.addEventListener('deleteProduct', function(event) {
            var id = event.detail[0].id;
            Swal.fire({
                title: 'Are you sure?',
                html: "You are about to delete this product!",
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
                    Livewire.dispatch('deleteProductAction', {
                        id: id
                    });
                }
            })
        });
    </script>
@endpush
