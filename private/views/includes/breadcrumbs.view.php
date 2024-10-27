<nav aria-label="breadcrumb">
  <ol class="breadcrumb d-flex justify-content-center  align-items-center">

    <?php if (isset($breadcrumbs)) : ?>
      <?php foreach ($breadcrumbs as $crumb) : ?>
        <li class="breadcrumb-item"><a href="<?= $crumb[0] ?>"><?= $crumb[0] ?></a></li>
      <?php endforeach; ?>
    <?php endif; ?>

  </ol>
</nav>