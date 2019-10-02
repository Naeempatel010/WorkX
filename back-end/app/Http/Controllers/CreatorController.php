<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Creator;
use App\Idea; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatorController extends Controller
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

    public function ideaHome()
    {
        $ideas = Idea::all();
        return view('ideaHome')->with('ideas',$ideas);
        /*dd($ideas);*/
    }

    public function idea()
    {
    	return view('ideaForm');
    }

    public function postIdea(Request $data)
    {
    	//retrieve logged in user's id
        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;
        //return ($loggedInUser);

        //find creator's id for the logged in user
        $creators = DB::table('creators')->where('user_id',$user_id)->get();
        $flag = 0;
        foreach($creators as $creator)
        {
        	if($creator->user_id==$user_id)
        	{
        		$creator_id = $creator->id;
        		$flag=1;
        		break;		
        	}
        }

        //if user has not been assigned a creator id
        if($flag==0)
        {
        	//add user's id to the creator table
        	$new_creator = new Creator();
        	$new_creator->user_id = $user_id;
        	$new_creator->save();  
        	//return ($new_creator);
        	$creator_id = $new_creator->id;
        }


        //add form data in ideas table
        $data = $data->all();

        $idea = new Idea();
        $idea->creator_id = $creator_id;
        $idea->title = $data['title'];
        $idea->description = $data['description'];
        $idea->poc = $data['poc'];
        $idea->investment = $data['investment'];
        $idea->status = 'No Investment yet.';
        $idea->save();
        /*return $data;*/
        return redirect('/ideaHome');
    }
}
