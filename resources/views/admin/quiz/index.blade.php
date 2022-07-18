{{-- INTRO PAGE CONTENT | DASHBOARD ADMIN BAGIAN QUIZ --}}
@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire')

@section('style')
<style>
.mce-notification-warning {display: none;}
</style>
@endsection

@section('contentadmin')

<div class="container">
    {{ Form::open(array('route' => 'admin/quiz/quiz.index', 'method' => 'post')) }}
        @foreach ($content as $cont)
        <div class="form-group">
            <label for="exampleInputDescription">Front Page Content:</label>
            <textarea class="content" name="content">{{ $cont->introtext }}</textarea>
        </div>

        {{ csrf_field() }}
        <input type="submit" name="action" value="Edit">
        @endforeach
    {{ Form::close() }}
</div>

@endsection

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
tinymce.init({
    selector:'textarea.content',
    width: 900,
    height: 300,
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
});

    $(document).ready(function(e){
    $('.leftMenu .intr').addClass('selected');
    });

</script>
