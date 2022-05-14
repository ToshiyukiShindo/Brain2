@extends('layouts.app')
@section('content')
    <div class="card-body mb-2 bg-light text-dark">
    <div style="margin-left:35px;margin-right:35px;">
    @include('common.errors')
        <form action="{{ url('questions/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" class="form-control col-sm-6" value="{{$question->title}}">
            </div>
            <div class="form-group" hidden>
                <label for="title">ID</label>
                <input type="text" name="id" class="form-control col-sm-6" value="{{$question->id}}">
            </div>
            <div class="form-group">
                <label for="category">カテゴリ</label>
                <input type="text" name="category" class="form-control col-sm-6" value="{{$question->category}}">
            </div>
            <div class="form-group">
                <label for="desc">質問内容</label>
                <input type="text" name="desc" class="form-control col-sm-12" value="{{$question->desc}}">
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto">Save</button>
                <a class="btn btn-secondary btn-sm btn-norounded scrollto" href="{{ url('/home') }}"> Back</a>
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