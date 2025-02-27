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
  <?php
  foreach ($profiles as $profile) {
    echo "Full Name: " . $profile['full_name'] . "\n";
    echo "Email: " . $profile['email'] . "\n";
    echo "Phone Number: " . $profile['phone_number'] . "\n";
    echo "Address: " . $profile['address'] . "\n";
    echo "Birthdate: " . $profile['birthdate'] . "\n";
    echo "Job Title: " . $profile['job_title'] . "\n";
    echo "--------------------------\n";
  }
  ?>
</body>

</html>