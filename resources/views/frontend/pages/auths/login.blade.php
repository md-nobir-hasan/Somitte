<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md" x-data="{ isPasswordVisible: false, isOtpMode: false, isLoading: false }">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- Header with Background -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-center">
                    <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                    <p class="text-blue-100">Sign in to your account</p>
                </div>

                <!-- Login Form -->
                <div class="p-6">
                    <form action="{{ route('login.authenticate') }}" method="POST" @submit="isLoading = true">
                        @csrf

                        <!-- Toggle between WhatsApp and Password login -->
                        <div class="flex justify-center mb-6">
                            <div class="bg-gray-100 p-1 rounded-lg inline-flex">
                                <button type="button"
                                    @click="isOtpMode = false"
                                    :class="!isOtpMode ? 'bg-white shadow-sm text-blue-600' : 'text-gray-500'"
                                    class="px-4 py-2 rounded-md font-medium text-sm transition-all duration-200">
                                    Password
                                </button>
                                <button type="button"
                                    @click="isOtpMode = true"
                                    :class="isOtpMode ? 'bg-white shadow-sm text-blue-600' : 'text-gray-500'"
                                    class="px-4 py-2 rounded-md font-medium text-sm transition-all duration-200">
                                    OTP
                                </button>
                            </div>
                        </div>

                        <!-- Error Alert -->
                        @if(session('error'))
                        <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-4 flex items-center text-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('error') }}
                        </div>
                        @endif

                        <!-- WhatsApp Number Field -->
                        <div class="mb-4">
                            <label for="whatsapp" class="block text-gray-700 text-sm font-medium mb-2">WhatsApp Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                                <input type="tel" id="whatsapp" name="whatsapp"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your WhatsApp number"
                                    value="{{ old('whatsapp') }}"
                                    required>
                            </div>
                            @error('whatsapp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field - Shown when not in OTP mode -->
                        <div x-show="!isOtpMode" class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input
                                    :type="isPasswordVisible ? 'text' : 'password'"
                                    id="password"
                                    name="password"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your password">
                                <button
                                    type="button"
                                    @click="isPasswordVisible = !isPasswordVisible"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                                    <svg x-show="!isPasswordVisible" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <svg x-show="isPasswordVisible" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path>
                                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"></path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- OTP Field - Shown when in OTP mode -->
                        <div x-show="isOtpMode" class="mb-4">
                            <label for="otp" class="block text-gray-700 text-sm font-medium mb-2">OTP</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v-1l1-1 1-1-1.243-1.243A6 6 0 1118 8zm-6-4a1 1 0 00-1 1v1.586l-1.293-1.293a1 1 0 00-1.414 1.414L10 8.414l1.707-1.707a1 1 0 00-1.414-1.414L9 6.586V5a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="otp"
                                    name="otp"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter OTP sent to your WhatsApp">
                            </div>
                            @error('otp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                            </div>
                            <div>
                                <a href="{{ route('forgot-password') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-3 px-4 rounded-lg font-medium hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 flex items-center justify-center"
                            :class="{ 'opacity-75 cursor-not-allowed': isLoading }">
                            <span x-show="!isLoading">
                                <span x-show="!isOtpMode">Sign In</span>
                                <span x-show="isOtpMode">Send OTP</span>
                            </span>
                            <span x-show="isLoading" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="my-6 flex items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-sm">OR</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800">Register now</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-4 text-center text-gray-500 text-xs">
                <p>© 2023 Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>