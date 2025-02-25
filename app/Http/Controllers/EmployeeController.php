<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

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
    public function store(Request $request, FlasherInterface $flasher)
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

        flash()
        ->options([
            'timeout' => 2000, // 3 seconds
            'position' => 'top-right',
        ])
        ->success('New Employee Added Successfully');

        return redirect()->route('employees.index');
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
    public function update(Request $request, employee $employee, FlasherInterface $flasher)
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

        flash()
        ->options([
            'timeout' => 2000, // 3 seconds
            'position' => 'top-right',
        ])
        ->success('Employee updated successfully.');

        return redirect()->route('employees.index');
    }

   // SoftDeleted method: Shudhu soft delete kora data dekhabe
   public function softDeleted()
   {
       $employees = employee::onlyTrashed()->get(); // Shudhu soft delete kora data
       return view('employees.softDeleted', compact('employees'));
   }


   // Soft delete korar jonno
   public function destroy(employee $employee, FlasherInterface $flasher)
   {
       $employee->delete(); // Soft delete korbe

       flash()
       ->options([
           'timeout' => 2000, // 3 seconds
           'position' => 'top-right',
       ])
       ->success('Employee deleted successfully. You can restore it later.');

       return redirect()->route('employees.index');
   }

   // Restore korar jonno
   public function restore($id, FlasherInterface $flasher)
   {
       $employee = employee::withTrashed()->find($id); // Soft delete kora record khuje ber korbe
       $employee->restore(); // Restore korbe

       flash()
       ->options([
           'timeout' => 2000, // 3 seconds
           'position' => 'top-right',
       ])
       ->success('Employee restored successfully.');

       return redirect()->route('employees.index');
   }


   // Permanently delete korar jonno
   public function forceDelete($id, FlasherInterface $flasher)
   {
       $employee = employee::withTrashed()->find($id); // Soft delete kora record khuje ber korbe

       flash()
       ->options([
           'timeout' => 2000, // 3 seconds
           'position' => 'top-right',
       ])
       ->success('Employee permanently deleted.');

       $employee->forceDelete(); // Permanently delete korbe
       return redirect()->route('employees.index');
   }



}
