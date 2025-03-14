@extends('frontend.layout.app')

@section('title','Association Members - Somite')

@section('content')
<main>
    <!-- Members Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-800 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Our Association Members</h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">Meet the dedicated individuals who make our association strong and vibrant.</p>
            </div>
        </div>
    </section>

    <!-- Members Filter Section -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        <option value="executive">Executive Committee</option>
                        <option value="founding">Founding Members</option>
                        <option value="honorary">Honorary Members</option>
                    </select>

                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sort By</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="newest">Newest Members</option>
                        <option value="oldest">Oldest Members</option>
                    </select>
                </div>

                <div class="relative">
                    <input type="text" placeholder="Search members..." class="pl-10 pr-4 py-2 border rounded-lg w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Members Grid Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Members Card -->
                @foreach ([1,2,3,4,5,6,7,8,9,10] as $item)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            <img
                                src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg"
                                alt="Member Name"
                                class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-110"
                            >
                            <div class="absolute inset-0 bg-black/20"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold mb-1 text-gray-800">John Doe</h3>
                            <p class="text-gray-600 font-medium">Co-moderator</p>
                            <p class="text-sm text-gray-500">IT Department</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section class="py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Want to Join Our Association?</h2>
                <p class="text-lg text-gray-600 mb-8">We're always looking for dedicated individuals to join our community. Learn about the benefits of membership and how to apply.</p>
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-colors">
                    Apply for Membership
                </a>
            </div>
        </div>
    </section>
</main>
@endsection

@push('css')
<style>
    /* Custom styles for member cards */
    .member-card-hover:hover .member-social {
        opacity: 1;
    }
    .member-social {
        transition: all 0.3s ease;
    }
</style>
@endpush
