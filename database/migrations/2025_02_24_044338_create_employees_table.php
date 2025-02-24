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
            $table->date('joining_date')->default('2021-01-01')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('Employee_status', ['Internship', 'regular', 'Other'])->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->date('date_of_birth')->default('2021-01-01')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('supervisor_team_lead')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('branch_wing')->nullable();
            $table->string('finger_device_id')->nullable();
            $table->string('attendance_policy')->nullable();
            $table->string('rf_id')->unique()->nullable();
            $table->string('leave_approver')->nullable();
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
