<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Products extends Component
{
    public $isUpdateProductMode = false;
    public $product_id,
        $product_name,
        $product_size,
        $product_price,
        $product_category_id,
        $product_category_name,
        $product_description,
        $category_id,
        $category_name,
        $product_image,
        $product_image_existing;

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
        $this->isUpdateProductMode = false;
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
            'product_image' => 'required|image|mimes:jpg,jpeg,png',
        ], [
            'product_name.required' => 'Product Name is required',
            'product_name.unique' => 'Product Name already exists',
            'product_size.required' => 'Product Size is required',
            'product_price.required' => 'Product Price is required',
            'product_price.numeric' => 'Product Price must be a number',
            'product_category_id.required' => 'Product Category is required',
            'product_category_id.exists' => 'Product Category does not exist',
            'product_description.required' => 'Product Description is required',
        ]);

        $product = new Product();
        $product->name = $this->product_name;
        $product->size = $this->product_size;
        $product->price = $this->product_price;
        $product->category_id = $this->product_category_id;
        $product->description = $this->product_description;
        $saved = $product->save();

        if ($saved) {
            $this->hideProductModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Product created successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create product.']);
        }
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $this->product_id = $id;
        $this->product_name = Product::find($id)->name;
        $this->product_size = Product::find($id)->size;
        $this->product_price = Product::find($id)->price;
        $this->product_category_id = Product::find($id)->category_id;
        $this->product_category_name = Product::find($id)->category->name;
        $this->product_description = Product::find($id)->description;
        $this->isUpdateProductMode = true;
        $this->showProductModalForm();
    }

    public function updateProduct()
    {
        $product = Product::findOrFail($this->product_id);

        $this->validate([
            'product_name' => 'required|unique:products,name,' . $this->product_id,
            'product_size' => 'required',
            'product_price' => 'required|numeric',
            'product_category_id' => 'required|exists:categories,id',
            'product_description' => 'required',
        ], [
            'product_name.required' => 'Product Name is required',
            'product_name.unique' => 'Product Name already exists',
            'product_size.required' => 'Product Size is required',
            'product_price.required' => 'Product Price is required',
            'product_price.numeric' => 'Product Price must be a number',
            'product_category_id.required' => 'Product Category is required',
            'product_category_id.exists' => 'Product Category does not exist',
            'product_description.required' => 'Product Description is required',
        ]);

        $product->name = $this->product_name;
        $product->size = $this->product_size;
        $product->price = $this->product_price;
        $product->category_id = $this->product_category_id;
        $product->description = $this->product_description;
        $product->slug = null;
        $updated = $product->save();

        if ($updated) {
            $this->hideProductModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Product updated successfully.']);
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
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete product.']);
        }
    }

    public function showProductModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showProductModalForm');
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
