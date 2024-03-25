<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Session;
use App\Models\Team;
use App\Models\Member;

class TeamController extends Controller
{
    public function __construct(){
        $this->middleware(CheckAuth::class);
    }

    public function joinTeam(Request $request){

        $email = Session::get('email');

        $team = Team::where('invite_code', $request->teamCode)->first();

        $member = Member::where('email', $email)->first();

        if($team && $member){
            $member->team_id = $team->id;
            $member->save();

            return response()->json(['message' => 'Successfully Joined Team']);

        } else {
            return response()->json(['error' => 'Team Not Found']);
        }
    }
}
