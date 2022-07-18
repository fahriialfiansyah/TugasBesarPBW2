@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire | Edit Category')
@section('contentadmin')


<h3>Edit Category</h3>

    {{ Form::open(array('url' => 'edit-category-action/{id}', 'method'=>'post')) }}

    @foreach ($category as $cats)
    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

    {{ csrf_field() }}

       <div>
          <input type="text" name="categoryname" placeholder="Category Name" value="{{ $cats->categoryname }}">
      </div>
      <div>
      <input type="submit" name="action" value="Cancel">
      <input type="submit" name="action" value="Edit">

      </div>
    @endforeach
    {{ Form::close() }}

    <script>
    $(document).ready(function(e){
    $('.leftMenu .quiz').addClass('selected');
    });
</script>
 @endsection
