<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SafdiTeknik</title>

    <link rel="stylesheet" href="/assets/css/main/app.css" />

    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css"/>
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css"/>

    <link
      rel="shortcut icon"
      href="/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="/assets/images/logo/favicon.png"
      type="image/png"
    />
  </head>

  <body>
    <div id="app">

      <?= $this->include('layouts/sidebar') ?>
      
      <div id="main" class="layout-navbar">
        <header class="mb-3">
            <?= $this->include('layouts/navbar') ?>
        </header>
        <div id="main-content">

        <!-- layoutnya dimulai dari sini -->

        <?= $this->renderSection('konten') ?>

        <!-- layoutnya sampai sini -->

        </div>
      </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>

    <script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/assets/js/pages/form-element-select.js"></script>

  </body>
</html>
