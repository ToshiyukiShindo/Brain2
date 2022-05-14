<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;//追記
use App\Http\Controllers\ChatsController;//追記
use App\Models\User;
use App\Models\Question;
use App\Models\Chat;
use Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allquestions = Question::latest('updated_at')->take(10)->get();
        $questions = Question::latest('updated_at')->where('user_id',Auth::user()->id)->take(5)->get();
        return view('home',compact('questions','allquestions'));
    }
    
        public function edit(User $user)
    {
        return view('useredit',compact('user'));
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
            'name' => 'required|max:255',
    ]);
            //バリデーション:エラー 
            if ($validator->fails()) {
                return redirect('/home')
                ->withInput()
                ->withErrors($validator);
            }
            
            // Eloquent モデル
            $users = User::find($request->id);
            $users->id = Auth::user()->id;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->manage_flag = $request->manage_flag;
            $users->answer_category = $request->answer_category;
            $users->updated_at = date_create($request->date);
            $users->save(); 
            return redirect('/back');
    }

    
    public function back()
    {
        return view('back');
    }
}
