<?php
require ('vendor/autoload.php');

$faker = Factory::create();
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
</head>
<body>
    
</body>
</html>

