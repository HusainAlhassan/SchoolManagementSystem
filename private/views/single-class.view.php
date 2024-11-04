<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>


<div class="container-fluid w-75 mt-3 shadow p-3">
    <?php $this->view('includes/breadcrumbs') ?>
    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>


    <!-- <?php if ($row) :

                $image = getImage($row->image, $row->gender);
            ?> -->
    <h3><?= esc_chars($row->class)  ?></h3>
    <div class=" row   overflow-hidden flex-md-row ">

        <div class=" table-responsive col-md-9 g-2">
            <table class="table table-striped table-hover table-bordered text-uppercase">
                <tbody>
                    <tr>
                        <th>Class Name:</th>
                        <td><?= esc_chars(ucwords($row->class)) ?></td>
                    </tr>
                    <tr>
                        <th>Created By:</th>
                        <td><?= esc_chars($row->user->first_name . ' ' . $row->user->last_name)  ?></td>
                    </tr>
                    <tr>
                        <th>DATE Created</th>
                        <td><?= getDateFormat($row->date) ?></td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="nav nav-tabs  ">
            <li class="nav-item">
                <a class="nav-link  <?= $pageTab === 'lecturers' ? 'active' : '' ?>" aria-current="page" href="<?= ROOT ?>single_class/<?= $row->class_id ?>?tab=lecturers">lecturers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageTab == 'students' ? 'active' : '' ?>" href="<?= ROOT ?>single_class/<?= $row->class_id ?>?tab=students">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageTab == 'tests' ? 'active' : '' ?>" href="<?= ROOT ?>single_class/<?= $row->class_id ?>?tab=tests">Tests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>

        </ul>
        <form class="d-flex">
            <div class="input-group m-3 w-25">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </form>
    </div>
<?php else: ?>
    <h3>This profile was not found!</h3>
<?php endif ?>
</div>

<?php $this->view('includes/footer') ?>