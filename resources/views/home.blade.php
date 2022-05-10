@extends('layouts.app')

@section('content')
<section id="home" class="container align-self-md-center justify-content-center">
	<div class="overlay">
		<div class="overlay-inner bg-image-holder bg-cover">
			<img src="demo/images/image-5.jpg" alt="background">
		</div>
		<div class="overlay-inner bg-dark opacity-30"></div>
	</div>

	<div class="container align-self-md-center text-center text-white">
		<h5 class="mb-3 ">あなたにとって必要なことをどうぞ</h5>
    </div>

    <div class="w-75 opacity-80 m-auto">
        <div class="col-md-6">
            <div class="card bg-white p-2">
                <div class="card-body p-2 align-self-md-center text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a class="btn btn-white btn-sm btn-norounded scrollto" href={{asset('/questions')}}>Questions登録</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    
        <!-- 全ての投稿リスト -->
     @if (count($questions) > 0)
        <div class="card-body">
            <div class="card-body">
                <h6 class="w-25">Poseted Questions</h6>
                @foreach ($questions as $question)
                <div class="card">
                        <div class="card-header">
                            <div>{{ $question->id.": " }}{{ $question->title }}</div>
                        </div>
                        <div class="card-body p-2 ml-2">
                            <div>{{ $question->category }}</div>
                        </div>
                        <div class="card-body p-2 ml-2">
                            <div>{{ $question->desc }}</div>
                        </div>
                        <div class="card-body d-flex p-2 ml-2" style="gap:20px;">
	                       <div>
	                       <form action="{{ url('questionsdetail/'.$question->id) }}" method="GET"> {{ csrf_field() }}
	                           <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto">detail</button>
	                       </form>
	                       </div>
	                       <div>
	                       <form action="{{ url('questionsedit/'.$question->id) }}" method="GET"> {{ csrf_field() }}
	                           <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto">edit</button>
	                       </form>
	                       </div>
	                   </div>
                @endforeach
                </div>
            </div>
        </div>		
    @endif

    
</div>
@endsection
