<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::paginate(14);
        return view('Pages.Users', [
            'Users' => $Users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        User::insert([
            'FullName' => $Request->FullName,
            'Email' => $Request->Email,
            'Password' => $Request->Password,
            'Role' => $Request->Role,
            'Department' => $Request->Department,
            'Position' => $Request->Position,
        ]);
        return redirect()->route('Users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $Request, $Id)
    {
        User::where('id', $Id) 
        ->update([
            'FullName' => $Request->FullName,
            'Email' => $Request->Email,
            'Password' => $Request->Password,
            'Role' => $Request->Role,
            'Department' => $Request->Department,
            'Position' => $Request->Position,
        ]);
        return redirect()->route('Users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        User::find($id)->delete();
        return redirect()->route('Users');
    }
}
