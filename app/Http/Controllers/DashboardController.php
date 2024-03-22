<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class DashboardController extends Controller{

    public function __construct(){
        $this->middleware(CheckAuthentication::class);
    }

    public function getDashboardData(Request $request){

    }
}