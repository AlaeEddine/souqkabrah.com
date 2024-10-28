@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-top items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-4 px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
