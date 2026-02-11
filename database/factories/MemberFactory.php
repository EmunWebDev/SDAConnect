<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        $first = fake()->firstName();
        $last  = fake()->lastName();

        return [
            'image' => null,
            'first_name' => $first,
            'middle_name' => fake()->optional()->firstName(),
            'last_name' => $last,
            'suffix' => null,

            // full_name is NOT included; it will be set by Member::booted()

            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'marital_status' => fake()->randomElement(['Single', 'Married', 'Widowed', 'Separated']),
            'complete_address' => fake()->address(),
            'email_address' => fake()->unique()->safeEmail(),
            'phone_no' => '09' . fake()->numerify('#########'),
            'facebook_account' => strtolower($first . $last),
            'occupation' => fake()->jobTitle(),
            'membership_status' => fake()->randomElement(['Active', 'Inactive', 'Transferred']),
            'membership_date' => fake()->date(),
            'baptism_date' => fake()->optional()->date(),
            'baptism_location' => fake()->city(),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_phone_no' => '09' . fake()->numerify('#########'),
            'emergency_contact_relation' => fake()->randomElement(['Father', 'Mother']),
            'user_id' => 1,
        ];
    }
}
