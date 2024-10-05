<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in with cover - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
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

<body class=" d-flex flex-column bg-white">
  <script src="<?= base_url('assets') ?>/dist/js/demo-theme.min.js?1692870487"></script>
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
      <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets') ?>/static/logo.svg" height="36" alt=""></a>
        </div>
        <h2 class="h3 text-center mb-3">
          Login to your account
        </h2>
        <form action="/auth" method="post" autocomplete="off" novalidate>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control <?= session('errorValidation.username') ? 'is-invalid' : '' ?>" placeholder=" Username Anda" autocomplete="off" id="username" name="username" value="<?= set_value('username'); ?>">
            <div class="invalid-feedback">
              <?= session('errorValidation.username'); ?>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control <?= session('errorValidation.password') ? 'is-invalid' : '' ?>" placeholder="Password Anda" autocomplete="off" id="password" name="password" value="<?= set_value('password'); ?>">
            <div class="invalid-feedback">
              <?= session('errorValidation.password'); ?>
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
          Belum Punya Akun ? <a href="/register" tabindex="-1">Daftar Disini</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <!-- Photo -->
      <div class="bg-cover h-100 min-vh-100" style="background-image: url(<?= base_url('assets') ?>/static/custom/login.jpg)"></div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url('assets') ?>/dist/js/tabler.min.js?1692870487" defer></script>
  <script src="<?= base_url('assets') ?>/dist/js/demo.min.js?1692870487" defer></script>
  <script src="<?= base_url('assets') ?>/dist/js/notifikasi.js"></script>
  <?php
  $pesan = json_encode(session('pesan'));
  if ($pesan !== false) {
  ?>
    <script>
      var pesan = <?= ($pesan) ?>;
      showNotification(pesan.title, pesan.text, pesan.icon);
    </script>
  <?php
  }
  ?>
  <?php
  $pesanHtml = json_encode(session('pesanHtml'));
  if ($pesan !== false) {
  ?>
    <script>
      var pesanHtml = <?= ($pesanHtml) ?>;
      showNotificationHtml(pesanHtml.title, pesanHtml.text, pesanHtml.icon);
    </script>
  <?php
  }
  ?>
</body>

</html>