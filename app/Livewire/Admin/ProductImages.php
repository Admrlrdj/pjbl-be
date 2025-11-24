<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductImages extends Component
{
    use WithFileUploads;

    public $product_id;
    public $product;
    public $images = [];
    public $image_to_delete;

    protected $listeners = [
        'deleteImageAction' => 'deleteImageAction',
        'updateImageOrdering' => 'updateImageOrdering',
    ];

     public function index($productId)
    {
        // Check if product exists
        $product = Product::findOrFail($productId);
        
        return view('back.pages.product-images', [
            'pageTitle' => 'Product Images - ' . $product->name,
            'productId' => $productId,
        ]);
    }

    public function mount($productId)
    {
        $this->product_id = $productId;
        $this->product = Product::with('images')->findOrFail($productId);
    }

    public function uploadImages()
    {
        $this->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        foreach ($this->images as $image) {

            // Generate name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Store file
            $image->storeAs('products', $imageName, 'public');

            // Ordering
            $lastOrdering = ProductImage::where('product_id', $this->product_id)
                    ->max('ordering') ?? 0;

            // Check if this should be primary
            $isPrimary = ProductImage::where('product_id', $this->product_id)->count() == 0;

            ProductImage::create([
                'product_id' => $this->product_id,
                'image' => $imageName,
                'is_primary' => $isPrimary,
                'ordering' => $lastOrdering + 1,
            ]);
        }

        // Reset & refresh
        $this->images = [];
        $this->product->refresh();

        $this->dispatch('showToastr', [
            'type' => 'success',
            'message' => 'Images uploaded successfully.'
        ]);
    }

    public function setPrimaryImage($imageId)
    {
        ProductImage::where('product_id', $this->product_id)
            ->update(['is_primary' => false]);

        ProductImage::where('id', $imageId)
            ->update(['is_primary' => true]);

        $this->product->refresh();

        $this->dispatch('showToastr', [
            'type' => 'success',
            'message' => 'Primary image updated successfully.'
        ]);
    }

    public function deleteImage($imageId)
    {
        $this->image_to_delete = $imageId;
        $this->dispatch('deleteImage', ['id' => $imageId]);
    }

    public function deleteImageAction($id)
    {
        $image = ProductImage::findOrFail($id);

        // If deleting primary → assign next image
        if ($image->is_primary) {
            $nextImage = ProductImage::where('product_id', $this->product_id)
                ->where('id', '!=', $id)
                ->orderBy('ordering', 'asc')
                ->first();

            if ($nextImage) {
                $nextImage->is_primary = true;
                $nextImage->save();
            }
        }

        $image->delete();

        $this->product->refresh();

        $this->dispatch('showToastr', [
            'type' => 'success',
            'message' => 'Image deleted successfully.'
        ]);
    }

    public function updateImageOrdering($positions)
    {
        foreach ($positions as $position) {
            $imageId = $position[0];
            $newPosition = $position[1];

            ProductImage::where('id', $imageId)
                ->update(['ordering' => $newPosition]);
        }

        $this->product->refresh();

        $this->dispatch('showToastr', [
            'type' => 'success',
            'message' => 'Image ordering updated successfully.'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product-images');
    }
}