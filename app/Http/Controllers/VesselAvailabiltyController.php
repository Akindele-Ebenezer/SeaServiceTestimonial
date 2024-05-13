<?php

namespace App\Http\Controllers;

use App\Models\VesselAvailabilty;
use Illuminate\Http\Request;
use App\Models\Employee;

class VesselAvailabiltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->get();
        $Vessels = \DB::table('vessels_vessel_information')->get();
        $Ranks = \DB::table('ranks')->get();
        $Companies = \DB::table('companies')->orderBy('id', 'DESC')->get();
        return view('Pages.Availability', [
            'Employees' => $Employees,
            'Vessels' => $Vessels,
            'Ranks' => $Ranks,
            'Companies' => $Companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(VesselAvailabilty $vesselAvailabilty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VesselAvailabilty $vesselAvailabilty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VesselAvailabilty $vesselAvailabilty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VesselAvailabilty $vesselAvailabilty)
    {
        //
    }
}