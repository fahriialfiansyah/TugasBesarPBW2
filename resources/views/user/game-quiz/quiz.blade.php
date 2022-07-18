<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <title>Game Quiz | Logicode</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz/custom.css') }}" />
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      @include('layouts.user.quiz.desktop-sidebar')
      @include('layouts.user.quiz.mobile-sidebar')  
      <div class="flex flex-col flex-1">
        @include('layouts.hamburger')
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Game Quiz
            </h2>

            <div class="container main quiz">
                <div class="inro text-gray-700 dark:text-gray-200">
                    <p>
                      Ini adalah contoh kuesioner interaktif dengan pertanyaan dari materi yang telah disediakan. 
                      Mulailah dengan mengklik tombol "Play", lalu pilih kategori dan jawab pertanyaan dengan mengklik salah satu dari empat jawaban yang diberikan.
                    </p>
                    <p>Durasi kuis dibatasi hingga 1 menit di setiap soal. Semoga berhasil</p>
                    <div class="center">
                        <div class="playBtn">
                            Play
                        </div>
                    </div>
                </div>
    
                <div class="quizstart">
                    <h3 class="text-gray-700 dark:text-gray-200">Pilih Kategori Pertanyaan:</h3>
                    <div class="quizcategories">
                        @foreach($categories as $d)
                        <a class="catitem" href="quizplay/{{ $d->id }}">{{ $d->categoryname }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    
    <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <script src="{{ asset('js/init-alpine.js') }}"></script>
  <!-- You need focus-trap.js to make the modal accessible -->
  <script src="{{ asset('js/focus-trap.js') }}" defer></script>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/quiz/custom.js') }}"></script>
@yield('quizscripts')
  </body>
</html>
