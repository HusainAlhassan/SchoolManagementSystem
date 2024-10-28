<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>




<div class="container-fluid w-75 mt-3 shadow p-3 " style="background: #f0f0f0;">

    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>

    <?php if ($row): ?>
        <div class=" w-25 m-auto justify-content-center align-items-center">
            <form method="POST">

                <h2>Are sure you to want to delete?</h2>
                <div class="mb-2 d-flex">
                    <input type="text" value="<?= isValueSet("class", $row->class) ?>" class="form-control" name="class" placeholder="School Name" autofocus>
                    <input type="submit" class="btn btn-sm btn-primary " value="Delete">
                </div>
            </form>
        </div>



        <a href="<?= ROOT ?>classes " class="btn btn-sm btn-danger ">cancel</a>

    <?php endif ?>
</div>
<?php $this->view('includes/footer') ?>