<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Product Images - {{ $product->name }}
                    </h5>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
                <div class="card-body">
                    <!-- Upload Section -->
                    <div class="mb-4">
                        <h6 class="mb-3">Upload New Images</h6>
                        <div class="row">
                            <div class="col-md-8">
                                <input type="file" wire:model="images" class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
                                @error('images.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">You can select multiple images at once. Max 2MB per image (jpg, jpeg, png)</small>
                                
                                <div wire:loading wire:target="images" class="mt-2">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <span class="text-primary ms-2">Preparing images...</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="uploadImages" class="btn btn-primary w-100" 
                                        wire:loading.attr="disabled" 
                                        wire:target="uploadImages">
                                    <span wire:loading.remove wire:target="uploadImages">
                                        <i class="fas fa-upload"></i> Upload Images
                                    </span>
                                    <span wire:loading wire:target="uploadImages">
                                        <span class="spinner-border spinner-border-sm" role="status"></span>
                                        Uploading...
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Preview Selected Images -->
                        @if($images)
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6 class="mb-2">Preview Selected Images:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($images as $image)
                                            <div class="position-relative">
                                                <img src="{{ $image->temporaryUrl() }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <hr>

                    <!-- Existing Images -->
                    <div class="mt-4">
                        <h6 class="mb-3">
                            Existing Images 
                            <span class="badge bg-primary">{{ $product->images->count() }}</span>
                        </h6>

                        @if($product->images->count() > 0)
                            <div class="alert alert-info mb-3">
                                <i class="fas fa-info-circle"></i> 
                                <strong>Tips:</strong> 
                                Drag and drop images to reorder them. 
                                Click on star icon to set as primary image.
                            </div>

                            <div id="sortable-images" class="row">
                                @foreach($product->images as $image)
                                    <div class="col-md-3 col-sm-4 col-6 mb-3" data-id="{{ $image->id }}">
                                        <div class="card h-100 {{ $image->is_primary ? 'border-primary' : '' }}">
                                            <div class="position-relative">
                                                <img src="{{ $image->image_url }}" 
                                                     class="card-img-top" 
                                                     style="height: 200px; object-fit: cover; cursor: move;">
                                                
                                                <!-- Primary Badge -->
                                                @if($image->is_primary)
                                                    <span class="position-absolute top-0 start-0 m-2">
                                                        <span class="badge bg-primary">
                                                            <i class="fas fa-star"></i> Primary
                                                        </span>
                                                    </span>
                                                @endif

                                                <!-- Ordering Badge -->
                                                <span class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-dark">
                                                        #{{ $image->ordering }}
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="card-body p-2">
                                                <div class="d-flex justify-content-between gap-1">
                                                    <!-- Set Primary Button -->
                                                    @if(!$image->is_primary)
                                                        <button wire:click="setPrimaryImage({{ $image->id }})" 
                                                                class="btn btn-sm btn-outline-warning flex-fill"
                                                                title="Set as Primary">
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-sm btn-warning flex-fill" disabled>
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    @endif

                                                    <!-- Delete Button -->
                                                    <button wire:click="deleteImage({{ $image->id }})" 
                                                            class="btn btn-sm btn-outline-danger flex-fill"
                                                            title="Delete Image">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                <small class="text-muted d-block mt-1 text-center">
                                                    {{ $image->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-warning text-center">
                                <i class="fas fa-images fa-3x mb-3"></i>
                                <h5>No images uploaded yet</h5>
                                <p class="mb-0">Upload images using the form above.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        

@push('styles')
<style>
    #sortable-images .card {
        transition: all 0.3s ease;
    }
    
    #sortable-images .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .ui-sortable-helper {
        transform: rotate(5deg);
        opacity: 0.8;
    }

    #sortable-images .card.border-primary {
        border-width: 3px !important;
    }
</style>
@endpush

@push('scripts')
<script>
  $(document).ready(function () {
    $("#sortable-images").sortable({
        items: '.col-md-3',
        cursor: 'move',
        opacity: 0.8,

        update: function (event, ui) {
            let positions = [];
            $("#sortable-images > div").each(function (index) {
                positions.push([$(this).data('id'), index + 1]);
            });

            Livewire.emit('updateImageOrdering', positions);
        }
    });
});

    // Delete Image Confirmation
    window.addEventListener('deleteImage', function(event) {
        var id = event.detail[0].id;
        Swal.fire({
            title: 'Are you sure?',
            html: "You are about to delete this image!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#D33',
            confirmButtonColor: '#3085D6',
            width: 320,
            allowOutsideClick: false,
            customClass: {
                popup: 'fs-6'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteImageAction', {
                    id: id
                });
            }
        });
    });
</script>
@endpush