<div class="container mt-5">
    <div class="relative flex items-center gap-5">
        <a href="{{ url()->previous() }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </a>

        <h1 class="text-2xl font-semibold">{{ $title }}</h1>
    </div>
</div>
