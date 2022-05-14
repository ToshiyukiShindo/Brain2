@extends('layouts.app')
@section('content')
    <div class="card-body mb-2 bg-light text-dark">
    <div style="margin-left:35px;margin-right:35px;">
    @include('common.errors')
        <form action="{{ url('useredit/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control col-sm-6" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="title">email</label>
                <input type="text" name="email" class="form-control col-sm-6" value="{{Auth::user()->email}}">
            </div>
            <div class="form-group">
                <label for="title">password</label>
                <input type="text" name="password" class="form-control col-sm-6">
            </div>
            <div class="form-group" @if(Auth::user()->manage_flag==!2)hidden@else @endif>
                <label for="category">manage_flag</label>
                <input type="text" name="manage_flag" class="form-control col-sm-6" value="{{Auth::user()->manage_flag}}">
            </div>
            <div class="form-group" @if(Auth::user()->manage_flag==0)hidden@else @endif>
                <label for="category">Answer Category</label>
                <input type="text" name="answe_category" class="form-control col-sm-6" value="{{Auth::user()->answer_category}}">
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto">Save</button>
                <a class="btn btn-secondary btn-sm btn-norounded scrollto" href="{{ url('/home') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{Auth::user()->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
        </div>
    </div>
@endsection