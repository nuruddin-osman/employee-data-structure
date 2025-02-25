
@extends('layouts.employees')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Soft Deleted Employees</h1>


        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="table_head">ID</th>
                        <th class="table_head">employee id</th>
                        <th class="table_head">full name</th>
                        <th class="table_head">contact no</th>
                        <th class="table_head">joining date</th>
                        <th class="table_head">gender</th>
                        <th class="table_head">employee status</th>
                        <th class="table_head">marital status</th>
                        <th class="table_head">religion</th>
                        <th class="table_head">date of birth</th>
                        <th class="table_head">user name</th>
                        <th class="table_head">department</th>
                        <th class="table_head">designation</th>
                        <th class="table_head">email</th>
                        <th class="table_head">supervisor team lead</th>
                        <th class="table_head">blood group</th>
                        <th class="table_head">branch wing</th>
                        <th class="table_head">finger device id</th>
                        <th class="table_head">attendance policy</th>
                        <th class="table_head">rf id</th>
                        <th class="table_head">leave approver</th>
                        <th class="table_head">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($employees as $employee)
                    <tr class="hover:bg-gray-50">
                        <td class="table_data">{{ $employee->id }}</td>
                        <td class="table_data">{{ $employee->employee_id }}</td>
                        <td class="table_data">{{ $employee->full_name }}</td>
                        <td class="table_data">{{ $employee->contact_no }}</td>
                        <td class="table_data">{{ $employee->joining_date }}</td>
                        <td class="table_data">{{ $employee->gender }}</td>
                        <td class="table_data">{{ $employee->employee_status }}</td>
                        <td class="table_data">{{ $employee->marital_status }}</td>
                        <td class="table_data">{{ $employee->religion }}</td>
                        <td class="table_data">{{ $employee->date_of_birth }}</td>
                        <td class="table_data">{{ $employee->user_name }}</td>
                        <td class="table_data">{{ $employee->department }}</td>
                        <td class="table_data">{{ $employee->designation }}</td>
                        <td class="table_data">{{ $employee->email }}</td>
                        <td class="table_data">{{ $employee->supervisor_team_lead }}</td>
                        <td class="table_data">{{ $employee->blood_group }}</td>
                        <td class="table_data">{{ $employee->branch_wing }}</td>
                        <td class="table_data">{{ $employee->finger_device_id }}</td>
                        <td class="table_data">{{ $employee->attendance_policy }}</td>
                        <td class="table_data">{{ $employee->rf_id }}</td>
                        <td class="table_data">{{ $employee->leave_approver }}</td>
                        <td class="table_data">
                            <!-- Restore korar button -->
                            <form action="{{ route('employees.restore', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="inline-flex px-3 py-1.5 text-white bg-blue-500 rounded transition-colors duration-200 hover:bg-green-600">Restore</button>
                            </form>

                            <!-- Permanently delete korar button -->
                            <form action="{{ route('employees.forceDelete', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 text-white bg-red-500 rounded transition-colors duration-200 hover:bg-red-600" onclick="return confirm('Are you sure you want to permanently delete this employee?')">Permanently Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($employees->isEmpty())
                <div class="py-8 text-center text-gray-500">
                    No employees found.
                </div>
            @endif
        </div>
    </div>
@endsection
