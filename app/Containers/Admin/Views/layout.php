<?php 
use Rudra\Container\Facades\Rudra;
use Rudra\Container\Facades\Session;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>
    <div class="container">
    <br>
    <div class="row">
        <div class="col-10">
          <br>
          <a class="link-underline link-underline-opacity-0" href="<?= base_url() ?>admin"><h1>Dashboard</h1></a>
        </div>
        <div class="col border">
          <?php if (auth()->loggedIn()): ?>
            <p>Вы вошли как: <i><?= auth()->user()->getEmail() ?></i></p>
            <a href="<?= base_url() ?>/logout">Выйти</a>
          <?php endif; ?>
        </div>
      </div>
    <hr>
      <?= $this->renderSection('content') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
