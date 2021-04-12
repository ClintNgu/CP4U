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
      <form>
        <div class="form-group p-2">
          <input class="form-control" type="text" placeholder="Password" name="password">
        </div>
        <div class="form-group p-2">
          <input class="form-control" type="text" placeholder="Confirm Password" name="confirmPassword">
        </div>
        <div class="form-group p-3">
          <form method="post">
            <button type="submit" class="save-button" name="saveButton">Save Changes</button>
            <button class="cancel-button" name="cancelButton">Cancel</button>
          </form>
        </div>
      </form>
    </div>
    <button class="proflie-delete-button"><span>Delete Profile</span></button>
  </div>
<?php
}
?>

<?php include APP_ROOT . "/views/includes/footer.php"; ?>