<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('full_name');
            $table->string('contact_no');
            $table->date('joining_date')->default('2021-01-01');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('Employee_status', ['Internship', 'regular', 'Other']);
            $table->string('marital_status');
            $table->string('religion');
            $table->date('date_of_birth')->default('2021-01-01');
            $table->string('user_name')->unique();
            $table->string('department');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('supervisor_team_lead');
            $table->string('blood_group');
            $table->string('branch_wing');
            $table->string('finger_device_id')->nullable();
            $table->string('attendance_policy');
            $table->string('rf_id')->unique();
            $table->string('leave_approver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
