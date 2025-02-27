<?php
require('vendor/autoload.php');
$faker = Faker\Factory::create('en_PH');

$genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];

$books = [];

for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => $faker->sentence(3),
        'author' => $faker->name,
        'genre' => $genres[array_rand($genres)],
        'publication_year' => rand(1900, 2024),
        'isbn' => $faker->isbn13,
        'summary' => $faker->paragraph,
    ];
}

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
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['genre']); ?></td>
                        <td><?php echo htmlspecialchars($book['publication_year']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                        <td><?php echo htmlspecialchars($book['summary']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

</body>

</html>