<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    public function definition(): array
    {
        $first = $this->faker->firstName();
        $last = $this->faker->lastName();

        return [
            'image' => null,
            'first_name' => $first,
            'middle_name' => $this->faker->lastName(),
            'last_name' => $last,
            'suffix' => null,
            // full_name is virtual, do NOT include it
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'marital_status' => $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Separated']),
            'complete_address' => $this->faker->address(),
            'email_address' => $this->faker->safeEmail(),
            'phone_no' => '09' . $this->faker->numerify('#########'), // 11 digits
            'facebook_account' => strtolower($first . $last),
            'occupation' => $this->faker->jobTitle(),
            'membership_status' => $this->faker->randomElement(['Active', 'Inactive', 'Transferred']),
            'membership_date' => $this->faker->date(),
            'baptism_date' => $this->faker->date(),
            'baptism_location' => $this->faker->city(),
            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone_no' => '09' . $this->faker->numerify('#########'),
            'emergency_contact_relation' => $this->faker->randomElement(['Father', 'Mother']),
            'user_id' => 1, // fixed
        ];
    }
}
