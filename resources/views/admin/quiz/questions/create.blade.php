@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire | Create Question')
@section('contentadmin')


<h3>Create New Question</h3>

        {{ Form::open(array('url' => 'create-question-action/{id}', 'method' => 'post')) }}

        {{ csrf_field() }}

        <div class="row"><div class="col-md-6">
            <label >Category:</label>
            <input type="number" name="questioncategory" placeholder="Category">
          </div><div class="col-md-12">
          <label >Question:</label>
          <input type="text" name="question" placeholder="Question">
        </div></div>

        <div class="row">
        <div class="col-md-6">
        <div><label >Answer 1:</label>
          <input type="text" name="answera" placeholder="Answer 1"></div>

        <div><label >Answer 2:</label>
          <input type="text" name="answerb" placeholder="Answer 2"></div>
        </div>

        <div class="col-md-6">
        <div><label >Answer 3:</label>
          <input type="text" name="answerc" placeholder="Answer 3"></div>

        <div><label >Answer 4:</label>
          <input type="text" name="answerd" placeholder="Answer 4"></div>
        </div>
        </div>

        <div class="row" style="margin-top:20px;">
        <div class="col-md-6"><label >Correct Answer:</label>
          <input type="number" name="correct" placeholder="Correct Answer Number"></div>





        <div class="col-md-6 text-right">
        <input type="submit" name="action" value="Cancel">
        <input type="submit" name="action" value="Create">
        </div>

        </div>


        {{ Form::close() }}

    <script>
    $(document).ready(function(e){
    $('.leftMenu .quiz').addClass('selected');
    });
</script>
@endsection
