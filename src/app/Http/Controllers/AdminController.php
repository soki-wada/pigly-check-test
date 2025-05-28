<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LogRequest;
use App\Http\Requests\TargetRequest;

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

    public function search(Request $request){
        $user = Auth::user();
        $target = $user->target;
        $weight = $user->logs()->latest('date')->first();
        $goal = $weight->weight - $target->target_weight;
        $logs = $user->logs()->DateSearch($request->olderDate, $request->newerDate)->latest('date')->Paginate(8)->appends($request->only(['olderDate', 'newerDate']));
        $olderDate = $request->olderDate;
        $newerDate = $request->newerDate;
        $sum = count($logs);
        return view('admin', compact('target', 'weight', 'goal', 'logs', 'olderDate', 'newerDate', 'sum'));
    }

    public function setting(){
        $user = Auth::user();
        $target = $user->target->target_weight;
        return view('update', compact('target'));
    }

    public function targetUpdate(TargetRequest $request){
        $user = Auth::user();
        $target = $user->target;
        $target->update(['target_weight' => $request->target_weight]);
        return redirect('/weight_logs');
    }

    public function store(LogRequest $request){
        $logs = $request->all();
        $logs['user_id'] = Auth::user()->id;
        WeightLog::create($logs);
        return redirect('/weight_logs');
    }

    public function detail($weightLogId){
        $log = WeightLog::find($weightLogId);
        return view('detail', compact('log'));
    }

    public function update(LogRequest $request){
        $log = WeightLog::find($request->id);
        $log -> update($request->all());
        return redirect('/weight_logs');
    }

    public function destroy(Request $request){
        WeightLog::find($request->id)->delete();
        return redirect('/weight_logs');
    }
}
