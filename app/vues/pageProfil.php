<?php require "styles/dashboard.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Netflix</title>
  <link rel="stylesheet" href="style.css">
</head>
    <div class="profile-container">
    <div class="profile-header">
        <img src="<?php echo $user['profile_picture']; ?>" alt="Profile picture">
        <h1><?php echo $user['name']; ?></h1>
    </div>
    <div class="profile-details">
        <p>Email : <?php echo $user['email']; ?></p>
        <p>Date d'inscription : <?php echo $user['registration_date']; ?></p>
    </div>
    </div>
</body>
</html>
