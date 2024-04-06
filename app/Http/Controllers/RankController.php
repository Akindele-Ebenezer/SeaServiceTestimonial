<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $Request)
    {
        \DB::table('ranks')->insert([
            'Rank' => $Request->Rank, 
        ]);
        return redirect()->route('Employees');
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
    public function update(Request $Request, string $id)
    {  
        \DB::table('ranks')->where('id', $id)->update([
            'Rank' => $Request->Position, 
        ]);
        return redirect()->route('Employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \DB::table('ranks')->where('id', $id)->delete();
        return redirect()->route('Employees');
    }
}
