@extends('frontend.layout.app')

@section('title','Home - Somite')

@section('content')
<main>

    <!-- hero slider section -->
    <section>
        <div x-data="{
                activeSlide: 0,
                slides: [
                    {
                        image: 'https://wowslider.com/sliders/demo-9/data/images/1293441583_nature_forest_morning_in_the_forest_015232_.jpg',
                        title: 'Beautiful Nature'
                    },
                    {
                        image: 'https://www.jssor.com/demos/img/gallery/980x380/013.jpg',
                        title: 'City Lights'
                    },
                    {
                        image: 'https://wowslider.com/sliders/demo-37/data1/images/waterfall.jpg',
                        title: 'Snowy Peaks'
                    }
                ],
                next() {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                },
                prev() {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                }
            }" class="relative h-96 overflow-hidden">

            <!-- Slides -->
            <template x-for="(slide, index) in slides" :key="index">
                <div
                    x-show="activeSlide === index"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 w-full h-full"
                >
                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                        <h2 x-text="slide.title" class="text-white text-4xl font-bold"></h2>
                    </div>
                </div>
            </template>

            <!-- Navigation Buttons -->
            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/50 p-2 rounded-full hover:bg-white/75">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/50 p-2 rounded-full hover:bg-white/75">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Pagination -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        @click="activeSlide = index"
                        :class="{'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index}"
                        class="w-3 h-3 rounded-full transition-colors duration-300"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Compact News Marquee -->
    <section class="bg-gray-800 py-3">
        <div class="overflow-hidden whitespace-nowrap">
            <div class="inline-block animate-marquee whitespace-nowrap">
                <span class="text-white mx-4">🚀 New Product Launch: Discover our latest innovation!</span>
                <span class="text-white mx-4">🏆 Won Best Innovation Award 2023</span>
                <span class="text-white mx-4">🎉 1 Million Happy Customers and Counting!</span>
                <span class="text-white mx-4">🌟 Special Offer: Get 20% off on all products</span>
            </div>
        </div>
    </section>

    <!-- Association member section -->
    <section class="relative py-20 overflow-hidden bg-gradient-to-br from-blue-50 to-purple-50">
        <!-- Background Animation -->
        <div class="absolute inset-0">
            <div class="absolute w-64 h-64 bg-purple-200 rounded-full opacity-20 animate-move-circle-1"></div>
            <div class="absolute w-48 h-48 bg-blue-200 rounded-full opacity-20 animate-move-circle-2"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Association Members</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Member Card -->
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div>
                <!-- Repeat for other members -->
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div>
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div>
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
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
                        <p class="text-gray-600 font-medium">Software Engineer</p>
                        <p class="text-sm text-gray-500">IT Department</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Batch section -->
    <section class="relative py-20 overflow-hidden bg-gradient-to-br from-indigo-50 to-pink-50">
        <!-- Rotating Star Background -->
        <div class="absolute inset-0">
            <div class="absolute w-20 h-20 bg-pink-300 opacity-30 animate-rotate-star-1" style="top: 10%; left: 10%;"></div>
            <div class="absolute w-16 h-16 bg-indigo-300 opacity-30 animate-rotate-star-2" style="top: 20%; right: 15%;"></div>
            <div class="absolute w-18 h-18 bg-pink-300 opacity-30 animate-rotate-star-3" style="bottom: 15%; left: 20%;"></div>
            <div class="absolute w-14 h-14 bg-indigo-300 opacity-30 animate-rotate-star-4" style="bottom: 10%; right: 10%;"></div>
            <div class="absolute w-12 h-12 bg-pink-300 opacity-30 animate-rotate-star-5" style="top: 30%; left: 25%;"></div>
            <div class="absolute w-10 h-10 bg-indigo-300 opacity-30 animate-rotate-star-6" style="bottom: 25%; right: 30%;"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Batches</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Batch Numbers -->
                @for ($year = 2007; $year <= date('Y'); $year++)
                    <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group">
                        <!-- Batch Content -->
                        <div class="relative p-6 text-center bg-white/80 backdrop-blur-sm">
                            <div class="text-3xl font-bold text-indigo-600 mb-2 transform transition-transform duration-300 group-hover:scale-110">
                                {{ $year }}
                            </div>
                            <div class="text-sm text-gray-500">Batch</div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Occupation Wise Member Section -->
    <section class="relative py-20 overflow-hidden bg-gradient-to-br from-blue-50 to-purple-50">
        <!-- Background Animation -->
        <div class="absolute inset-0">
            <div class="absolute w-64 h-64 bg-purple-200 rounded-full opacity-20 animate-move-circle-1"></div>
            <div class="absolute w-48 h-48 bg-blue-200 rounded-full opacity-20 animate-move-circle-2"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Occupation Wise Members</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Private -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-blue-600 mb-4">Private</h3>
                        <p class="text-gray-600">Members working in private sectors</p>
                        <div class="mt-6 text-4xl font-bold text-gray-800">1,234</div>
                    </div>
                </div>
                <!-- Govt. -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-green-600 mb-4">Govt.</h3>
                        <p class="text-gray-600">Members working in government sectors</p>
                        <div class="mt-6 text-4xl font-bold text-gray-800">567</div>
                    </div>
                </div>
                <!-- Business -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-orange-600 mb-4">Business</h3>
                        <p class="text-gray-600">Members involved in business</p>
                        <div class="mt-6 text-4xl font-bold text-gray-800">890</div>
                    </div>
                </div>
                <!-- None -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-purple-600 mb-4">None</h3>
                        <p class="text-gray-600">Members without specific occupation</p>
                        <div class="mt-6 text-4xl font-bold text-gray-800">321</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>


