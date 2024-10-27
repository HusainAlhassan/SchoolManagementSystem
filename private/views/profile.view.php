<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>


<div class="container-fluid w-75 mt-3 shadow p-3">
    <?php $this->view('includes/breadcrumbs') ?>
    <?php $this->view('includes/breadcrumbs', ['breadcrumbs' => $breadcrumbs]) ?>

    <div class=" row   overflow-hidden flex-md-row ">
        <div class="col-md-3 d-flex flex-column text-center">
            <img src="<?= ROOT ?>assets/images/user_male.jpg" class="img-fluid rounded-circle mx-auto d-lg-block" width="150px" height="150px">
            <h4>Husain Alhassan</h4>
        </div>
        <div class=" table-responsive col-md-9 g-2">
            <table class="table table-striped table-hover table-bordered text-uppercase">
                <tbody>
                    <tr>
                        <th>Surname:</th>
                        <td>Husain Alhassan</td>
                    </tr>
                    <tr>
                        <th>Student Id:</th>
                        <td>STUBTECH232014</td>
                    </tr>
                    <tr>
                        <th>DATE OF BIRTH:</th>
                        <td>15/07/1998</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td>Computer Science</td>
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
</div>

<?php $this->view('includes/footer') ?>