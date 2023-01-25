<div class="profile-container">
<div class="profile-header">
    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile picture">
    <h1><?php echo $user['name']; ?></h1>
</div>
<div class="profile-details">
    <p>Email : <?php echo $user['email']; ?></p>
    <p>Date d'inscription : <?php echo $user['registration_date']; ?></p>
</div>
