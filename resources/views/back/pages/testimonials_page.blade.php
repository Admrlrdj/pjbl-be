@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Testimoni</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Testimoni
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @livewire('admin.testimonials')
@endsection
@push('scripts')
    <script>
        window.addEventListener('showTestimonialModalForm', function() {
            $('#testimonial_modal').modal('show');
        });

        window.addEventListener('hideTestimonialModalForm', function() {
            $('#testimonial_modal').modal('hide');
        });

        window.addEventListener('deleteTestimonial', function(event) {
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
                    Livewire.dispatch('deleteTestimonialAction', {
                        id: id
                    });
                }
            })
        });
    </script>
@endpush
