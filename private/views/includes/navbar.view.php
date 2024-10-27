<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid shadow">
    <a class="navbar-brand" href="<?= ROOT ?>">
      <img src="<?= ROOT ?>assets/images/logo.png" class="img-fluid" width="50px">
      <span><?= Auth::getSchool_name() ?></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= ROOT ?>dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT ?>schools">Schools</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT ?>users">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT ?>students">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT ?>classes">Classes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT ?>tests">Tests</a>
        </li>

        <li class="nav-item dropdown  dropdown-menu-end">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= Auth::getFirst_name() . "  " . Auth::getLast_name() ?>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= ROOT ?>profile">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= ROOT ?>logout">logout</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>


</nav>