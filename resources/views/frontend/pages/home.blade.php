@extends('frontend.layout.app')

@section('title','Home - Somite')

@section('content')
<main>

    <!-- hero slider section -->
    <section class="relative">
        <div x-data="{
                activeSlide: 0,
                autoplay: null,
                slides: [
                    {
                        image: '{{asset("asset/images/default/sliders/hd1.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },
                    {
                        image: '{{asset("asset/images/default/sliders/idaho239691_1920.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },

                    {
                        image: '{{asset("asset/images/default/sliders/hd2.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },
                    {
                        image: '{{asset("asset/images/default/sliders/hd3.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },
                    {
                        image: '{{asset("asset/images/default/sliders/hd4.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },
                    {
                        image: 'https://wowslider.com/sliders/demo-9/data/images/1293441583_nature_forest_morning_in_the_forest_015232_.jpg',
                        title: 'Beautiful Nature',
                        subtitle: 'Explore the wonders of our natural world'
                    },
                    {
                        image: 'https://www.jssor.com/demos/img/gallery/980x380/013.jpg',
                        title: 'City Lights',
                        subtitle: 'Experience urban life at its finest'
                    },
                    {
                        image: 'https://wowslider.com/sliders/demo-37/data1/images/waterfall.jpg',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    },
                    {
                        image: '{{asset("asset/images/default/sliders/s1-1222x587.jpg")}}',
                        title: 'Snowy Peaks',
                        subtitle: 'Discover breathtaking mountain landscapes'
                    }
                ],
                next() {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                },
                prev() {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                },
                startAutoplay() {
                    this.autoplay = setInterval(() => this.next(), 5000);
                },
                stopAutoplay() {
                    clearInterval(this.autoplay);
                }
            }"
            x-init="startAutoplay()"
            @mouseenter="stopAutoplay()"
            @mouseleave="startAutoplay()"
            class="relative h-[210px] sm:h-[300px] md:h-[350px] lg:h-[450px] overflow-hidden">

            <!-- Slides with enhanced transitions -->
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
                    <!-- Image without zoom animation that might cause blur -->
                    <img
                        :src="slide.image"
                        :alt="slide.title"
                        class="w-full h-full object-cover"
                        loading="eager"
                    >

                    <!-- Lighter gradient overlay for better image visibility -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent">
                        <!-- Text content with animation -->
                        <div class="absolute bottom-0 left-0 w-full p-8 md:p-16 text-white">
                            <h2
                                x-text="slide.title"
                                x-show="activeSlide === index"
                                x-transition:enter="transition ease-out delay-300 duration-700"
                                x-transition:enter-start="opacity-0 transform translate-y-8"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                class="text-4xl md:text-5xl font-bold mb-2"
                            ></h2>
                            <p
                                x-text="slide.subtitle"
                                x-show="activeSlide === index"
                                x-transition:enter="transition ease-out delay-500 duration-700"
                                x-transition:enter-start="opacity-0 transform translate-y-8"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                class="text-xl text-gray-200 max-w-xl"
                            ></p>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Enhanced Navigation Buttons -->
            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm p-3 rounded-full hover:bg-white/40 transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-white/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm p-3 rounded-full hover:bg-white/40 transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-white/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Enhanced Pagination -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        @click="activeSlide = index"
                        :class="{'w-10 bg-white': activeSlide === index, 'w-3 bg-white/50': activeSlide !== index}"
                        class="h-3 rounded-full transition-all duration-500 hover:bg-white/80 focus:outline-none"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Enhanced News Marquee -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 py-4 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-[5%] w-20 h-20 rounded-full bg-white animate-ping-slow"></div>
            <div class="absolute bottom-0 left-[15%] w-16 h-16 rounded-full bg-white animate-ping-slow-2"></div>
            <div class="absolute top-[20%] right-[10%] w-12 h-12 rounded-full bg-white animate-ping-slow-3"></div>
        </div>

        <!-- News content -->
        <div class="overflow-hidden whitespace-nowrap relative">
            <div class="inline-block animate-marquee whitespace-nowrap">
                <span class="text-white mx-6 text-lg font-medium inline-flex items-center">
                    <span class="bg-white text-indigo-600 p-1 rounded-full mr-3 flex-shrink-0">🚀</span>
                    New Product Launch: Discover our latest innovation!
                </span>
                <span class="text-white mx-6 text-lg font-medium inline-flex items-center">
                    <span class="bg-white text-indigo-600 p-1 rounded-full mr-3 flex-shrink-0">🏆</span>
                    Won Best Innovation Award 2023
                </span>
                <span class="text-white mx-6 text-lg font-medium inline-flex items-center">
                    <span class="bg-white text-indigo-600 p-1 rounded-full mr-3 flex-shrink-0">🎉</span>
                    1 Million Happy Customers and Counting!
                </span>
                <span class="text-white mx-6 text-lg font-medium inline-flex items-center">
                    <span class="bg-white text-indigo-600 p-1 rounded-full mr-3 flex-shrink-0">🌟</span>
                    Special Offer: Get 20% off on all products
                </span>
            </div>
        </div>
    </section>

    <!-- Association member section -->
    <section class="relative py-20 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 -z-10">
            <!-- Gradient base - more vibrant and attractive colors -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100"></div>

            <!-- Animated elements -->
            <div class="absolute w-full h-full overflow-hidden">
                <!-- Floating circles - more vibrant colors -->
                <div class="absolute w-72 h-72 bg-indigo-300 rounded-full opacity-40 animate-float-fast-1" style="top: 10%; left: 5%;"></div>
                <div class="absolute w-56 h-56 bg-cyan-300 rounded-full opacity-40 animate-float-fast-2" style="top: 20%; right: 10%;"></div>
                <div class="absolute w-80 h-80 bg-violet-300 rounded-full opacity-35 animate-float-fast-3" style="bottom: 15%; left: 15%;"></div>

                <!-- Blurred shapes - more vibrant colors -->
                <div class="absolute w-96 h-96 bg-fuchsia-200 rounded-full blur-xl opacity-50 animate-pulse-fast" style="top: -10%; right: -5%;"></div>
                <div class="absolute w-[30rem] h-[30rem] bg-sky-200 rounded-full blur-xl opacity-50 animate-pulse-fast-2" style="bottom: -15%; left: -10%;"></div>

                <!-- Particle grid - brighter particles -->
                <div class="absolute inset-0 opacity-30">
                    <div class="grid grid-cols-12 grid-rows-8 h-full">
                        @for ($i = 0; $i < 96; $i++)
                            <div class="relative">
                                <div class="absolute w-2 h-2 bg-violet-500 rounded-full animate-twinkle-fast-{{$i % 5 + 1}}"></div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Additional decorative elements - more vibrant colors -->
                <div class="absolute w-40 h-40 border-4 border-sky-300 rounded-full opacity-40 animate-spin-medium" style="top: 30%; left: 30%;"></div>
                <div class="absolute w-32 h-32 border-4 border-fuchsia-300 rounded-full opacity-40 animate-spin-medium-reverse" style="bottom: 25%; right: 20%;"></div>

                <!-- Geometric shapes - more vibrant colors -->
                <div class="absolute w-24 h-24 bg-cyan-300 opacity-40 animate-move-square" style="top: 15%; right: 25%; transform: rotate(45deg);"></div>
                <div class="absolute w-20 h-20 bg-violet-300 opacity-40 animate-move-triangle" style="bottom: 20%; left: 30%; clip-path: polygon(50% 0%, 0% 100%, 100% 100%);"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Association Members</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
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
            <div class="flex justify-center mt-8">
                <a href="{{route('frontend.association_members')}}" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition-colors duration-300">
                    View All Members
                </a>
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
                    <a href="{{route('frontend.batch_wise_members', $year)}}">
                        <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group">
                            <!-- Batch Content -->
                            <div class="relative p-6 text-center bg-white/80 backdrop-blur-sm">
                                <div class="text-3xl font-bold text-indigo-600 mb-2 transform transition-transform duration-300 group-hover:scale-110">
                                    {{ $year }}
                                </div>
                                <div class="text-sm text-gray-500">Batch</div>
                            </div>
                        </div>
                    </a>
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
                <a href="{{route('frontend.occupation_wise_members', 'private')}}">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                        <div class="p-6 text-center">
                            <h3 class="text-2xl font-bold text-blue-600 mb-4">Private</h3>
                            <p class="text-gray-600">Members working in private sectors</p>
                            <div class="mt-6 text-4xl font-bold text-gray-800">1,234</div>
                        </div>
                    </div>
                </a>

                <!-- Govt. -->
                <a href="{{route('frontend.occupation_wise_members', 'govt')}}">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                        <div class="p-6 text-center">
                            <h3 class="text-2xl font-bold text-green-600 mb-4">Govt.</h3>
                            <p class="text-gray-600">Members working in government sectors</p>
                            <div class="mt-6 text-4xl font-bold text-gray-800">567</div>
                        </div>
                    </div>
                </a>

                <!-- Business -->
                <a href="{{route('frontend.occupation_wise_members', 'business')}}">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                        <div class="p-6 text-center">
                            <h3 class="text-2xl font-bold text-orange-600 mb-4">Business</h3>
                            <p class="text-gray-600">Members involved in business</p>
                            <div class="mt-6 text-4xl font-bold text-gray-800">890</div>
                        </div>
                    </div>
                </a>

                <!-- None -->
                <a href="{{route('frontend.occupation_wise_members', 'none')}}">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden">
                        <div class="p-6 text-center">
                            <h3 class="text-2xl font-bold text-purple-600 mb-4">None</h3>
                            <p class="text-gray-600">Members without specific occupation</p>
                            <div class="mt-6 text-4xl font-bold text-gray-800">321</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

   <!-- Join Us Section -->
   @if(!Auth::check())
        <section class="py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Want to Join Our Association?</h2>
                    <p class="text-lg text-gray-600 mb-8">We're always looking for dedicated individuals to join our community. Learn about the benefits of membership and how to apply.</p>
                    <a href="{{route('register')}}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-colors">
                        Apply for Membership
                    </a>
                </div>
            </div>
        </section>
    @endif

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

        /* New animated background styles */
        @keyframes float-fast-1 {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, 20px) rotate(8deg); }
            50% { transform: translate(10px, 40px) rotate(0deg); }
            75% { transform: translate(-20px, 20px) rotate(-8deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }

        @keyframes float-fast-2 {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-25px, 15px) rotate(-10deg); }
            50% { transform: translate(-35px, -20px) rotate(-5deg); }
            75% { transform: translate(-15px, -40px) rotate(5deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }

        @keyframes float-fast-3 {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(20px, -30px) rotate(5deg); }
            50% { transform: translate(40px, 10px) rotate(10deg); }
            75% { transform: translate(15px, 35px) rotate(3deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }

        @keyframes pulse-fast {
            0% { transform: scale(1) translate(0, 0); opacity: 0.4; }
            50% { transform: scale(1.1) translate(20px, -20px); opacity: 0.6; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.4; }
        }

        @keyframes pulse-fast-2 {
            0% { transform: scale(1) translate(0, 0); opacity: 0.4; }
            50% { transform: scale(1.15) translate(-25px, 15px); opacity: 0.6; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.4; }
        }

        @keyframes twinkle-fast-1 {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.5); }
        }

        @keyframes twinkle-fast-2 {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.4); }
        }

        @keyframes twinkle-fast-3 {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.6); }
        }

        @keyframes twinkle-fast-4 {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.3); }
        }

        @keyframes twinkle-fast-5 {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.4); }
        }

        @keyframes spin-medium {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes spin-medium-reverse {
            from { transform: rotate(0deg); }
            to { transform: rotate(-360deg); }
        }

        @keyframes move-square {
            0% { transform: translate(0, 0) rotate(45deg); }
            25% { transform: translate(-30px, 20px) rotate(90deg); }
            50% { transform: translate(0, 40px) rotate(135deg); }
            75% { transform: translate(30px, 20px) rotate(180deg); }
            100% { transform: translate(0, 0) rotate(225deg); }
        }

        @keyframes move-triangle {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(25px, -15px) rotate(30deg); }
            50% { transform: translate(40px, 0) rotate(0deg); }
            75% { transform: translate(25px, 15px) rotate(-30deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }

        .animate-float-fast-1 { animation: float-fast-1 8s infinite ease-in-out; }
        .animate-float-fast-2 { animation: float-fast-2 9s infinite ease-in-out; }
        .animate-float-fast-3 { animation: float-fast-3 7s infinite ease-in-out; }
        .animate-pulse-fast { animation: pulse-fast 5s infinite ease-in-out; }
        .animate-pulse-fast-2 { animation: pulse-fast-2 6s infinite ease-in-out; }
        .animate-twinkle-fast-1 { animation: twinkle-fast-1 1.5s infinite ease-in-out; }
        .animate-twinkle-fast-2 { animation: twinkle-fast-2 2s infinite ease-in-out; }
        .animate-twinkle-fast-3 { animation: twinkle-fast-3 2.5s infinite ease-in-out; }
        .animate-twinkle-fast-4 { animation: twinkle-fast-4 1.8s infinite ease-in-out; }
        .animate-twinkle-fast-5 { animation: twinkle-fast-5 2.2s infinite ease-in-out; }
        .animate-spin-medium { animation: spin-medium 15s infinite linear; }
        .animate-spin-medium-reverse { animation: spin-medium-reverse 12s infinite linear; }
        .animate-move-square { animation: move-square 10s infinite ease-in-out; }
        .animate-move-triangle { animation: move-triangle 8s infinite ease-in-out; }

        /* Hero slider animations */
        @keyframes slow-zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        .animate-slow-zoom {
            animation: slow-zoom 10s infinite alternate ease-in-out;
        }

        /* News marquee animations */
        @keyframes ping-slow {
            0%, 100% { transform: scale(0.8); opacity: 0.2; }
            50% { transform: scale(1.2); opacity: 0.4; }
        }

        @keyframes ping-slow-2 {
            0%, 100% { transform: scale(0.7); opacity: 0.2; }
            50% { transform: scale(1.1); opacity: 0.3; }
        }

        @keyframes ping-slow-3 {
            0%, 100% { transform: scale(0.9); opacity: 0.2; }
            50% { transform: scale(1.3); opacity: 0.4; }
        }

        .animate-ping-slow { animation: ping-slow 4s infinite ease-in-out; }
        .animate-ping-slow-2 { animation: ping-slow-2 5s infinite ease-in-out; }
        .animate-ping-slow-3 { animation: ping-slow-3 6s infinite ease-in-out; }
    </style>
@endpush
