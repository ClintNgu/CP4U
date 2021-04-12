<?php include APP_ROOT . "/views/includes/header.php"; ?>

<?php

if (!isset($_SESSION["User"])) {
  echo "Error: No Account is Logged in";
} else {
  $user = $_SESSION["User"];
?>

  <div class="profile-container-div">
    <div class="profile-info-section">
      <img class="profile-image" src="https://365psd.com/images/istock/previews/1009/100996291-male-avatar-profile-picture-vector.jpg" alt="avatar-template">
      <br>
      <label class="name-label"><?= $user["fname"] . " " . $user["lname"]; ?></label>
      <br>
      <label class="username-label"><?= $user["username"]; ?></label>
      <br>
      <label class="address-label"><?= $user["street"]; ?></label>
      <br>
      <button class="edit-profile-button p-2 d-block mt-4 btn btn-dark"><span>Change Password</span></button>
    </div>
    <div class="edit-section-div">
      <form method="post">
        <div class="p-2">
          <input class="form-control" type="text" placeholder="Password" name="password">
        </div>
        <div class="p-2">
          <input class="form-control" type="text" placeholder="Confirm Password" name="confirmPassword">
        </div>
        <div class="p-2">
          <span class='alert-danger ms-3'> <?= $data['emptyPassword'] ?? '' ?> </span>
          <span class='alert-success ms-3'> <?= $data['successChange'] ?? '' ?> </span>
        </div>
        <div class="p-3">
          <button type="submit" class="save-button" name="saveButton">Save Changes</button>
          <button type="submit" class="cancel-button" name="cancelButton">Cancel</button>
        </div>
      </form>
    </div>
    <button type="submit" class="proflie-delete-button" name="deleteButton"><span>Delete Profile</span></button>
  </div>
<?php
}
?>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>