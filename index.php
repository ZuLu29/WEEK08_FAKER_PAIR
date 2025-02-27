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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding: 20px;
        }

        .profile-card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Profile Generator</h1>
        <form action="index.php" method="GET" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="number" class="col-form-label">Enter the number of profiles to generate:</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="number" class="form-control" min="1" max="100" value="<?php echo $numProfiles; ?>" />
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php
            foreach ($profiles as $profile) {
                echo '<div class="col-md-4 profile-card">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $profile['full_name'] . '</h5>';
                echo '<p class="card-text"><strong>Email:</strong> ' . $profile['email'] . '</p>';
                echo '<p class="card-text"><strong>Phone Number:</strong> ' . $profile['phone_number'] . '</p>';
                echo '<p class="card-text"><strong>Address:</strong> ' . $profile['address'] . '</p>';
                echo '<p class="card-text"><strong>Birthdate:</strong> ' . $profile['birthdate'] . '</p>';
                echo '<p class="card-text"><strong>Job Title:</strong> ' . $profile['job_title'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>