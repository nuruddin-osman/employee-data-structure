@extends('layouts.employees')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold">Employee Details</h1>

            <ul class="space-y-2">
                        <li class="table_data"><strong>ID: </strong>{{ $employee->id }}</li>
                        <li class="table_data"><strong>employee id: </strong>{{ $employee->employee_id }}</li>
                        <li class="table_data"><strong>fullname: </strong>{{ $employee->full_name }}</li>
                        <li class="table_data"><strong>contactno: </strong>{{ $employee->contact_no }}</li>
                        <li class="table_data"><strong>joining date: </strong>{{ $employee->joining_date }}</li>
                        <li class="table_data"><strong>gender: </strong>{{ $employee->gender }}</li>
                        <li class="table_data"><strong>employee status: </strong>{{ $employee->employee_status }}</li>
                        <li class="table_data"><strong>marita lstatus: </strong>{{ $employee->marital_status }}</li>
                        <li class="table_data"><strong>religion: </strong>{{ $employee->religion }}</li>
                        <li class="table_data"><strong>date of birth: </strong>{{ $employee->date_of_birth }}</li>
                        <li class="table_data"><strong>username: </strong>{{ $employee->user_name }}</li>
                        <li class="table_data"><strong>department: </strong>{{ $employee->department }}</li>
                        <li class="table_data"><strong>designation: </strong>{{ $employee->designation }}</li>
                        <li class="table_data"><strong>email: </strong>{{ $employee->email }}</li>
                        <li class="table_data"><strong>supervisor team lead: </strong>{{ $employee->supervisor_team_lead }}</li>
                        <li class="table_data"><strong>blood group: </strong>{{ $employee->blood_group }}</li>
                        <li class="table_data"><strong>branch wing: </strong>{{ $employee->branch_wing }}</li>
                        <li class="table_data"><strong>fingerdevice id: </strong>{{ $employee->finger_device_id }}</li>
                        <li class="table_data"><strong>attendance policy: </strong>{{ $employee->attendance_policy }}</li>
                        <li class="table_data"><strong>rfid: </strong>{{ $employee->rf_id }}</li>
                        <li class="table_data"><strong>leave approver: </strong>{{ $employee->leave_approver }}</li>
            </ul>

            <a href="{{ route('employees.index') }}" class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600">
                Back to Employees
            </a>
        </div>
    </div>
@endsection
