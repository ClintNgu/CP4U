<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="profile-container-div">
  <img class="profile-image" src="https://365psd.com/images/istock/previews/1009/100996291-male-avatar-profile-picture-vector.jpg" alt="avatar-template">
  <br>
  <label class="name-label">Name</label>
  <br>
  <label class="username-label">Username</label>
  <br>
  <button class='edit-profile-button p-2 d-block mt-4 btn btn-dark'><span>Edit Profile</span></button>
  <br>
  <div class="edit-section-div">
    <input class="form-control" type="text" placeholder="Username" name='username' value="<?= $data['username'] ?? '' ?>">
    <br>
    <input class="form-control" type="text" placeholder="Address" name='address' value="<?= $data['address'] ?? '' ?>">
    <br>
    <input class="form-control" type="text" placeholder="Password" name='password' value="<?= $data['password'] ?? '' ?>">
    <br>
    <input class="form-control" type="text" placeholder="Confirm Password" name='confirmPassword'>
    <br>
    <button class="save-button">Save</button>
    <button class="cancel-button">Cancel</button>
  </div>
</div>

<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>