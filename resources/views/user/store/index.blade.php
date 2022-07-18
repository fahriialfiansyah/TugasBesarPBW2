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
    <style>
        input[type=number] {
            width: 100%;
            padding: 3px 5px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
        }

        input[type=number]:focus {
            border: 3px solid #555;
        }

        input[type=submit] {
            background-color: rgb(59 130 246);
            color: #ffffff;
            font-weight: bold;
            padding: 10px 8px;
            border-radius: 10px;
        }
    </style>

  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      @include('layouts.user.store.desktop-sidebar')
      @include('layouts.user.store.mobile-sidebar')
      <div class="flex flex-col flex-1">
        @include('layouts.shop')
        <main class="h-full pb-16 overflow-y-auto">
            <nav id="header" class="w-full z-30 top-0 py-1 container grid px-6 mx-auto">
                <div class="w-full flex flex-wrap items-center justify-between mt-0 px-6 py-3 dark:text-gray-200">

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

            <div class="row ml-4">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('logicode.store') }}">
                            {!! Form::submit('Kembali', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) !!}
                        </a>
                    </div>
                </div>
            </div>

            <nav class="mt-4 ml-4 flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800">
                <img class="object-cover w-full h-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('barang/gambar/'.$barang->gambar) }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $barang->nama_barang }}</h5>
                    <table class="table-auto">
                        <tbody class="font-bold tracking-tight text-gray-900 dark:text-gray-400">
                            <tr>
                              <td>Harga</td>
                              <td>:</td>
                              <td>Rp {{ number_format($barang->harga) }}</td>
                            </tr>
                            <tr>
                              <td>Stok</td>
                              <td>:</td>
                              <td>{{ number_format($barang->stok) }}</td>
                            </tr>
                            {!! Form::open(array('url' => 'pesan/'. $barang->id, 'method' => 'post')) !!}
                            @csrf
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td class="text-gray-900 dark:text-black">
                                        {!! Form::number('jumlah_pesan') !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td> 
                                    <td></td>
                                    <td class="bg-green text-white font-bold py-2 px-4 rounded">
                                        {!! Form::submit('Masukkan Keranjang') !!}
                                    </td>
                                </tr>
                            {!! Form::close() !!}
                          </tbody>
                    </table>
                </div>
            </nav>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</body>
</html>
