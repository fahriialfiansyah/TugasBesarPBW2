<div class="min-h-screen flex justify-center items-center">
    <div class="object-cover w-full hidden md:block w-1/2 shadow-2xl">
        {{ $logo }}
    </div>

    <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-48 md:px-24 lg:px-48">
        {{ $slot }}
    </div>
</div>
