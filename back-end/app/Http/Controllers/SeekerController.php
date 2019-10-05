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

    public function profile()
    {
        return view('profileForm');
    }

    public function processProfile(Request $data)
    {
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;

        //resume pdf upload
        $name = $data['resume']->getClientOriginalName();
        $file = (object)$data['resume'];
        $file->move(public_path().'/files/',$name);
        
        $seeker = new Seeker();

        $seeker->user_id = $user_id;
        $seeker->resume = $name;
        $seeker->skills = $data['skills'];
        $seeker->save();

        return redirect('/home');
    }

    public function updateProfile()
    {
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;
        /*return $user_id;*/

        $seeker = User::find($user_id)->seeker;
        /*return $seeker;*/
        if($seeker==null)
        {
            return redirect('/profile');
        }

        return view('updateProfileForm')->with('seeker',$seeker);
    }

    public function processUpdateProfileForm(Request $data, $id)
    {
        $seeker = Seeker::find($id);

        $data = $data->all();

        $seeker->resume = $data['resume'];
        $seeker->skills = $data['skills'];
        $seeker->save();

        return redirect('/jobHome');
    }

    public function jobHome()
    {
        $jobs = Job::all();

        return view('jobHome')->with('jobs',$jobs);
    }

    public function downloadResume()
    {
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;

        $seeker = User::find($user_id)->seeker;
        $name = $seeker->resume;

        $file = public_path().'/files/'.$name;
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file,$name,$headers);
    }
}
