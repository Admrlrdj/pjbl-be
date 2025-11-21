@extends('layouts.app')

@section('title', 'Nounoufood - Our Story')

@section('content')
<div class="w-full min-h-screen bg-white flex flex-col justify-center items-center px-4 gap-10 py-16">
    <h1 class="text-3xl font-bold">Contact Us</h1>
    <form 
        action="#"
        method="POST"
        class="w-full max-w-4xl bg-white"
    >
        @csrf

        <!-- Name & Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Name -->
            <div>
                <label class="font-semibold text-gray-700 text-lg">Name</label>
                <input 
                    type="text"
                    placeholder="Full Name"
                    class="w-full h-12 px-4 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-yellow-400"
                />
            </div>

            <!-- Phone -->
            <div>
                <label class="font-semibold text-gray-700 text-lg">Phone Number</label>
                <input 
                    type="text"
                    placeholder="Phone Number"
                    class="w-full h-12 px-4 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-yellow-400"
                />
            </div>
        </div>

        <!-- Email -->
        <div class="mt-8">
            <label class="font-semibold text-gray-700 text-lg">Email</label>
            <input 
                type="email"
                placeholder="Email (xxx@email.com)"
                class="w-full h-12 px-4 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-yellow-400"
            />
        </div>

        <!-- Message -->
        <div class="mt-8">
            <label class="font-semibold text-gray-700 text-lg">Message (Critics and Suggestions)</label>
            <textarea
                rows="6"
                placeholder="Messages containing criticism and suggestions..."
                class="w-full px-4 py-3 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-yellow-400"
            ></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-12">
            <button
                type="submit"
                class="px-16 py-3 text-lg font-semibold text-gray-800 bg-white border border-yellow-400
                       rounded-full shadow-md hover:bg-yellow-400 hover:text-white transition"
            >
                Submit
            </button>
        </div>
    </form>
</div>
@endsection