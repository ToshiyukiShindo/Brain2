<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ChatsController;//追記
use App\Models\User;
use App\Models\Question;
use App\Models\Chat;
use Auth;
use Validator;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();
        
        // データーベースの件数を取得
        $length = Chat::all()->count();
        
        // 表示する件数を代入
        $display = 15;
        $chats = Chat::latest()->limit($display)->get();
        
        return view('questions',compact('questions','chats','length','display'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //バリデーション 
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //以下に登録処理を記述（Eloquentモデル）
        $questions = new Question;
        $questions->title = $request->title;
        $questions->category = $request->category;
        $questions->desc = $request->desc;
        $questions->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $questions->save();
        
        return redirect('/back');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Question $question)
    {
        $questions = Question::get();
        $detail = Question::where('id',$question->id)->get();
        
        // データーベースの件数を取得
        $length = Chat::all()->count();
        
        // 表示する件数を代入
        $display = 10;
        $chats = Chat::where('question_id',$question->id)->latest()->limit($display)->get();
        
        return view('questionsdetail',compact('questions','question','length','display','chats','detail'));
    }
    
    public function chat(Question $question)
    {
        $questions = Question::get();
        $detail = Question::where('id',$question->id)->get();
        $question = $question->id;
        // データーベースの件数を取得
        $length = Chat::all()->count();
        
        // 表示する件数を代入
        $display = 10;
        $chats = Chat::where('question_id',$question)->latest()->limit($display)->get();
        $messages = Chat::where('question_id',$question)->latest()->limit($display)->get();
        return view('questionschat',compact('messages','questions','question','length','display','chats','detail'));
    }
    
    public function edit(Question $question)
    {
        return view('questionsedit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            //バリデーション
            $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
    ]);
            //バリデーション:エラー 
            if ($validator->fails()) {
                return redirect('/home')
                ->withInput()
                ->withErrors($validator);
            }
            
            // Eloquent モデル
            $questions = Question::find($request->id);
            $questions->id = $request->id;
            $questions->title = $request->title;
            $questions->category = $request->category;
            $questions->desc = $request->desc;
            $questions->updated_at = date_create($request->date);
            $questions->save(); 
            return redirect('/back');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
