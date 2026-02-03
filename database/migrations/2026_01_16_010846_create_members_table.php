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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('full_name')->virtualAs("concat_ws(' ', first_name, last_name, suffix)");
            $table->string('suffix')->nullable();
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('marital_status');
            $table->string('complete_address');
            $table->string('email_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('facebook_account')->nullable();
            $table->string('occupation');
            $table->enum('membership_status', ['Active', 'Inactive', 'Transferred']);
            $table->date('membership_date');
            $table->date('baptism_date');
            $table->text('baptism_location');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone_no');
            $table->string('emergency_contact_relation');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();  // registered by
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
