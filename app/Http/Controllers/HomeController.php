<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ChatsController;//追記
use App\Models\User;
use App\Models\Question;
use App\Models\Chat;
use Auth;
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
        $questions = Question::latest('updated_at')->where('user_id',Auth::user()->id)->take(5)->get();
        return view('home',compact('questions'));
    }
    
    public function back()
    {
        return view('back');
    }
}
