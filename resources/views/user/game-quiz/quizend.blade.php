<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <title>Game Quiz | Logicode</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz/play.css') }}" />
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

            @extends('user.game-quiz.question.masterquestion')

            <div class="container main quizend">
                <div class="row">
                    <div class="col-md-12 center text-gray-700 dark:text-gray-200">
                        <h2>Quiz Telah Berakhir</h2><br>
                        <h4 class="res">Nilai Akhir Anda: {{ $res }}</h4>
                        <div style="text-align:center; margin-top:50px;">
                            <a href="{{ route('logicode.quiz') }}" class="btnAgain">Back</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="{{ asset('js/focus-trap.js') }}" defer></script>
    <script src="{{ asset('js/quiz/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    @section('quizscripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('js/quiz/quiz.js') }}"></script>
    @stop

  </body>
</html>

