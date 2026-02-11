<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        $first = $this->faker->firstName();
        $last = $this->faker->lastName();

        return [
            'image' => null,
            'first_name' => $first,
            'middle_name' => $this->faker->optional()->firstName(), // better than lastName
            'last_name' => $last,
            'suffix' => null,
            // don't include full_name; it will be set by Member::booted() saving hook

            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'marital_status' => $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Separated']),
            'complete_address' => $this->faker->address(),

            'email_address' => $this->faker->unique()->safeEmail(), // important
            'phone_no' => '09' . $this->faker->numerify('#########'),
            'facebook_account' => strtolower($first . $last),
            'occupation' => $this->faker->jobTitle(),
            'membership_status' => $this->faker->randomElement(['Active', 'Inactive', 'Transferred']),
            'membership_date' => $this->faker->date(),
            'baptism_date' => $this->faker->optional()->date(),
            'baptism_location' => $this->faker->city(),

            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone_no' => '09' . $this->faker->numerify('#########'),
            'emergency_contact_relation' => $this->faker->randomElement(['Father', 'Mother']),

            'user_id' => 1,
        ];
    }
}
