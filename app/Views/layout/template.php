<!doctype html>

<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Blank page - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="<?= base_url('assets') ?>/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
  <link href="<?= base_url('assets') ?>/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
  <link href="<?= base_url('assets') ?>/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
  <link href="<?= base_url('assets') ?>/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
  <link href="<?= base_url('assets') ?>/dist/css/demo.min.css?1692870487" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
</head>

<body>
  <script src="<?= base_url('assets') ?>/dist/js/demo-theme.min.js?1692870487"></script>
  <div class="page">
    <aside class="navbar navbar-vertical navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
          <a href=".">
            <img src="<?= base_url('assets') ?>/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
          <ul class="navbar-nav pt-lg-3">
            <li class="nav-item">
              <a class="nav-link" href="./">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Beranda
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="page-wrapper">
      <?= $this->renderSection('content') ?>
      <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Copyright &copy; 2023
                  <a href="." class="link-secondary">Tabler</a>.
                  All rights reserved.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="<?= base_url('assets') ?>/dist/js/tabler.min.js?1692870487" defer></script>
  <script src="<?= base_url('assets') ?>/dist/js/demo.min.js?1692870487" defer></script>
  <?= $this->renderSection('javascript') ?>
</body>

</html>