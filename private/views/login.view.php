<!-- ===========================footer=================================== -->
<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>


<div class="m-auto w-25 shadow mt-5 p-4">

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
      <input type="email" value="<?= isValueSet("email") ?>" class="form-control" name="email" placeholder=" Email">
    </div>
    <div class="mb-2">
      <input type="password" value="<?= isValueSet("password") ?>" class="form-control" name="password" placeholder=" Password">
    </div>

    <div class="mb-3 form-group">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remember me</label>
    </div>

    <div class="mb-3 form-group">
      <input type="submit" class="form-control btn btn-success" value="Login">
    </div>
    <div class="mb-3">
      <a href="<?= ROOT ?>signup">SignUp</a>
    </div>

  </form>


</div>



<!-- ===========================footer=================================== -->
<?php $this->view('includes/footer') ?>