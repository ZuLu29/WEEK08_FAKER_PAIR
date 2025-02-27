<?php
require("vendor/autoload.php");

use Ramsey\Uuid\Uuid;
use Faker\Factory;

$faker = Factory::create();

function generateEncryptedPassword()
{
    $password = bin2hex(random_bytes(8));
    return hash('sha256', $password);
}
function generateUserAccount($faker)
{
    $uuid = Uuid::uuid4()->toString();
    $fullName = $faker->name;
    $email = $faker->email;
    $username = strtolower(explode('@', $email)[0]);
    $password = generateEncryptedPassword();
    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

    return [
        'user_id' => $uuid,
        'full_name' => $fullName,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'account_created' => $accountCreated,
    ];
};
$userAccounts = [];
for ($i = 0; $i < 10; $i++) {
    $userAccounts[] = generateUserAccount($faker);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding: 20px;
        }

        table {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">User Accounts Table</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password (SHA-256)</th>
                    <th>Account Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($userAccounts as $user) {
                    echo '<tr>';
                    echo '<td>' . $user['user_id'] . '</td>';
                    echo '<td>' . $user['full_name'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['username'] . '</td>';
                    echo '<td>' . $user['password'] . '</td>';
                    echo '<td>' . $user['account_created'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>