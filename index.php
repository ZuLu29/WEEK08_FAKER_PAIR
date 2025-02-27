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
$numProfiles = isset($_GET['number']) ? (int)$_GET['number'] : 3;

$profiles = [];
for ($i = 0; $i < $numProfiles; $i++) {
    $profiles[] = generateProfile($faker);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PROFILE GENERATOR</title>
</head>

<body>
    <form action="index.php">
        <label for="number">Enter the number of profile that you want to generate</label>
        <input type="number" name="number" min="1" max="100" value="<?php echo $numProfiles; ?>" />
        <input type="submit" value="generate" />
    </form>
    <div class="profiles">
        <?php
        foreach ($profiles as $profile) {
            echo '<div class="profile">';
            echo '<h3>' . $profile['full_name'] . '</h3>';
            echo '<p><strong>Email:</strong> ' . $profile['email'] . '</p>';
            echo '<p><strong>Phone Number:</strong> ' . $profile['phone_number'] . '</p>';
            echo '<p><strong>Address:</strong> ' . $profile['address'] . '</p>';
            echo '<p><strong>Birthdate:</strong> ' . $profile['birthdate'] . '</p>';
            echo '<p><strong>Job Title:</strong> ' . $profile['job_title'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>