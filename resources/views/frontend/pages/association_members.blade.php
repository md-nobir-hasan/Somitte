@extends('frontend.layout.app')

@section('title','Association Members - Somite')

@section('content')
<main x-data="{
    search: '',
    searchMember(card) {
        if (this.search === '') return true;

        const searchTerm = this.search.toLowerCase();
        const name = card.querySelector('h3').textContent.toLowerCase();
        const role = card.querySelector('.member-role').textContent.toLowerCase();
        const department = card.querySelector('.member-department').textContent.toLowerCase();

        return name.includes(searchTerm) ||
               role.includes(searchTerm) ||
               department.includes(searchTerm);
    }
}">
    <!-- Search Filter -->
    <x-search-filter
        placeholder="Search members..."
        search-model="search"
        position="right"
    />

    <!-- Members Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-800 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Our Association Members</h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">Meet the dedicated individuals who make our association strong and vibrant.</p>
            </div>
        </div>
    </section>

    <!-- Members Grid Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ([1,2,3,4,5,6,7,8,9,10] as $item)
                    @if($loop->even)
                    <div class="member-card bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden"
                         x-show="searchMember($el)"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90">
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
                            <h3 class="text-xl font-semibold mb-1 text-gray-800">Md Niloy Hassan</h3>
                            <p class="member-role text-gray-600 font-medium">Member</p>
                            <p class="member-department text-sm text-gray-500">Administrative</p>
                        </div>
                    </div>
                    @else
                    <div class="member-card bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden"
                         x-show="searchMember($el)"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90">
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
                            <h3 class="text-xl font-semibold mb-1 text-gray-800">Md Nobir Hasan</h3>
                            <p class="member-role text-gray-600 font-medium">Moderator</p>
                            <p class="member-department text-sm text-gray-500">IT Department</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <!-- No results message -->
            <div x-show="search.length > 0 && !Array.from(document.querySelectorAll('.member-card')).some(card => searchMember(card))"
                 class="text-center py-8">
                <p class="text-gray-500 text-lg">No members found matching "<span x-text="search"></span>"</p>
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

@push('scripts')
<script>
    document.getElementById('memberSearch').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const memberCards = document.querySelectorAll('.member-card');

        memberCards.forEach(card => {
            const memberName = card.querySelector('h3').textContent.toLowerCase();
            if (memberName.includes(searchValue)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
@endpush
