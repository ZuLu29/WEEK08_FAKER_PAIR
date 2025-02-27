<?php

require("vendor/autoload.php");

$faker = Faker\Factory::create('en_PH');

function generateProfile($faker)
{
    $jobTitles = [
        'Software Engineer',
        'Teacher',
        'Accountant',
        'Nurse',
        'Doctor',
        'Sales Manager',
        'Graphic Designer',
        'Marketing Specialist',
        'Customer Service Representative',
        'Data Analyst',
    ];
    $profile = [
        'full_name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'birthdate' => $faker->date('Y-m-d'),
        'job_title' => $faker->randomElement($jobTitles),
    ];
    $profile['phone_number'] = preg_replace('/^0/', '+63 ', $profile['phone_number']);

    return $profile;
};
$profiles = [];
for ($i = 0; $i < 3; $i++) {
    $profiles[] = generateProfile($faker);
}
foreach ($profiles as $profile) {
    echo "Full Name: " . $profile['full_name'] . "\n";
    echo "Email: " . $profile['email'] . "\n";
    echo "Phone Number: " . $profile['phone_number'] . "\n";
    echo "Address: " . $profile['address'] . "\n";
    echo "Birthdate: " . $profile['birthdate'] . "\n";
    echo "Job Title: " . $profile['job_title'] . "\n";
    echo "--------------------------\n";
}
