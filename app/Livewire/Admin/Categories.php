<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $isUpdateCategoryMode = false;
    public $category_id, $category_name;

    protected $listeners = [
        'deleteCategoryAction' => 'deleteCategoryAction',
        'updateCategoryOrdering' => 'updateCategoryOrdering',
    ];

    public function addCategory()
    {
        $this->category_id = null;
        $this->category_name = null;
        $this->isUpdateCategoryMode = false;
        $this->resetErrorBag();
        $this->showCategoryModalForm();
    }

    public function createCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,name',
        ], [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists',
        ]);

        $category = new Category();
        $category->name = $this->category_name;
        $category->slug = Str::slug($this->category_name);

        $saved = $category->save();

        if ($saved) {
            $this->hideCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Category created successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create category.']);
        }
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        // var_dump($category);
        $this->category_id = $category->id;
        $this->category_name = $category->name;
        $this->isUpdateCategoryMode = true;
        $this->resetErrorBag();
        $this->showCategoryModalForm();
    }

    public function updateCategory()
    {
        $category = Category::findOrFail($this->category_id);

        $this->validate([
            'category_name' => 'required|unique:categories,name,' . $this->category_id,
        ], [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists',
        ]);

        $category->name = $this->category_name;

        if ($category->isDirty('name')) {
            $category->slug = Str::slug($this->category_name);
        }

        $updated = $category->save();

        if ($updated) {
            $this->hideCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Category updated successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to update category.']);
        }
    }

    public function updateCategoryOrdering($positions)
    {
        foreach ($positions as $position) {
            $index = $position[0];
            $new_position = $position[1];
            Category::where('id', $index)->update(['ordering' => $new_position]);
        }
        $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Category ordering updated successfully.']);
    }

    public function deleteCategory($id)
    {
        $this->dispatch('deleteCategory', ['id' => $id]);
    }

    public function deleteCategoryAction($id)
    {
        $category = Category::withCount('products')->findOrFail($id);

        if ($category->products_count > 0) {
            $this->dispatch('showToastr', [
                'type' => 'error',
                'message' => 'Cannot delete category because it contains ' . $category->products_count . ' products.'
            ]);
            return;
        }

        $delete = $category->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Category deleted successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete category.']);
        }
    }

    public function showCategoryModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showCategoryModalForm');
    }

    public function hideCategoryModalForm()
    {
        $this->dispatch('hideCategoryModalForm');
        $this->isUpdateCategoryMode = false;
        $this->category_id = $this->category_name = null;
    }

    public function render()
    {
        return view('livewire.admin.categories', [
            'categories' => Category::withCount('products')->orderBy('ordering', 'asc')->get(),
        ]);
    }
}
