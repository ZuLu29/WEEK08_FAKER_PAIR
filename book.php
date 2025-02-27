<?php
require ('vendor/autoload.php');
$faker = Faker\Factory::create('en_PH');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeBooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <h1 class="mb-4">Books</h1>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>ISBN</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=1; $i<=10; $i++) ?>
                <tr>
                    <td><?php echo htmlspecialchars($faker->uuid()); ?></td>
                    <td><?php echo htmlspecialchars($faker->name); ?></td>
                    <td><?php echo htmlspecialchars($faker->email); ?></td>
                    <td><?php echo htmlspecialchars(explode('@', $faker->)[0]); ?></td>
                    <td><?php echo htmlspecialchars($faker->sha256()); ?></td>
                    <td><?php echo htmlspecialchars($faker->dateTimeBetween('-2years', 'now')->format('Y-m-d')); ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

