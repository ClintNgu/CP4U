<?php include_once APP_ROOT . '/views/includes/header.php'; ?>

<div class="profile-container-div">
  <img src="https://365psd.com/images/istock/previews/1009/100996291-male-avatar-profile-picture-vector.jpg" alt="avatar-template">
  <label>Name</label>
  <label>Username</label>
  <button class="edit-profile-button">Edit Profile</button>
  <div class="edit-section-div">
    <input class="form-control" type="text" placeholder="Username" name='username' value="<?= $data['username'] ?? '' ?>">

    <input class="form-control" type="text" placeholder="Address" name='address' value="<?= $data['address'] ?? '' ?>">

    <input class="form-control" type="text" placeholder="Password" name='password' value="<?= $data['password'] ?? '' ?>">
    <button>Save</button>
    <button>Cancel</button>
  </div>
</div>

<?php include_once APP_ROOT . '/views/includes/footer.php'; ?>