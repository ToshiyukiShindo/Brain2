@extends('layouts.app')
@section('content')
<div class="row m-auto pl-4">
    <div class="card-body p-4">
    @include('common.errors')
        <form action="{{ url('questions/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" class="form-control col-sm-6" value="{{$question->title}}" disabled>
            </div>
            <div class="form-group">
                <label for="category">カテゴリ</label>
                <input type="text" name="category" class="form-control col-sm-6" value="{{$question->category}}"disabled>
            </div>
            <div class="form-group">
                <label for="desc">質問内容</label>
                <h6 name="desc" class="col-sm-6">{{$question->desc}}test description</h6>
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <a class="btn btn-secondary btn-sm btn-norounded scrollto" href="{{ url('/home') }}"> Back</a>
            </div>
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
    <hr class="m-1">

    //chat機能を追加

@endsection