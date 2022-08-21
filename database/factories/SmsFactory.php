<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SmsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'applicationId' => 'APP-1812264',
            'sourceAddress' =>  'APP-9864752',
            'aws_sent_sms_id' => $this->faker->unique()->randomNumber,
            'message' =>   'Et labore nostrum repellat tenetur facilis in quisquam. Ea et explicabo enim eveniet aut explicabo similique nulla.',
            'requestId' =>  '304.330.5912',
            'created_at' => $this->faker->dateTimeBetween('-2 days', '+0 days')
        ];
    }
}
