@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire | Edit Question')
@section('contentadmin')


<h3>Edit Question</h3>

    <form method="POST" action="{{ action('QuizController@editQuestionAction') }}">

    {{ csrf_field() }}

      <div class="row"><div class="col-md-12">
          <label >Question:</label>
          <input type="text" name="question" placeholder="Question" value="{{ $quests[0]->question }}">
        </div></div>

        <div class="row">
        <div class="col-md-6">
        <div><label >Answer 1:</label>
          <input type="text" name="answera" placeholder="Answer 1" value="{{ $quests[0]->answera }}"></div>

        <div><label >Answer 2:</label>
          <input type="text" name="answerb" placeholder="Answer 2" value="{{ $quests[0]->answerb }}"></div>
        </div>

        <div class="col-md-6">
        <div><label >Answer 3:</label>
          <input type="text" name="answerc" placeholder="Answer 3" value="{{ $quests[0]->answerc }}"></div>

        <div><label >Answer 4:</label>
          <input type="text" name="answerd" placeholder="Answer 4" value="{{ $quests[0]->answerd }}"></div>
        </div>
        </div>

        <div class="row" style="margin-top:20px;">
        <div class="col-md-6"><label >Correct Answer:</label>
          <input type="number" name="correct" placeholder="Correct Answer Number" value="{{ $quests[0]->correct }}"></div>

        <div class="col-md-6 text-right">
        <input type="submit" name="action" value="Cancel">
        <input type="submit" name="action" value="Edit">
        </div>

        </div>



      </div>

    </form>

<script>
$(document).ready(function(e){
    $('.leftMenu .quiz').addClass('selected');
    });
</script>
 @endsection
