<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {



        // $activities = Activity::included()->filter()->sort();
        $activities = Activity::all();
        // ->with('image', 'role')->get();

        return $activities;
    }


    // public function create()
    // {

    //     $roles = Role::all();
    //     return view('users.create', ['role' => $roles]);
    // }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',
        ]);

        $activity = Activity::create($request->all());

        return $activity;
    }


    public function show($id)
    {

        $activity = Activity::included()->findOrFail($id);
        // $activity = Activity::with('role', 'image')->find($id);
        return $activity;
    }


    // public function edit(Activity $activity)
    // {

    //     $roles = Role::all();
    //     return view('users.edit', compact('user'), ['role' => $roles]);
    // }


    public function update(Request $request, Activity $activity)
    {



        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',

        ]);

        $activity->update($request->all());

        return $activity;
    }



    public function destroy(Activity $activity)
    {

        $activity->delete();
        // return redirect()->route('users.index');
        return "Borrado";
    }
}
