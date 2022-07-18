@extends('admin.quiz.masteradmin')
@section('title', 'Laravel Questionaire')
@section('contentadmin')

<div class="row">
    <div class="col-md-6">
        <h3>Questions from <u>{{ $category[0]->categoryname }}</u> category</h3>
    </div>
    <div class="col-md-6 text-right">
        <a class="newcatBtn" href="{{ route('quiz.create.question', [$category[0]->id]) }}" class="">Add New Question</a>
    </div>
</div>

<div class="questionlist">
    @foreach($quests as $q)
    <div class="questionItem">
        <div class="row questionhead nomargin">
            <div class="col-md-8 questionname">{{ $q->question }}</div>
            <div class="col-md-2 text-center">
                <a href="{{ route('quiz.edit.category', [$q->id]) }}">Edit</a>
            </div>
            <div class="col-md-2 text-center">
                <div class="deletequest" qid="{{ $q->id }}" catid="{{ $q->questioncategory }}" qname="{{ $q->question }}">Delete</div>
            </div>
        </div>
        <div class="questiondetails">
            <div class="row questiondetailsbody">
                <div class="col-md-12">1. {{ $q->answera }} @if($q->correct == "1") (correct) @endif</div>
                <div class="col-md-12">2. {{ $q->answerb }} @if($q->correct == "2") (correct) @endif</div>
                <div class="col-md-12">3. {{ $q->answerc }} @if($q->correct == "3") (correct) @endif</div>
                <div class="col-md-12">4. {{ $q->answerd }} @if($q->correct == "4") (correct) @endif</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    $(document).ready(function(e){
    $('.leftMenu .quiz').addClass('selected');
    });
</script>
@endsection

