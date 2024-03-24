<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use App\Models\Task;
use App\Models\Team;

class DashboardController extends Controller{

    public function __construct(){
        $this->middleware(CheckAuth::class);
    }

    public function getDashboardData(Request $request){

        $email = Session::get('email');

        $member = Member::where('email', $email)->firstOrFail();

        $team = null;
        
        if($member->team_id){
            $team = Team::findOrFail('id', $member->team_id);
        }

        $tasks = null;

        if($team){
            $tasks = Task::where('team_id', $team->id)->get();
        }
        else{
            $tasks = Task::where('creator_email', $email)->get();
        }


        $response = (object) [
            'member_info' => $member,
            'team_info' => $team,
            'tasks' => $tasks
        ];

        return response()->json($response);
    }
}