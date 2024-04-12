<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $Request)
    {
        $Users = User::paginate(14);
        $Employees = Employee::orderBy('EmployeeId', 'DESC')->paginate(14);
        
        if(isset($Request->FilterValue)) {  
            $Users = User::where('FullName', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Email', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Department', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Position', 'LIKE', '%' . $Request->FilterValue . '%')
                            ->orWhere('Role', 'LIKE', '%' . $Request->FilterValue . '%') 
                            ->orderBy('id', 'DESC')
                            ->paginate(14);
                      
            return view('Pages.Users', [
                'Users' => $Users,
                'Employees' => $Employees,
            ]);
        }

        return view('Pages.Users', [
            'Users' => $Users,
            'Employees' => $Employees,
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
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        User::find($id)->delete();
        return back(); 
    }
}
