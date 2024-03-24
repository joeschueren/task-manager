<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Session;
use App\Models\Task;
use App\Models\Member;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware(CheckAuth::class);
    }

    public function createTask(Request $request){

        $email = Session::get('email');

        Log::info($email);

        $member = Member::where('email', $email)->first();

        $deadline = Carbon::now()->addDays((int)$request->timeFrame);

        Task::create([
            'team_id' => $member->team_id,
            'creator_email' => $member->email,
            'task_name' => $request->taskName,
            'importance' => $request->importance,
            'deadline' => $deadline,
            'is_completed' => false
        ]);
    }


}
