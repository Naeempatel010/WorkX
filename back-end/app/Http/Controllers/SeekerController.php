<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\Seeker;
use App\Startup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeekerController extends Controller
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

    public function jobApplication()
    {
    	return view('applicationForm');
    }

    public function jobHome()
    {
        $jobs = Job::all();

        return view('jobHome')->with('jobs',$jobs);
    }
}
