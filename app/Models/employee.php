<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'full_name',
        'contact_no',
        'joining_date',
        'gender',
        'employee_status',
        'marital_status',
        'religion',
        'date_of_birth',
        'user_name',
        'department',
        'designation',
        'email',
        'supervisor_team_lead',
        'blood_group',
        'branch_wing',
        'finger_device_id',
        'attendance_policy',
        'rf_id',
        'joining_date',
        'date_of_birth',
        'leave_approver',
    ];
}

