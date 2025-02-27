<?php
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid; // For UUID generation
use Faker\Factory; // For fake data generation

$faker = Factory::create('en_PH');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeBooks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
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
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($faker->word(3)); ?></td> <!-- Book Title -->
                        <td><?php echo htmlspecialchars($faker->name); ?></td> <!-- Author -->
                        <td><?php echo htmlspecialchars($faker->word); ?></td> <!-- Genre -->
                        <td><?php echo htmlspecialchars($faker->year); ?></td> <!-- Publication Year -->
                        <td><?php echo htmlspecialchars($faker->isbn13); ?></td> <!-- ISBN -->
                        <td><?= htmlspecialchars(implode(' ', $faker->words(10))) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>