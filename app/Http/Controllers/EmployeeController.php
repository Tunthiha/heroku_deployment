<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Type;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with('type')->get();
        return response()->json(['employee'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => "required",
            'type_id'=>"required"
        ]);
        Employee::create([
            'name' => $request->name,
            'type_id'=>$request->type_id
        ]);
        $employee = Employee::with('type')->get();
        return response()->json(['employee'=>$employee]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => "required",
            'type_id'=>"required",
        ]);
        $employe = Employee::where('id',$request->id);
        $employe->update([
        'type_id' => $request->type_id,
        'name' => $request->name,
        ]);
        $employee = Employee::with('type')->get();
        return response()->json(['employee'=>$employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Employee::where('id', $request->id)->delete();
        $employee = Employee::with('type')->get();
        return response()->json(['employee'=>$employee]);

    }
}
