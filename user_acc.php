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
