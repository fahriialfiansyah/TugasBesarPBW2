@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire | Create Category')
@section('contentadmin')



    <h3>Create New Categories</h3>

    {{ Form::open(array('url' => 'create-category-action', 'method' => 'post')) }}

        {{ csrf_field() }}

       <div>
          <input type="text" name="categoryname" placeholder="Category Name">
      </div>
      <div>
        <input type="submit" name="action" value="Cancel">
        <input type="submit" name="action" value="Create">

      </div>

    {{ Form::close() }}

    <script>
    $(document).ready(function(e){
    $('.leftMenu .quiz').addClass('selected');
    });
</script>
@endsection
