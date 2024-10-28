<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>


<div class="container-fluid w-75 mt-3 shadow p-3">
    <?php $this->view('includes/breadcrumbs') ?>
    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>


    <?php if ($row) :

        $image = getImage($row->image, $row->gender);
    ?>
        <div class=" row   overflow-hidden flex-md-row ">
            <div class="col-md-3 d-flex flex-column text-center">
                <img src="<?= $image ?>" class="img-fluid rounded-circle mx-auto d-lg-block" width="150px" height="150px">
                <h4><?= $row->first_name . ' ' . $row->last_name  ?></h4>
            </div>
            <div class=" table-responsive col-md-9 g-2">
                <table class="table table-striped table-hover table-bordered text-uppercase">
                    <tbody>
                        <tr>
                            <th>Surname:</th>
                            <td><?= esc_chars($row->first_name . ' ' . $row->last_name)  ?></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td><?= esc_chars($row->email) ?></td>
                        </tr>

                        <tr>
                            <th>Gender:</th>
                            <td><?= esc_chars($row->gender) ?></td>
                        </tr>
                        <tr>
                            <th>DATE Created</th>
                            <td><?= getDateFormat($row->date) ?></td>
                        </tr>
                        <tr>
                            <th>Rank:</th>
                            <td><?= esc_chars(str_replace("_", " ", $row->rank)) ?></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs  ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Basic info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Teasts</a>
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