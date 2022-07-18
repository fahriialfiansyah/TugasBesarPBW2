<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Add Article</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
    @include('layouts.admin.article.desktop-sidebar')
    @include('layouts.admin.article.mobile-sidebar')
      <div class="flex flex-col flex-1">
        @include('layouts.hamburger')
        {{-- halaman utama --}}
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container px-6 md:max-w-sm md:mx-auto rounded shadow-lg">
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

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-400 dark:hover:text-red-400">
                    Article | Add Article
                </h2>

                @if ($errors->any())
                <div class="alert alert-danger text-gray-500 dark:text-gray-300">
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
                            <a class="btn btn-primary" href="{{ route('article.index') }}">
                                {!! Form::submit('Back', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) !!}
                            </a>
                        </div>
                    </div>
                </div>

                {!! Form::open(array('route' => 'article.store', 'method' => 'POST', 'class' => 'mb-4 md:flex md:flex-wrap md:justify-between')) !!}
                @csrf

                    <div class="flex flex-col mb-4 md:w-1/2">
                        {!! Form::label('title', 'Judul', ['class' => 'mt-4 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                        {!! Form::text('title', null, ['class'=>'border py-2 px-3 text-grey-darkest','required']) !!}
                    </div>
                    <div class="flex flex-col mb-4 md:w-1/2">
                        {!! Form::label('author', 'Pengarang', ['class' => 'mt-2 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                        {!! Form::text('author', null, ['class'=>'border py-2 px-3 text-grey-darkest','required']) !!}
                    </div>
                    <div class="flex flex-col mb-4 md:w-1/2">
                        {!! Form::label('status', 'Status', ['class' => 'mt-2 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                        {!! Form::select('status', array('1' => 'Publish', '0' => 'Draft'), '1', ['class'=>'border py-2 px-3 text-grey-darkest', 'required']) !!}
                    </div>
                    <div class="flex flex-col mb-4 md:w-1/2">
                        {!! Form::label('content', 'Isi Artikel', ['class' => 'mt-2 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                        {!! Form::textarea('content', null, ['class'=>'border text-grey-darkest','cols' => 2, 'rows' => 2, 'required']) !!}
                    </div>
                    <div class="flex flex-col mb-4 md:w-1/2">
                        {!! Form::label('tag', 'Category', ['class' => 'mt-2 tracking-wide text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4']) !!}
                        {!! Form::select('tag', array('0' => 'Select Category', '1' => 'Java', '2' => 'PHP', '3' => 'MySQL'), '0', ['class'=>'border py-2 px-3 text-grey-darkest']) !!}
                    </div>
                    <div class="-mx-3 md:flex mt-6">
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
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
  </body>
</html>
