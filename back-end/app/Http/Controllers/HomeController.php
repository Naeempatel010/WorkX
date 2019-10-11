<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Investor;
use App\Review; 
use App\Conversation;
use Illuminate\Support\Facades\Auth;

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
    public function chatHome()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        $conversations = Auth::user()->conversations();
        return view('chatHome',compact('users','conversations'));
    }

    public function home()
    {
        return view('home');
    }
}
