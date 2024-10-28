<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>




<div class="container-fluid w-75 mt-3 shadow p-3 " style="background: #f0f0f0;">
    <?php $this->view('includes/breadcrumbs') ?>
    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>
    <form class="d-flex">
        <div class="input-group m-3 w-25">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </form>
    <a href="<?= ROOT ?>signup?mode=students" class="btn btn-primary float-end">Add Student</a>
    <h2>Staff Profile</h2>


    <?php if (!empty($rows)): ?>
        <div class="card-group justify-content-center align-items-center">
            <?php foreach ($rows as $row):
                $image = getImage($row->image, $row->gender);

            ?>


                <div class="card m-2 shadow border-0" style="max-width: 15rem; min-height:15rem">
                    <img src="<?= $image ?>" class=" img-fluid card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Name:<span class=" text-muted fs-6"> <?= $row->first_name . " " . $row->last_name ?></span></h5>
                        <p class="card-text">Rank: <?= str_replace('_', ' ', ucfirst($row->rank)) ?></p>
                        <a href="<?= ROOT ?>profile/<?= $row->user_id ?>" class="btn btn-primary">Profile</a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>

    <?php else: ?>
        <div class="text-center">
            <h3>No records found for students</h3>
        </div>
    <?php endif ?>







</div>
<?php $this->view('includes/footer') ?>