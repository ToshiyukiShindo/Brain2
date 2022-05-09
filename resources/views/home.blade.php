@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a href={{asset('/questions')}}>Questions登録</a>
                </div>
            </div>
        </div>
    </div>
    
        <!-- 全ての投稿リスト -->
     @if (count($questions) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>質問一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $question->id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $question->title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $question->category }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $question->desc }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif

    
</div>
@endsection
