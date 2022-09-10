<?php

namespace App\Http\Controllers;

use App\Models\famillies;
use App\Models\tasks;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;


class FamilliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user=Auth::user();
        $members =  DB::table('users')->where('familly_id','=',Auth::user()->familly_id)->whereNotNull('familly_id')->get();
        return view("famillies.myFamilly",compact('members','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('famillies.create');
    }
    public function createTask()
    {
        return view('famillies.createFamillyTask');
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

            'name'=>'required|String',

        ]);

       $familly= famillies::create([

            'name' => $request->name,
        ]);

        $user = User::find(Auth::user()->id);
        $user->update([
            'familly_id' => $familly->id,

        ]);

        return redirect()->route('famillies.index');
    }
    public function storeTask(Request $request)
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
            'user-id'  =>Auth::user()->id,
            'familly_id'=>Auth::user()->familly_id


        ]);
        return redirect()->route('famillies.show');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\famillies  $famillies
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $familly_id=Auth::user()->familly_id;
        $tasks =  DB::table('tasks')->where('familly_id', Auth::user()->familly_id)->where('date','=',Carbon::now()->toDateString())->whereNotNull('familly_id')->get();
        $tasks1 =  DB::table('tasks')->where('familly_id', Auth::user()->familly_id)->where('date','>',Carbon::now()->toDateString())->whereNotNull('familly_id')->get();
        $tasks2 =  DB::table('tasks')->where('familly_id', Auth::user()->familly_id)->where('date','<',Carbon::now()->toDateString())->whereNotNull('familly_id')->get();


        return view('famillies.show',compact('tasks','familly_id','tasks1','tasks2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\famillies  $famillies
     * @return \Illuminate\Http\Response
     */
    public function edit(famillies $famillies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\famillies  $famillies
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, famillies $famillies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\famillies  $famillies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $familly= famillies::findOrFail($id);
        $familly->delete();
        return redirect()->route('famillies.index');
    }

    // form to add new member to familly
    public function addMember()
    {
        return view('famillies.addMember');
    }
    // adding member logic
    public function insertMember(Request $request)
    {

        $request->validate([

            'email'=>'required|Email|exists:users,email',

        ]);


        $user=DB::table('users')->where('email','=',$request->email);



        $user->update([
            'familly_id' => Auth::user()->familly_id,

        ]);

        return redirect()->route('famillies.index');
    }
    public function   kick($id){

        $user= User::findOrFail($id);
        $user->update([
            'familly_id' => NULL,

        ]);
        return redirect()->route('famillies.index');

    }

}
