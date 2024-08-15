<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        

        $agentCount = Agent::count();
        $shiftsDuJour = Shift::whereDate('date', Carbon::today())->get();
        return view('home', compact('agentCount',"shiftsDuJour"));
    }
}
