<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-indigo-50 flex items-center justify-center px-4 py-12">
        <div class="max-w-lg w-full">
            <!-- Animated Success Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:shadow-3xl">
                <!-- Header with gradient background -->
                <div class="bg-gradient-to-r from-green-400 to-blue-500 p-8 text-center relative overflow-hidden">
                    <!-- Decorative circles -->
                    <div class="absolute top-0 left-0 w-40 h-40 bg-white opacity-10 rounded-full -translate-x-20 -translate-y-20"></div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full translate-x-16 translate-y-16"></div>

                    <!-- Success Icon with animation -->
                    <div class="flex justify-center mb-4 relative z-10">
                        <div class="rounded-full bg-white p-4 shadow-lg animate-bounce">
                            <svg class="w-20 h-20 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>

                    <h1 class="text-4xl font-extrabold text-white mb-2 relative z-10 drop-shadow-lg">Payment Successful!</h1>
                    <p class="text-green-50 text-lg relative z-10">Your order is confirmed</p>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <p class="text-gray-700 text-center mb-6 leading-relaxed">
                        🎉 Thank you for your purchase! Your order has been confirmed and will be processed shortly.
                    </p>


        </div>
    </div>
</x-app-layout>
