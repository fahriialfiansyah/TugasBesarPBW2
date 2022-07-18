<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Article | Logicode</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/read.css') }}">
    <link rel="stylesheet" href="{{ asset('css/article-aset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/all.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      @include('layouts.user.article.desktop-sidebar')
      @include('layouts.user.article.mobile-sidebar')
      <div class="flex flex-col flex-1 w-full">
        @include('layouts.hamburger')
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Article
            </h2>

            <section class="min-h-screen flex flex-col justify-center p-2 pt-4 md:p-32 md:pt-4">
              @foreach ($articles as $article)
              <article class="group bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 flex flex-warp md:flex-inherit rounded-lg - shadow-xl relative overflow-hidden mb-8 flex-row bg-gradient-to-r ">
                <div class="relative flex flex-col p-4">
                  <h1 class="text-3xl mb-2 font-bold">{{ $article->title }}</h1>
                  <div class="mb-3">
                    <time>
                      <i class="fas fa-clock mr-1"></i>
                      {{ $article->created_at->diffForHumans() }}
                    </time>
                  </div>
                  <div class="w-0 group-hover:w-48 h-1 rounded bg-red-900 duration-150"></div>
                  <div class="text-justify mb-5">{{ $article->content }}</div>
                  <ul>
                    <li class="inline-block px-4 py-1 bg-blue-900 hover:bg-blue-800 rounded mr-2 cursor-default mb-1">
                      <i class="fas fa-tag" style="color:#dfe2e1"></i>
                      @switch($article->tag)
                          @case(1)
                              <span class="text-gray-100">Java</span>
                              @break
                          @case(2)
                              <span class="text-gray-100">PHP</span>
                              @break
                          @case(3)
                              <span class="text-gray-100">MySQL</span>
                      @endswitch
                    </li>
                    <li class="inline-block px-4 py-1 bg-blue-900 hover:bg-blue-800 rounded mr-2 cursor-default mb-1 text-gray-100 dark:text-gray-300">
                      <i class="fas fa-user-circle mr-2"></i>
                      {{ $article->author }}
                    </li>
                    <li class="inline-block px-4 py-1 bg-blue-900 hover:bg-blue-800 rounded mr-2 cursor-default mb-1 text-gray-100 dark:text-gray-300">
                      Read More
                    </li>
                  </ul>
                </div>
              </article>
              @endforeach
            </section>
            @include('layouts.footer') 
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="{{ asset('js/fontawesome/all.js') }}"></script>
  </body>
</html>
