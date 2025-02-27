<?php
require 'vendor/autoload.php';
$faker = Faker\Factory::create('en_PH');

$host = '127.0.0.1:3307';
$dbname = 'faker_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database Connected Successfully!<br>";


    $officeIds = [];
    for ($i = 0; $i < 50; $i++) {
        $stmt = $pdo->prepare("INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $faker->company,
            $faker->phoneNumber,
            $faker->companyEmail,
            $faker->address,
            $faker->city,
            'Philippines',
            $faker->postcode
        ]);
        $officeIds[] = $pdo->lastInsertId();
    }


    $employeeIds = [];
    for ($i = 0; $i < 200; $i++) {
        $randomOffice = $faker->randomElement($officeIds);
        $stmt = $pdo->prepare("INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $faker->lastName,
            $faker->firstName,
            $randomOffice,
            $faker->address
        ]);
        $employeeIds[] = $pdo->lastInsertId();
    }

    for ($i = 0; $i < 500; $i++) {
        $randomEmployee = $faker->randomElement($employeeIds);
        $randomOffice = $faker->randomElement($officeIds);
        $stmt = $pdo->prepare("INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $randomEmployee,
            $randomOffice,
            $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            $faker->randomElement(['Created', 'Updated', 'Deleted']),
            $faker->sentence,
            strtoupper($faker->bothify('DOC-####'))
        ]);
    }

    echo "Fake data successfully inserted!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
