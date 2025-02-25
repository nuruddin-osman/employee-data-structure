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
        // Validation rules
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id|max:255',
            'full_name' => 'required|max:255',
            'contact_no' => 'required|max:20',
            'joining_date' => 'nullable|date',
            'gender' => 'required|in:male,female,other',
            'employee_status' => 'required|in:internship,regular,other',
            'marital_status' => 'nullable|in:single,married',
            'religion' => 'nullable|max:255',
            'date_of_birth' => 'required|date',
            'user_name' => 'required|unique:employees,user_name|max:255',
            'department' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'email' => 'required|email|unique:employees,email|max:255',
            'supervisor_team_lead' => 'nullable|max:255',
            'blood_group' => 'nullable|max:255',
            'branch_wing' => 'nullable|max:255',
            'finger_device_id' => 'nullable|max:255',
            'attendance_policy' => 'nullable|max:255',
            'rf_id' => 'nullable|max:255',
            'leave_approver' => 'nullable|max:255',
        ], [
            // Custom error messages
            'employee_id.required' => 'Employee ID is required.',
            'employee_id.unique' => 'Employee ID must be unique.',
            'full_name.required' => 'Full Name is required.',
            'contact_no.required' => 'Contact Number is required.',
            'joining_date.required' => 'Joining Date is required.',
            'gender.required' => 'Gender is required.',
            'employee_status.required' => 'Employee Status is required.',
            'marital_status.required' => 'Marital Status is required.',
            'religion.required' => 'Religion is required.',
            'date_of_birth.required' => 'Date of Birth is required.',
            'user_name.required' => 'Username is required.',
            'user_name.unique' => 'Username must be unique.',
            'department.required' => 'Department is required.',
            'designation.required' => 'Designation is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email must be unique.',
            'supervisor_team_lead.required' => 'Supervisor/Team Lead is required.',
            'blood_group.required' => 'Blood Group is required.',
            'branch_wing.required' => 'Branch/Wing is required.',
            'finger_device_id.required' => 'Finger Device ID is required.',
            'attendance_policy.required' => 'Attendance Policy is required.',
            'rf_id.required' => 'RF ID is required.',
            'leave_approver.required' => 'Leave Approver is required.',
        ]);

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

        // Validation rules
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id,' . $employee->id . ',id|max:255',
            'full_name' => 'required|max:255',
            'contact_no' => 'required|max:20',
            'joining_date' => 'nullable|date',
            'gender' => 'required|in:male,female,other',
            'employee_status' => 'required|in:internship,regular,other',
            'marital_status' => 'nullable|in:single,married',
            'religion' => 'nullable|max:255',
            'date_of_birth' => 'required|date',
            'user_name' => 'required|unique:employees,user_name,' . $employee->id . ',id|max:255',
            'department' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id . ',id|max:255',
            'supervisor_team_lead' => 'nullable|max:255',
            'blood_group' => 'nullable|max:255',
            'branch_wing' => 'nullable|max:255',
            'finger_device_id' => 'nullable|max:255',
            'attendance_policy' => 'nullable|max:255',
            'rf_id' => 'nullable|max:255',
            'leave_approver' => 'nullable|max:255',
        ], [
            // Custom error messages
            'employee_id.required' => 'Employee ID is required.',
            'employee_id.unique' => 'Employee ID must be unique.',
            'full_name.required' => 'Full Name is required.',
            'contact_no.required' => 'Contact Number is required.',
            'joining_date.required' => 'Joining Date is required.',
            'gender.required' => 'Gender is required.',
            'employee_status.required' => 'Employee Status is required.',
            'marital_status.required' => 'Marital Status is required.',
            'religion.required' => 'Religion is required.',
            'date_of_birth.required' => 'Date of Birth is required.',
            'user_name.required' => 'Username is required.',
            'user_name.unique' => 'Username must be unique.',
            'department.required' => 'Department is required.',
            'designation.required' => 'Designation is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email must be unique.',
            'supervisor_team_lead.required' => 'Supervisor/Team Lead is required.',
            'blood_group.required' => 'Blood Group is required.',
            'branch_wing.required' => 'Branch/Wing is required.',
            'finger_device_id.required' => 'Finger Device ID is required.',
            'attendance_policy.required' => 'Attendance Policy is required.',
            'rf_id.required' => 'RF ID is required.',
            'leave_approver.required' => 'Leave Approver is required.',
        ]);

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
