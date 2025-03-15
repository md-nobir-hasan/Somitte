<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Join Our Community</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">
        <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            <!-- Left Side - Branding & Illustration -->
            <div class="hidden md:block md:w-5/12 lg:w-5/12 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-700 p-8 lg:p-12 relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <div class="absolute top-10 left-10 w-40 h-40 rounded-full bg-white"></div>
                    <div class="absolute bottom-10 right-10 w-60 h-60 rounded-full bg-white"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 rounded-full bg-white"></div>
                </div>

                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-12">
                            <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-2xl font-bold text-white">YourBrand</h1>
                        </div>

                        <h2 class="text-3xl lg:text-4xl font-bold text-white leading-tight mb-4">Start your journey with us today</h2>
                        <p class="text-blue-100 text-lg leading-relaxed mb-8">
                            Join our community and connect with thousands of alumni from your university.
                        </p>

                        <div class="flex space-x-4 mb-8">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-white">Network with peers</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-white">Access resources</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-auto">
                        <div class="flex items-center space-x-4">
                            <div class="flex -space-x-2">
                                <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/12.jpg" alt="">
                                <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                <img class="w-10 h-10 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/45.jpg" alt="">
                            </div>
                            <div class="text-sm text-white">Join <span class="font-bold">2,000+</span> members</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full md:w-7/12 lg:w-7/12 p-6 sm:p-8 md:p-10 lg:p-12">
                <div class="max-w-md mx-auto">
                    <div class="text-center md:text-left mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">Create your account</h2>
                        <p class="text-gray-600 mt-2">Fill in your information to get started</p>
                    </div>

                    <form id="registerForm" action="{{ route('register.authenticate') }}" method="POST" enctype="multipart/form-data"
                        x-data="{
                            photoPreview: null,
                            step: 1,
                            totalSteps: 3,
                            showPassword: false,
                            showConfirmPassword: false,
                            formErrors: {},

                            validateStep1() {
                                this.formErrors = {};
                                let isValid = true;

                                if (!document.getElementById('name').value) {
                                    this.formErrors.name = 'Name is required';
                                    isValid = false;
                                }

                                if (!document.getElementById('batch').value) {
                                    this.formErrors.batch = 'Batch is required';
                                    isValid = false;
                                }

                                if (!document.getElementById('occupation').value) {
                                    this.formErrors.occupation = 'Occupation is required';
                                    isValid = false;
                                }

                                if (!document.getElementById('occupation_sector').value) {
                                    this.formErrors.occupation_sector = 'Occupation sector is required';
                                    isValid = false;
                                }

                                return isValid;
                            },

                            validateStep2() {
                                this.formErrors = {};
                                let isValid = true;

                                if (!document.getElementById('permanent_address').value) {
                                    this.formErrors.permanent_address = 'Permanent address is required';
                                    isValid = false;
                                }

                                if (!document.getElementById('present_address').value) {
                                    this.formErrors.present_address = 'Present address is required';
                                    isValid = false;
                                }

                                if (!document.getElementById('whatsapp').value) {
                                    this.formErrors.whatsapp = 'WhatsApp number is required';
                                    isValid = false;
                                }

                                return isValid;
                            },

                            nextStep() {
                                if (this.step === 1 && this.validateStep1()) {
                                    this.step = 2;
                                } else if (this.step === 2 && this.validateStep2()) {
                                    this.step = 3;
                                }
                            },

                            prevStep() {
                                if (this.step > 1) {
                                    this.step--;
                                }
                            },

                            submitForm() {
                                // Validate all steps before submitting
                                const step1Valid = this.validateStep1();
                                const step2Valid = this.validateStep2();

                                if (!step1Valid) {
                                    this.step = 1;
                                    return false;
                                }

                                if (!step2Valid) {
                                    this.step = 2;
                                    return false;
                                }

                                // If all validations pass, submit the form
                                document.getElementById('registerForm').submit();
                            }
                        }"
                        @submit.prevent="submitForm()"
                    >
                        @csrf

                        <!-- Progress Bar -->
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700" x-text="`Step ${step} of ${totalSteps}`"></span>
                                <span class="text-sm font-medium text-indigo-600" x-text="`${Math.round((step/totalSteps)*100)}% Complete`"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full transition-all duration-300 ease-in-out"
                                    x-bind:style="`width: ${(step/totalSteps)*100}%`"></div>
                            </div>
                        </div>

                        <!-- Step 1: Basic Information -->
                        <div x-show="step === 1" class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <div class="relative">
                                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                            :class="formErrors.name ? 'border-red-500' : ''"
                                            id="name" name="name" value="{{ old('name') }}">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-sm text-red-600" x-show="formErrors.name" x-text="formErrors.name"></p>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="batch" class="block text-sm font-medium text-gray-700 mb-1">University Batch</label>
                                    <div class="relative">
                                        <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                            :class="formErrors.batch ? 'border-red-500' : ''"
                                            id="batch" name="batch" placeholder="20 batch" value="{{ old('batch') }}">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-sm text-red-600" x-show="formErrors.batch" x-text="formErrors.batch"></p>
                                    @error('batch')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="occupation" class="block text-sm font-medium text-gray-700 mb-1">Occupation</label>
                                <div class="relative">
                                    <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        :class="formErrors.occupation ? 'border-red-500' : ''"
                                        id="occupation" name="occupation" value="{{ old('occupation') }}">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="mt-1 text-sm text-red-600" x-show="formErrors.occupation" x-text="formErrors.occupation"></p>
                                @error('occupation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="occupation_sector" class="block text-sm font-medium text-gray-700 mb-1">Occupation Sector</label>
                                <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    :class="formErrors.occupation_sector ? 'border-red-500' : ''"
                                    id="occupation_sector" name="occupation_sector">
                                    <option value="" selected disabled>Select your sector</option>
                                    <option value="private" {{ old('occupation_sector') == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="govt" {{ old('occupation_sector') == 'govt' ? 'selected' : '' }}>Government</option>
                                    <option value="business" {{ old('occupation_sector') == 'business' ? 'selected' : '' }}>Business</option>
                                    <option value="none" {{ old('occupation_sector') == 'none' ? 'selected' : '' }}>None</option>
                                </select>
                                <p class="mt-1 text-sm text-red-600" x-show="formErrors.occupation_sector" x-text="formErrors.occupation_sector"></p>
                                @error('occupation_sector')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-4">
                                <button type="button" class="w-full px-6 py-3 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200" @click="nextStep()">
                                    Continue to Contact Information
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Contact Information -->
                        <div x-show="step === 2" class="space-y-6">
                            <div>
                                <label for="permanent_address" class="block text-sm font-medium text-gray-700 mb-1">Permanent Address</label>
                                <textarea class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    :class="formErrors.permanent_address ? 'border-red-500' : ''"
                                    id="permanent_address" name="permanent_address" rows="3">{{ old('permanent_address') }}</textarea>
                                <p class="mt-1 text-sm text-red-600" x-show="formErrors.permanent_address" x-text="formErrors.permanent_address"></p>
                                @error('permanent_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="present_address" class="block text-sm font-medium text-gray-700 mb-1">Present Address</label>
                                <textarea class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    :class="formErrors.present_address ? 'border-red-500' : ''"
                                    id="present_address" name="present_address" rows="3">{{ old('present_address') }}</textarea>
                                <p class="mt-1 text-sm text-red-600" x-show="formErrors.present_address" x-text="formErrors.present_address"></p>
                                @error('present_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                                    <input type="tel" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        :class="formErrors.whatsapp ? 'border-red-500' : ''"
                                        id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                                    <p class="mt-1 text-xs text-gray-500">Used for login and password reset OTP</p>
                                    <p class="mt-1 text-sm text-red-600" x-show="formErrors.whatsapp" x-text="formErrors.whatsapp"></p>
                                    @error('whatsapp')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex space-x-4 pt-4">
                                <button type="button" class="w-1/2 px-6 py-3 bg-gray-200 text-gray-800 font-medium rounded-xl hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200" @click="prevStep()">
                                    Back
                                </button>
                                <button type="button" class="w-1/2 px-6 py-3 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200" @click="nextStep()">
                                    Continue to Final Step
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Account Setup -->
                        <div x-show="step === 3" class="space-y-6">
                            <div>
                                <label for="photo-upload" class="block text-sm font-medium text-gray-700 mb-1">Profile Photo</label>
                                <div class="mt-1 flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6" x-show="!photoPreview">
                                            <svg class="w-12 h-12 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Upload photo</span></p>
                                            <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 2MB)</p>
                                        </div>
                                        <div x-show="photoPreview" class="w-full h-full flex items-center justify-center">
                                            <img x-bind:src="photoPreview" class="object-cover w-full h-full rounded-xl" alt="Profile Photo">
                                        </div>
                                        <input type="file" id="photo-upload" class="opacity-0 absolute" name="photo" accept="image/*"
                                            x-on:change="
                                                const file = $event.target.files[0];
                                                if (file) {
                                                    photoPreview = URL.createObjectURL(file);
                                                }
                                            ">
                                    </label>
                                </div>
                                @error('photo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="relative">
                                    <input
                                        :type="showPassword ? 'text' : 'password'"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('password') border-red-500 @enderror"
                                        id="password"
                                        name="password"
                                    >
                                    <button
                                        type="button"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                        @click="showPassword = !showPassword"
                                    >
                                        <svg
                                            x-show="!showPassword"
                                            class="h-5 w-5 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg
                                            x-show="showPassword"
                                            class="h-5 w-5 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                                <div class="relative">
                                    <input
                                        :type="showConfirmPassword ? 'text' : 'password'"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        required
                                    >
                                    <button
                                        type="button"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                        @click="showConfirmPassword = !showConfirmPassword"
                                    >
                                        <svg
                                            x-show="!showConfirmPassword"
                                            class="h-5 w-5 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg
                                            x-show="showConfirmPassword"
                                            class="h-5 w-5 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="flex space-x-4 pt-4">
                                <button type="button" class="w-1/2 px-6 py-3 bg-gray-200 text-gray-800 font-medium rounded-xl hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200" @click="step = 2">
                                    Back
                                </button>
                                <button type="submit" class="w-1/2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                                    Create Account
                                </button>
                            </div>
                        </div>

                        <div class="text-center mt-8">
                            <p class="text-sm text-gray-600">Already have an account?
                                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>