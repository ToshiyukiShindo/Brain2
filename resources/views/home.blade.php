@extends('layouts.app')

@section('content')
<p></p>
<section id="home" class="container align-self-md-center justify-content-center">
	<div class="overlay">
		<div class="overlay-inner bg-image-holder bg-cover">
			<img src="demo/images/image-5.jpg" alt="background">
		</div>
		<div class="overlay-inner bg-dark opacity-30"></div>
	</div>

	<div class="container align-self-md-center text-center text-white">
		<h5 class="mb-3 ">あなたにとって必要なことを<br>聞いてください</h5>
    </div>

    <div class="w-75 opacity-80 m-auto">
        <div class="col-md-6 m-auto">
            <div class="card bg-white p-2">
                <div class="card-body p-2 align-self-md-center text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div><a class="btn btn-white btn-sm btn-norounded scrollto" href={{asset('/questions')}}>Questions登録</a></div>
                </div>
            </div>
        </div>
    </div>
    </section>

        <!-- 全ての投稿リスト -->
        <div class="card-body">
            <div class="card-body">
                @if(Auth::user()->manage_flag == 1)
                <h6 class="w-75 mb-2">Posted Questions <br>【ALL】 ※detailから質問にご回答ください</h6>
                @foreach ($allquestions as $allquestion)
                <div class="card shadow-sm hover">
                    <div class="card-header p-2">
                        <div><h6>{{'from UserID: '.$allquestion->user_id}}</h6></div>

                        <div class="d-flex justify-content-between">
                        <div class="p-1">{{ $allquestion->id.": " }}{{ $allquestion->title }}{{ ' @'.$allquestion->created_at }}
                            <span class="bg-white text-dark bg-gradient border border-dark rounded scrollto p-1 w-25 ml-1">{{ $allquestion->category }}</span>
                        </div>
                        <div class="card-body d-flex p-1 ml-2 justify-content-end" style="gap:10px;">
	                         <div>
	                        <form action="{{ url('questionsdetail/'.$allquestion->id) }}" method="GET"> {{ csrf_field() }}
	                            <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto py-0 px-1 my-0">detail</button>
	                        </form>
	                        </div>
	                        <div>
	                        <form action="{{ url('questionsedit/'.$allquestion->id) }}" method="GET"> {{ csrf_field() }}
	                            <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto py-0 px-1 my-0">edit</button>
	                        </form>
	                        </div>
	                    </div>
	                    </div>
	               </div>
                        <div class="card-body p-1 ml-2 mb-4">
                            <div>{{ $allquestion->desc }}</div>
                        </div>
                </div>
                <p></p>
                @endforeach
                @else
                <h6 class="w-75">Posted Questions<br>【{{Auth::user()->name}}】</h6>
                @foreach ($questions as $question)
                <div class="card shadow-sm hover">
                    <div class="card-header d-flex justify-content-between p-2">
                        <div class="p-1">{{ $question->id.": " }}{{ $question->title }}{{ ' @'.$question->created_at }}
                            <span class="bg-white text-dark bg-gradient border border-dark rounded scrollto p-1 w-25 ml-1">{{ $question->category }}</span>
                        </div>
                        <div class="card-body d-flex p-1 ml-2 justify-content-end" style="gap:10px;">
	                         <div>
	                        <form action="{{ url('questionsdetail/'.$question->id) }}" method="GET"> {{ csrf_field() }}
	                            <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto py-0 px-1 my-0">detail</button>
	                        </form>
	                        </div>
	                        <div>
	                        <form action="{{ url('questionsedit/'.$question->id) }}" method="GET"> {{ csrf_field() }}
	                            <button type="submit" class="btn btn-secondary btn-sm btn-norounded scrollto py-0 px-1 my-0">edit</button>
	                        </form>
	                        </div>
	                    </div>

                        </div>
                        <div class="card-body p-1 ml-2 mb-4">
                            <div>{{ $question->desc }}</div>
                        </div>
                </div>
                <p></p>
                @endforeach
                @endif
            </div>
        </div>		

    
</div>
@endsection
