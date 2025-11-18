<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Testimonial;

class Consoles extends Component
{
    protected $listeners = [
        'updateDashboard' => '$refresh'
    ];

    public function render()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();

        $totalTestimonials = 0;
        $averageRatings = 0;

        if (class_exists(Testimonial::class)) {
            $totalTestimonials = Testimonial::count();
            $avg = Testimonial::avg('rating');
            $averageRatings = number_format((float)$avg, 1);
        }

        return view('livewire.admin.consoles', [
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'totalTestimonials' => $totalTestimonials,
            'averageRatings' => $averageRatings,
        ]);
    }
}
