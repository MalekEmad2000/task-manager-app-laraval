<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required|String',
            'description'=>'required|String',
            'date'=>'required|after:yesterday'
        ]);

        Tasks::create([

            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'user-id'  =>Auth::user()->id


        ]);
        return redirect()->route('tasks.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $name=DB::table('users')->where('id',Auth::user()->id)->first();
        $tasks =  DB::table('tasks')->where('user-id', Auth::user()->id)->where('date','=',Carbon::now()->toDateString())->whereNull('familly_id')->get();
        $tasks1 =  DB::table('tasks')->where('user-id', Auth::user()->id)->where('date','>',Carbon::now()->toDateString())->whereNull('familly_id')->get();
        $tasks2 =  DB::table('tasks')->where('user-id', Auth::user()->id)->where('date','<',Carbon::now()->toDateString())->whereNull('familly_id')->get();
        return view('tasks.show',compact('tasks','name','tasks1','tasks2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$personal)
    {

        $task = tasks::findOrFail($id);
        return view('tasks.edit',compact('task','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$personal)
    {

        $request->validate([

            'title'=>'required|String',
            'description'=>'required|String',
            'date'=>'required|after:yesterday'
        ]);

        $task = tasks::find($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date
        ]);
        if($personal ==1)
        return redirect()->route('tasks.show');
        else
            return redirect()->route('famillies.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$personal)
    {
        $task= Tasks::findOrFail($id);
        $task->delete();
        if($personal==1)
        return redirect()->route('tasks.show');
        else
            return redirect()->route('famillies.show');
    }
}
