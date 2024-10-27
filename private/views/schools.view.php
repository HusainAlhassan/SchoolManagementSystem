<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>




<div class="container-fluid w-75 mt-3 shadow p-3 " style="background: #f0f0f0;">

    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>

    <div class="card-group justify-content-center align-items-center">
        <h2>Schools List</h2>
        <table class="table table-bordered table-responsive table-light table-striped table-hover">
            <thead class=" table-primary">
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">School</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Date</th>
                    <th scope="col"><a href="<?= ROOT ?>schools/add" class="btn-sm btn btn-primary text-light"><i class="bi bi-plus fs-6"></i> Add New</a></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rows): ?>
                    <?php $sn = 1;
                    foreach ($rows as $row): ?>
                        <tr>
                            <th scope="row"><?= $sn ?></th>
                            <td><?= $row->school ?></td>
                            <td><?= $row->user->first_name . " " . $row->user->last_name ?></td>
                            <td><?= getDateFormat($row->date) ?></td>
                            <td>
                                <a href="<?= ROOT ?>schools/edit/<?= $row->id ?>"><i class="bi bi-pen btn btn-sm btn-warning"></i></a>
                                <a href="<?= ROOT ?>schools/delete/<?= $row->id ?>"><i class="bi bi-trash btn btn-sm btn-danger"></i></a>
                                <a href="<?= ROOT ?>switch_school/<?= $row->id ?>" class="btn btn-sm btn-success">Switch to<i class="bi bi-chevron-right "></i></a>
                            </td>
                        </tr>




                    <?php $sn++;
                    endforeach ?>


                <?php else: ?>

                    <h3>No School was found</h3>

                <?php endif ?>
            </tbody>
        </table>
    </div>




</div>
<?php $this->view('includes/footer') ?>