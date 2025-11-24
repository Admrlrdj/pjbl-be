<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Testimonials extends Component
{
    use WithFileUploads;
    public $isUpdateTestimonialMode = false;
    public $testimonial_id,
        $testimonial_name,
        $testimonial_rating,
        $testimonial_comment,
        $product_id,
        $avatar,
        $olf_avatar,
        $image,
        $old_image;

    protected $listeners = [
        'deleteTestimonialAction' => 'deleteTestimonialAction',
        'updateTestimonialOrdering' => 'updateTestimonialOrdering',
    ];

    public function addTestimonial()
    {
        // dd('add product');
        $this->testimonial_id = null;
        $this->testimonial_name = null;
        $this->testimonial_rating = null;
        $this->testimonial_comment = null;
        $this->image = null;
        $this->old_image = null;
        $this->isUpdateTestimonialMode = false;
        $this->resetErrorBag();
        $this->showTestimonialModalForm();
    }

    public function createTestimonial()
    {
        $this->validate([
            'testimonial_name' => 'required|unique:testimonials,name',
            'testimonial_rating' => 'required|integer|min:1|max:5',
            'testimonial_comment' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'testimonial_name.required' => 'Name is required',
            'testimonials_name.unique' => 'Name already exists',
            'testimonials_rating.required' => 'Testimonial Rating is required',
            'testimonials_rating.integer' => 'Testimonial Rating must be an integer',
            'testimonials_rating.min' => 'Testimonial Rating must be at least 1',
            'testimonials_rating.max' => 'Testimonial Rating must not exceed 5',
            'testimonials_comment.required' => 'Testimonial Comment is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg',
            'image.max' => 'The image size must not exceed 2MB',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $this->testimonial_name;
        $testimonial->rating = $this->testimonial_rating;
        $testimonial->comment = $this->testimonial_comment;
        

        if ($this->image) {
            $path = public_path('images/testimonials/');
            $file = $this->image;
            $filename = 'IMG_' . uniqid() . '.' . $file->getClientOriginalExtension();

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true, true);
            }

            $tempPath = $file->getRealPath();
            File::copy($tempPath, $path . $filename);

            $testimonial->image = $filename;
        }else {
            $testimonial->image = 'default-avatar.png';
        }
        $saved = $testimonial->save();

        if ($saved) {
            $this->hideTestimonialModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Testimonial created successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create testimonial.']);
        }
    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $this->testimonial_id = $testimonial->id;
            $this->testimonial_name = $testimonial->name;
            $this->testimonial_rating = $testimonial->rating;
            $this->testimonial_comment = $testimonial->comment;
            $this->old_image = $testimonial->image;
            $this->image = null;
            $this->isUpdateTestimonialMode = true;
            $this->resetErrorBag();
            $this->showTestimonialModalForm();
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Testimonial not found.']);
        }
    }
    public function toggleShowOnHome($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->show_on_home = !$testimonial->show_on_home;
    $testimonial->save();

    $this->dispatch('showToastr', [
        'type' => 'success',
        'message' => 'Testimonial visibility updated!'
    ]);
}


    public function updateTestimonial()
    {
        $testimonial = Testimonial::findOrFail($this->testimonial_id);
        $path = public_path('images/testimonials/');
        $filename = $testimonial->image; // Default ke nama file lama

        $this->validate([
            'testimonial_name' => 'required|unique:testimonials,name,' . $this->testimonial_id,
            'testimonial_rating' => 'required|integer|min:1|max:5',
            'testimonial_comment' => 'required',
           'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'testimonial_name.required' => 'Name is required',
            'testimonials_name.unique' => 'Name already exists',
            'testimonials_rating.required' => 'Testimonial Rating is required',
            'testimonials_rating.integer' => 'Testimonial Rating must be an integer',
            'testimonials_rating.min' => 'Testimonial Rating must be at least 1',
            'testimonials_rating.max' => 'Testimonial Rating must not exceed 5',
            'testimonials_comment.required' => 'Testimonial Comment is required',
            'image.required' => 'Testimonial Image is required',
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

            $filename = $new_filename;
        }

        $testimonial->name = $this->testimonial_name;
        $testimonial->rating = $this->testimonial_rating;
        $testimonial->comment = $this->testimonial_comment;
        $testimonial->image = $filename;
        $updated = $testimonial->save();

        if ($updated) {
            $this->hideTestimonialModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Testimonial updated successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to update testimonial.']);
        }
    }

    public function deleteTestimonial($id)
    {
        $this->dispatch('deleteTestimonial', ['id' => $id]);
    }

    public function deleteTestimonialAction($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $delete = $testimonial->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Testimonial deleted successfully.']);
            $this->dispatch('updateDashboard');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete testimonial.']);
        }
    }

    public function showTestimonialModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showTestimonialModalForm');
    }

    public function hideTestimonialModalForm()
    {
        $this->dispatch('hideTestimonialModalForm');
        $this->isUpdateTestimonialMode = false;
        $this->testimonial_id = $this->testimonial_name = null;
    }

    public function render()
    {
        return view('livewire.admin.testimonials', [
            'testimonials' => Testimonial::orderBy('id', 'asc')->get(),
        ]);
        $testimonials = Testimonial::orderBy('id', 'asc')
        ->take(3)
        ->get();
        return view('home', compact('testimonials'));
    }

    
}
