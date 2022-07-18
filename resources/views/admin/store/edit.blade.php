<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Edit Product</title>
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
          <div class="container px-6 mx-auto grid md:break-all">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-400 dark:hover:text-red-400"
            >
              Store | Update Product
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
                        <a href="{{ route('store.index') }}">
                            {!! Form::submit('Back', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) !!}
                        </a>
                    </div>
                </div>
            </div>

            {!! Form::open(array('url' => 'admin/store/'. $product->id, 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'mb-4 md:flex md:flex-wrap md:justify-between')) !!}
                @csrf
                @method('PUT')

                <div class="flex flex-col mb-4 md:w-1/2">
                    {!! Form::label('nama_barang', 'Nama Barang', ['class' => 'mt-4 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                    {!! Form::text('nama_barang', $product->nama_barang, ['class'=>'border py-2 px-3 text-grey-darkest','required']) !!}
                </div>
                <div class="flex flex-col mb-4 md:w-1/2 text-gray-700 dark:text-gray-400">
                    {!! Form::label('gambar', 'Gambar', ['class' => 'mt-2 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                    {!! Form::file('gambar', ['class'=>'py-2 px-1 dark:text-gray-400 text-grey-darkest']) !!}
                    <img src="{{ asset('barang/gambar/'.$product->gambar) }}" width="100">
                </div>
                <div class="flex flex-col mb-4 md:w-1/2">
                    {!! Form::label('harga', 'Harga', array('class' => 'mt-4 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4')) !!}
                    {!! Form::number('harga', $product->harga, ['class'=>'border py-2 px-3 text-grey-darkest','required']) !!}
                </div>
                <div class="flex flex-col mb-4 md:w-1/2">
                    {!! Form::label('stok', 'Stok', array('class' => 'mt-4 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4')) !!}
                    {!! Form::number('stok', $product->stok, ['class'=>'border py-2 px-3 text-grey-darkest','required']) !!}
                </div>
                  <div class="md:flex md:items-center mt-6">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        {!! Form::submit('Submit', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) !!}
                    </div>
                  </div>

            {!! Form::close() !!}

          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    @include('sweetalert::alert')
  </body>
</html>
