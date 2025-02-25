@extends('layouts.employees')

@section('content')

    <div class="container mx-auto">

        <h1 class="py-3 text-4xl font-bold text-center text-orange-600">Edit Employee</h1>
        <form class="p-6 bg-white rounded-lg shadow-md" action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <!-- Employee ID -->
                <div class="mb-1">
                    <label for="employee_id" class="block mb-1 text-sm font-bold text-gray-700">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" value="{{ $employee->employee_id }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('employee_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Full Name -->
                <div class="mb-1">
                    <label for="full_name" class="block mb-1 text-sm font-bold text-gray-700">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="{{ $employee->full_name }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('full_name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Contact Number -->
                <div class="mb-1">
                    <label for="contact_no" class="block mb-1 text-sm font-bold text-gray-700">Contact Number</label>
                    <input type="tel" id="contact_no" name="contact_no" value="{{ $employee->contact_no }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('contact_no')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Joining Date -->
                <div class="mb-1">
                    <label for="joining_date" class="block mb-1 text-sm font-bold text-gray-700">Joining Date</label>
                    <input type="date" id="joining_date" name="joining_date" value="{{ $employee->joining_date }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('joining_date')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Gender -->
                <div class="mb-1">
                    <label for="gender" class="block mb-1 text-sm font-bold text-gray-700">Gender</label>
                    <select id="gender" name="gender" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                        <option value="">Select Gender</option>
                        <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Employee Status -->
                <div class="mb-1">
                    <label for="employee_status" class="block mb-1 text-sm font-bold text-gray-700">Employee Status</label>
                    <select id="employee_status" name="employee_status" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                        <option value="">Select Status</option>
                        <option value="internship" {{ $employee->employee_status == 'internship' ? 'selected' : '' }}>InternShip</option>
                        <option value="regular" {{ $employee->employee_status == 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="other" {{ $employee->employee_status == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('employee_status')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Marital Status -->
                <div class="mb-1">
                    <label for="marital_status" class="block mb-1 text-sm font-bold text-gray-700">Marital Status</label>
                    <select id="marital_status" name="marital_status" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                        <option value="">Select Marital Status</option>
                        <option value="single" {{ $employee->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                        <option value="married" {{ $employee->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                    </select>
                    @error('marital_status')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Religion -->
                <div class="mb-1">
                    <label for="religion" class="block mb-1 text-sm font-bold text-gray-700">Religion</label>
                    <input type="text" id="religion" name="religion" value="{{ $employee->religion }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('religion')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-1">
                    <label for="date_of_birth" class="block mb-1 text-sm font-bold text-gray-700">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('date_of_birth')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-1">
                    <label for="user_name" class="block mb-1 text-sm font-bold text-gray-700">Username</label>
                    <input type="text" id="user_name" name="user_name" value="{{ $employee->user_name }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('user_name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Department -->
                <div class="mb-1">
                    <label for="department" class="block mb-1 text-sm font-bold text-gray-700">Department</label>
                    <input type="text" id="department" name="department" value="{{ $employee->department }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('department')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Designation -->
                <div class="mb-1">
                    <label for="designation" class="block mb-1 text-sm font-bold text-gray-700">Designation</label>
                    <input type="text" id="designation" name="designation" value="{{ $employee->designation }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('designation')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-1">
                    <label for="email" class="block mb-1 text-sm font-bold text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $employee->email }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Supervisor/Team Lead -->
                <div class="mb-1">
                    <label for="supervisor_team_lead" class="block mb-1 text-sm font-bold text-gray-700">Supervisor/Team Lead</label>
                    <input type="text" id="supervisor_team_lead" name="supervisor_team_lead" value="{{ $employee->supervisor_team_lead }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('supervisor_team_lead')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Blood Group -->
                <div class="mb-1">
                    <label for="blood_group" class="block mb-1 text-sm font-bold text-gray-700">Blood Group</label>
                    <input type="text" id="blood_group" name="blood_group" value="{{ $employee->blood_group }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('blood_group')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Branch/Wing -->
                <div class="mb-1">
                    <label for="branch_wing" class="block mb-1 text-sm font-bold text-gray-700">Branch/Wing</label>
                    <input type="text" id="branch_wing" name="branch_wing" value="{{ $employee->branch_wing }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('branch_wing')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Finger Device ID -->
                <div class="mb-1">
                    <label for="finger_device_id" class="block mb-1 text-sm font-bold text-gray-700">Finger Device ID</label>
                    <input type="text" id="finger_device_id" name="finger_device_id" value="{{ $employee->finger_device_id }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('finger_device_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Attendance Policy -->
                <div class="mb-1">
                    <label for="attendance_policy" class="block mb-1 text-sm font-bold text-gray-700">Attendance Policy</label>
                    <input type="text" id="attendance_policy" name="attendance_policy" value="{{ $employee->attendance_policy }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('attendance_policy')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- RF ID -->
                <div class="mb-1">
                    <label for="rf_id" class="block mb-1 text-sm font-bold text-gray-700">RF ID</label>
                    <input type="text" id="rf_id" name="rf_id" value="{{ $employee->rf_id }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('rf_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Leave Approver -->
                <div class="mb-1">
                    <label for="leave_approver" class="block mb-1 text-sm font-bold text-gray-700">Leave Approver</label>
                    <input type="text" id="leave_approver" name="leave_approver" value="{{ $employee->leave_approver }}" class="px-3 py-2 w-full rounded-lg border focus:outline-none focus:ring-0 focus:ring-blue-500">
                    @error('leave_approver')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 w-full text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-0 focus:ring-blue-500">
                    Update
                </button>
            </div>
        </form>
    </div>

@endsection
