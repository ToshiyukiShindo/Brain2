@extends('layouts.app')
@section('content')
<div class="row m-auto pl-4 bg-secondary.bg-gradient opacity-70">
    <div class="card-body p-4 bg-white m-auto">
    @include('common.errors')
        <form action="{{ url('questions/update') }}" method="POST">
            <!-- item_name -->
            <h5>質問・回答参照</h5>
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
                <h6 name="desc" class="col-sm-6">{{$question->desc}}</h6>
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
    <hr class="m-1 border-4 color-black">
    <p></p>
        <h5 class="ml-4 text-3xl font-bold">{{'Answer & chats'}}</h5>
    <div class="mx-4 my-1">
        <form class="my-2 px-2 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="{{ url('chats') }}" method="POST" hidden>
            @csrf
            <input type="hidden" name="user_identifier" value="test">
            <input class="py-1 px-2 rounded text-center flex-initial w-25" type="text" name="user_id" maxlength="30" value="{{Auth::user()->id}}" hidden>
            <input class="py-1 px-2 rounded text-center flex-initial w-25" type="text" name="user_name" maxlength="30" value="{{Auth::user()->name}}" hidden>
            <input class="py-1 px-2 rounded text-center flex-initial w-25" type="text" name="question_id" maxlength="30" value="{{$question->id}}" hidden>
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto w-50" type="text" name="message" placeholder="Input message." maxlength="200">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 text-center btn-secondary btn-sm rounded scrollto" type="submit">Send</button>
        </form>

        <div class="my-2 p-2 rounded-lg card-body">
            <ul>
                @foreach($chats as $chat)
                    <hr>
                    <p class="text-xs text-left">{{$chat->created_at}} ＠{{$chat->user_name}}</p>
                    <li class="w-75 mb-3 p-2 rounded-lg bg-white text-dark relative @if($chat->user_name == Auth::user()->name) self @else other @endif" style="list-style:none;">
                        {{$chat->message}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection