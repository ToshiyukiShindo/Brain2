@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card-body mb-2 ml-4 w-50">
    @include('common.errors')
        <form action="{{ url('questions/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" class="form-control col-sm-6" value="{{$question->title}}">
            </div>
            <div class="form-group">
                <label for="category">カテゴリ</label>
                <input type="text" name="category" class="form-control col-sm-6" value="{{$question->category}}">
            </div>
            <div class="form-group">
                <label for="desc">質問内容</label>
                <input type="text" name="desc" class="form-control col-sm-6" value="{{$question->desc}}">
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/questions') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$question->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection