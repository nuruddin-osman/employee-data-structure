@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Soft Deleted Employees</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>
                            <!-- Restore korar button -->
                            <form action="{{ route('employees.restore', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>

                            <!-- Permanently delete korar button -->
                            <form action="{{ route('employees.forceDelete', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete this employee?')">Permanently Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
