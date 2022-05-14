@extends('layouts.app')
@section('content')
    <div class="card-body mb-2 bg-light text-dark">
    <div style="margin-left:35px;margin-right:35px;">
    @include('common.errors')
            <!-- item_name -->
            <div class="form-group">
                <label for="title">ありがとうございます。<br>引き続きサービスをご利用ください。</label>
            </div>
            <div class="well well-sm">
                <a class="btn btn-secondary btn-sm btn-norounded scrollto" href="{{ url('/home') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
        </div>
    </div>
@endsection