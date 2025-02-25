<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = employee::all(); // Shudhu active data
        return view('employees.index', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

   // SoftDeleted method: Shudhu soft delete kora data dekhabe
   public function softDeleted()
   {
       $employees = employee::onlyTrashed()->get(); // Shudhu soft delete kora data
       return view('employees.softDeleted', compact('employees'));
   }


   // Soft delete korar jonno
   public function destroy(employee $employee)
   {
       $employee->delete(); // Soft delete korbe
       return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
   }

   // Restore korar jonno
   public function restore($id)
   {
       $employee = employee::withTrashed()->find($id); // Soft delete kora record khuje ber korbe
       $employee->restore(); // Restore korbe
       return redirect()->route('employees.index')->with('success', 'Employee restored successfully.');
   }


   // Permanently delete korar jonno
   public function forceDelete($id)
   {
       $employee = employee::withTrashed()->find($id); // Soft delete kora record khuje ber korbe
       $employee->forceDelete(); // Permanently delete korbe
       return redirect()->route('employees.index')->with('success', 'Employee permanently deleted.');
   }



}
