<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>




<div class="container-fluid w-75 mt-3 shadow p-3 " style="background: #f0f0f0;">
    <?php $this->view('includes/breadcrumbs') ?>
    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>

    <div class=" w-25 m-auto justify-content-center align-items-center">
        <form method="POST">

            <h2 c>Add New Class</h2>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
                    <strong>Errors: </strong>
                    <?php foreach ($errors as $error): ?>
                        <br> <?= $error ?>
                    <?php endforeach ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="mb-2 d-flex">
                <input type="text" value="<?= isValueSet("class") ?>" class="form-control" name="school" placeholder="Class Name" autofocus>
                <input type="submit" class="btn btn-sm btn-primary " value="Create">
            </div>
        </form>
    </div>
</div>
<?php $this->view('includes/footer') ?>