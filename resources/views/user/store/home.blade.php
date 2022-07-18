<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    <title>Store | Logicode</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    {{-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/store/carousel.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
    @include('layouts.user.store.desktop-sidebar')
    @include('layouts.user.store.mobile-sidebar')
      <div class="flex flex-col flex-1 w-full">
        @include('layouts.shop')
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <nav id="header" class="w-full z-30 top-0 py-1 container grid px-6 mx-auto">
                <div class="w-full flex flex-wrap items-center justify-between mt-2 px-6 py-3 dark:text-gray-200">

                  <div class="text-gray-700 dark:text-gray-200">
                      <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-xl " href="#">
                          <svg class="fill-current text-gray-800 mr-2 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                          </svg>
                          Store
                      </a>
                  </div>

                </div>
            </nav>

                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12 py-8 md:px-9">
                    <!-- <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                          <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 dark:text-gray-400 text-xl hover:border-black">
                            Brand Lokal Terlaris
                          </a>
                        </div>
                    </nav> -->
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        @foreach ($barangs as $barang)

                        <div class="rounded shadow-lg text-gray-700 dark:text-gray-400 ml-4 mr-4">
                            <img src="{{ asset('barang/gambar/'.$barang->gambar) }}" width="300" height="300" alt="Gambar">
                            <div class="px-4 py-3">
                                <div class="font-bold text-xl mb-2">{{ $barang->nama_barang }}</div>
                                <p class="text-gray-700 text-base dark:text-gray-400">
                                    <strong>Harga :</strong> Rp {{ number_format($barang->harga) }} <br>
                                    <strong>Stok :</strong> {{ $barang->stok }} <br>
                                    <hr>
                                    <small class="text-gray-500">Telkom University</small>
                                </p>
                            </div>
                            <div class="px-4 py-3">
                                <a href="{{ route('user/store/store.pesan', $barang->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Pesan
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                @include('layouts.footer') 
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    @include('sweetalert::alert')
</body>
</html>
