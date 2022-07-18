<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Data Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                      <!-- Notifikasi menggunakan flash session data -->
                      @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                      @endif

                      @if (session('error'))
                      <div class="alert alert-error">
                          {{ session('error') }}
                      </div>
                      @endif

                    </div>
                </div>
            </div>
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Store | All Data
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
                        <a class="bg-red-400" href="{{ route('store.create') }}">
                            {!! Form::submit('Add Product', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded openbutton']) !!}
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
                <div class="w-full overflow-x-auto">
                  <table class="table-auto bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <thead>
                      <tr
                        class="text-xs font-bold tracking-wide text-left uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Barang</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-6 py-3">Action</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @forelse ($products as $product)
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <div>
                              <p>{{ ++$i }}</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->nama_barang }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <img src="{{ asset('barang/gambar/'.$product->gambar) }}" width="100">
                            {{-- alt="{{ $product->original_filename }}" --}}
                          </td>
                          <td class="px-4 py-3 text-sm">
                            {{ $product->harga }}
                          </td>
                          <td class="px-4 py-3 text-sm">
                            {{ $product->stok }}
                        </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('store.destroy', $product->id) }}" method="POST">
                                <a href="{{ route('store.show', $product->id) }}"
                                    class="btn btn-sm btn-info shadow">Show |</a>
                                <a href="{{ route('store.edit', $product->id) }}"
                                    class="btn btn-sm btn-info shadow">Edit |</a>
                                
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @empty
                        <tr>
                            <td class="text-center text-mute text-gray-700 dark:text-gray-400" colspan="6">Data produk tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
  </body>
</html>
