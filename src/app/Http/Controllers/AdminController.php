<?php

namespace App\Http\Controllers;

use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $target = $user->target;
        $weight = $user->logs()->latest('date')->first();
        $goal = $weight->weight - $target->target_weight;
        $logs = $user->logs()->latest('date')->Paginate(8);
        return view('admin', compact('target', 'weight', 'goal', 'logs'));
    }

    public function setting(){
        $user = Auth::user();
        $target = $user->target->target_weight;
        return view('update', compact('target'));
    }
}
