<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Data Article</title>
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
              class="my-6 text-2xl font-semibold text-gray-500 dark:text-gray-300"
            >
            Article | All Data
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
                        <a class="btn btn-primary" href="{{ route('article.create') }}">
                            {!! Form::submit('Add Article', ['class' => 'btn bg-blue-500 text-white font-bold py-2 px-4 rounded openbutton']) !!}
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
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Author</th>
                        <th class="px-4 py-3">Content</th>
                        <th class="px-4 py-3">Tag</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @forelse ($articles as $article)
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <div>
                              <p><p>{{ ++$i }}</p></p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ $article->title }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ $article->author }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          @if (strlen($article->content) > 40)
                          {{substr($article->content,0,40)}}
                          <span>...</span> 
                          @else
                          {{ $article->content }}
                          @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                          @switch($article->tag)
                              @case(1)
                                  <span>Java</span>
                                  @break
                              @case(2)
                                  <span>PHP</span>
                                  @break
                              @case(3)
                                  <span>MySQL</span>
                          @endswitch
                          {{-- {{ $article->tag }} --}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ $article->status == 0 ? 'Draft':'Publish' }}
                        </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('article.destroy', $article->id) }}" method="POST">
                                <a href="{{ route('article.edit', $article->id) }}"
                                    class="btn btn-sm btn-info shadow">Edit |</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @empty
                        <tr>
                            <td class="text-center text-mute text-gray-500 dark:text-gray-300" colspan="4">Data artikel tidak tersedia</td>
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

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
  </body>
</html>
