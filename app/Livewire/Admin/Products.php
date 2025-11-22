<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Products extends Component
{
    use WithFileUploads;
    public $isUpdateProductMode = false;
    public $is_best_seller = false;
    public $product_id,
        $product_name,
        $product_size,
        $product_price,
        $product_category_id,
        $product_category_name,
        $product_description,
        $image,
        $old_image;

    protected $listeners = [
        'deleteProductAction' => 'deleteProductAction',
        'updateProductOrdering' => 'updateProductOrdering',
    ];

    public function addProduct()
    {
        // dd('add product');
        $this->product_id = null;
        $this->product_name = null;
        $this->product_size = null;
        $this->product_price = null;
        $this->product_category_id = null;
        $this->product_category_name = null;
        $this->product_description = null;
        $this->image = null;
        $this->old_image = null;
        $this->isUpdateProductMode = false;
        $this->resetErrorBag();
        $this->showProductModalForm();
    }

    public function createProduct()
    {
        $this->validate([
            'product_name' => 'required|unique:products,name',
            'product_size' => 'required',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required|exists:categories,id',
            'product_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'product_name.required' => 'Product Name is required',
            'product_name.unique' => 'Product Name already exists',
            'product_size.required' => 'Product Size is required',
            'product_price.required' => 'Product Price is required',
            'product_price.numeric' => 'Product Price must be a number',
            'product_category_id.required' => 'Product Category is required',
            'product_category_id.exists' => 'Product Category does not exist',
            'product_description.required' => 'Product Description is required',
            'image.required' => 'Product Image is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg',
            'image.max' => 'The image size must not exceed 2MB',
        ]);

        $product = new Product();
        $product->name = $this->product_name;
        $product->size = $this->product_size;
        $product->price = $this->product_price;
        $product->is_best_seller = $this->is_best_seller;
        $product->category_id = $this->product_category_id;
        $product->description = $this->product_description;

        if ($this->image) {
            $path = public_path('images/products/');
            $file = $this->image;
            $filename = 'IMG_' . uniqid() . '.' . $file->getClientOriginalExtension();

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true, true);
            }

            $tempPath = $file->getRealPath();
            File::copy($tempPath, $path . $filename);

            $product->image = $filename;
        }
        $saved = $product->save();

        if ($saved) {
            $this->hideProductModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Product created successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create product.']);
        }
    }

    public function editProduct($id)
    {
        $product = Product::with('category')->find($id);
        if ($product) {
            $this->product_id = $product->id;
            $this->product_name = $product->name;
            $this->product_size = $product->size;
            $this->product_price = $product->price;
            $this->product_category_id = $product->category_id;
            $this->product_category_name = $product->category->name;
            $this->product_description = $product->description;
            $this->is_best_seller = $product->is_best_seller;
            $this->old_image = $product->image; // <-- PERBAIKAN: Simpan nama file lama
            $this->image = null; // <-- PERBAIKAN: Pastikan input file baru kosong
            $this->isUpdateProductMode = true;
            $this->resetErrorBag(); // <-- Panggil resetErrorBag di sini
            $this->showProductModalForm();
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Product not found.']);
        }
    }

    public function updateProduct()
    {
        $product = Product::findOrFail($this->product_id);
        $path = public_path('images/products/');
        $filename = $product->image; // Default ke nama file lama
        $this->validate([
            'product_name' => 'required|unique:products,name,' . $this->product_id,
            'product_size' => 'required',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required|exists:categories,id',
            'product_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'product_name.required' => 'Product Name is required',
            'product_name.unique' => 'Product Name already exists',
            'product_size.required' => 'Product Size is required',
            'product_price.required' => 'Product Price is required',
            'product_price.numeric' => 'Product Price must be a number',
            'product_category_id.required' => 'Product Category is required',
            'product_category_id.exists' => 'Product Category does not exist',
            'product_description.required' => 'Product Description is required',
            'image.required' => 'Product Image is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg',
            'image.max' => 'The image size must not exceed 2MB',
        ]);

        if ($this->image) {
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true, true);
            }

            $file = $this->image;
            $new_filename = 'IMG_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $tempPath = $file->getRealPath();
            File::copy($tempPath, $path . $new_filename);

            // if ($product->image && File::exists($path . $product->image)) {
            //     File::delete($path . $product->image);
            // }

            $filename = $new_filename; // Update nama file untuk disimpan di DB
        }

        $product->name = $this->product_name;
        $product->size = $this->product_size;
        $product->price = $this->product_price;
        $product->category_id = $this->product_category_id;
        $product->description = $this->product_description;
        $product->image = $filename; // <-- Simpan nama file (lama atau baru)
        $product->slug = null;
        $updated = $product->save();
        $product->is_best_seller = $this->is_best_seller;


        if ($updated) {
            $this->hideProductModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Product updated successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to update product.']);
        }
    }

    public function deleteProduct($id)
    {
        $this->dispatch('deleteProduct', ['id' => $id]);
    }

    public function deleteProductAction($id)
    {
        $product = Product::findOrFail($id);
        $delete = $product->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Product deleted successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete product.']);
        }
    }

    public function showProductModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showProductModalForm');
    }

    public function toggleBestSeller($productId, $status)
{
    $product = Product::find($productId);

    if ($product) {
        $product->is_best_seller = $status;
        $product->save();

        $this->dispatch('showToastr', [
            'type' => 'success',
            'message' => 'Best seller updated.'
        ]);
    }
}


    public function hideProductModalForm()
    {
        $this->dispatch('hideProductModalForm');
        $this->isUpdateProductMode = false;
        $this->product_id = $this->product_name = null;
    }



    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::orderBy('ordering', 'asc')->get(),
            'categories' => Category::orderBy('ordering', 'asc')->get(),
        ]);
    }
}
