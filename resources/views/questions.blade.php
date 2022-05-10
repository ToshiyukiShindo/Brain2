@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body mb-2 bg-light text-dark">

        <div class="card-title w-25">
            質問登録
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('questions') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                タイトル
                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                カテゴリ
                <div class="col-sm-6">
                    <input type="text" name="category" class="form-control">
                </div>
            </div>
            <!-- 投稿の本文 -->
            <div class="form-group mb-4">
                質問内容
                <div class="col-sm-6">
                    <textarea type="text" name="desc" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto">
                        Post
                    </button>
                </div>
            </div>
        </form>
        @endif    
    </div>
    
@endsection