<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <title>MySQL Articles | Codage</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/read.css') }}"> --}}
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
    @include('layouts.user.article.desktop-sidebar')
    @include('layouts.user.article.mobile-sidebar')
    <div class="flex flex-col flex-1">
      @include('layouts.hamburger')
        {{-- INI HALAMAN UTAMA/HALAMAN TENGAH --}}
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              MySQL
            </h2>

            <!-- Card Container Start -->

            <div class="flex flex-wrap justify-center">
                @foreach ($tabel3 as $object)

                <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">

                    <img src="{{ asset('img/mysql-icon.png') }}" alt="" class="h-15 m-6">

                    <h2 class="text-center px-2 pb-2">{{ $object->title }}</h2>

                    <span class="text-center px-2 pb-5">{{ $object->author }}</span>

                    <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Read More
                    </button>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                        <div class="relative w-auto my-6 mx-auto max-w-3xl">
                        <!--content-->
                            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        {{ $object->title }}
                                    </h3>
                                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                        ×
                                        </span>
                                    </button>
                                </div>
                                <!--body-->
                                <div class="relative p-6 flex-auto">
                                <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                                    {{ $object->content }}
                                </p>
                                </div>
                                <!--footer-->
                                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                    Close
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

                </div>
                @endforeach
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script type="text/javascript">
        function toggleModal(modalID){
          document.getElementById(modalID).classList.toggle("hidden");
          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID).classList.toggle("flex");
          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
  </body>
</html>