@endsection

@push('css')
    <style>
        .animate-marquee {
            display: inline-block;
            padding-left: 100%; /* Start off-screen */
            animation: marquee 15s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        /* Background Animation */
        @keyframes moveCircle1 {
            0% { transform: translate(-10%, -10%); }
            50% { transform: translate(10%, 10%); }
            100% { transform: translate(-10%, -10%); }
        }
        @keyframes moveCircle2 {
            0% { transform: translate(10%, -10%); }
            50% { transform: translate(-10%, 10%); }
            100% { transform: translate(10%, -10%); }
        }
        .animate-move-circle-1 {
            animation: moveCircle1 15s infinite linear;
        }
        .animate-move-circle-2 {
            animation: moveCircle2 20s infinite linear;
        }

        /* Rotating Star Animation */
        @keyframes rotateStar1 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }
        @keyframes rotateStar2 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(-180deg) scale(0.8); }
            100% { transform: rotate(-360deg) scale(1); }
        }
        @keyframes rotateStar3 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.1); }
            100% { transform: rotate(360deg) scale(1); }
        }
        @keyframes rotateStar4 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(-180deg) scale(0.9); }
            100% { transform: rotate(-360deg) scale(1); }
        }
        @keyframes rotateStar5 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.05); }
            100% { transform: rotate(360deg) scale(1); }
        }
        @keyframes rotateStar6 {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(-180deg) scale(0.95); }
            100% { transform: rotate(-360deg) scale(1); }
        }
        .animate-rotate-star-1, .animate-rotate-star-2, .animate-rotate-star-3,
        .animate-rotate-star-4, .animate-rotate-star-5, .animate-rotate-star-6 {
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
        .animate-rotate-star-1 { animation: rotateStar1 12s infinite linear; }
        .animate-rotate-star-2 { animation: rotateStar2 15s infinite linear; }
        .animate-rotate-star-3 { animation: rotateStar3 10s infinite linear; }
        .animate-rotate-star-4 { animation: rotateStar4 14s infinite linear; }
        .animate-rotate-star-5 { animation: rotateStar5 8s infinite linear; }
        .animate-rotate-star-6 { animation: rotateStar6 16s infinite linear; }
    </style>
@endpush
