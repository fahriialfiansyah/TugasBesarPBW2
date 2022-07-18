<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Show Product</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{ asset('js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('js/charts-bars.js') }}" defer></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
    @include('layouts.admin.store.desktop-sidebar')
    @include('layouts.admin.store.mobile-sidebar')
      <div class="flex flex-col flex-1">
        @include('layouts.hamburger')
        {{-- halaman utama --}}
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-400 dark:hover:text-red-400"
            >
              Store | Show Product
            </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('store.index') }}">
                            {!! Form::submit('Back', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) !!}
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
                <div class="w-full overflow-x-auto">
                  <table class="table-auto bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-6 py-4">
                                {{ $products->nama_barang }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('barang/gambar/'.$products->gambar) }}" width="100px">
                            </td>
                            <td class="px-6 py-4">
                                {{ $products->harga }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $products->stok }}
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
