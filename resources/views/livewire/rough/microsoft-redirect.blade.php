<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-4">Microsoft Login Redirect</h2>
        <textarea name="" id="" cols="30" rows="10">{{ $redirectUrl ?? '' }}</textarea>
        <p class="mb-6 text-gray-700">Click the button below to fetch Microsoft URL:</p>
        <button type="button" wire:click="fetchUrl" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            Login with Microsoft
        </button>
        <p class="mt-4 text-sm text-gray-500 break-all">Redirect URL: <br><span class="text-blue-600">{{ $redirectUrl }}</span></p>
    </div>
</div>
