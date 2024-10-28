<!-- ===========================header=================================== -->
<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>



<div class="m-auto w-25 shadow mt-3 p-4">

  <form method="POST">
    <h2 class="text-center"><img src="<?= ROOT ?>assets/images/logo.png" class="img-fluid" width="50px">
      <span>EDUFORD</span>
    </h2>
    <?php if (!empty($errors)): ?>
      <div class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
        <strong>Errors: </strong>
        <?php foreach ($errors as $error): ?>
          <br> <?= $error ?>
        <?php endforeach ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <div class="mb-2">
      <input type="text" value="<?= isValueSet("first_name") ?>" class="form-control" name="first_name" placeholder="First Name">
    </div>
    <div class="mb-2">
      <input type="text" value="<?= isValueSet("last_name") ?>" class="form-control" name="last_name" placeholder="Last Name">
    </div>
    <div class="mb-2">
      <select class="form-select" name="gender">
        <option <?= isSelectValueSet('rank', '') ?>> select gender</option>
        <option value="male" <?= isSelectValueSet('gender', 'male') ?>>Male</option>
        <option value="female" <?= isSelectValueSet('gender', 'female') ?>>Female</option>
      </select>
    </div>
    <div class="mb-2">
      <?php if ($mode === 'students'): ?>

        <input hidden value="student" class="form-control" name="rank" placeholder=" Email">

      <?php else: ?>

        <select class="form-select" name="rank">
          <option <?= isSelectValueSet('rank', '') ?>> select Rank</option>
          <option <?= isSelectValueSet('rank', 'student') ?> value="student">Student</option>
          <option <?= isSelectValueSet('rank', 'lecturer') ?> value="lecturer">Lecturer</option>
          <option <?= isSelectValueSet('rank', 'reception') ?> value="reception">Reception</option>
          <option <?= isSelectValueSet('rank', 'admin') ?> value="admin">Admin</option>

          <?php if (Auth::getRank() === "super_admin"): ?>
            <option <?= isSelectValueSet('rank', 'super_admin') ?> value="super_admin">Super Admin</option>
          <?php endif; ?>

        </select>
      <?php endif; ?>

    </div>

    <div class="mb-2">
      <input type="email" value="<?= isValueSet("email") ?>" class="form-control" name="email" placeholder=" Email">
    </div>
    <div class="mb-2">
      <input type="password" value="<?= isValueSet("password") ?>" class="form-control" name="password" placeholder=" Password">
    </div>
    <div class="mb-2">
      <input type="password" value="<?= isValueSet("password") ?>" class="form-control" name="confirm_password" placeholder="Confirm Password">
    </div>


    <div class="mb-2 form-group">
      <input type="submit" class=" btn btn-success" value="Sign up">
      <?php if ($mode === 'students'): ?>
        <a href="<?= ROOT ?>students" class="btn btn-danger float-end">Cancel</a>
      <?php else: ?>
        <a href="<?= ROOT ?>users" class="btn btn-danger float-end">Cancel</a>
      <?php endif; ?>
    </div>
    <a href="<?= ROOT ?>login">Login</a>
  </form>


</div>
<!-- ===========================footer=================================== -->
<?php $this->view('includes/footer') ?>