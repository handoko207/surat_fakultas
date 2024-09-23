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
          Register
        </h2>
        <form action="./" method="get" autocomplete="off" novalidate>
          <div class="mb-3">
            <label class="form-label">NIM / NIP</label>
            <input type="text" class="form-control" placeholder="NIM / NIP Anda . . ." autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap Anda" autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password Anda" autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Repeat Password</label>
            <input type="password" class="form-control" placeholder="Ulangi Password Anda" autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="your@institusi.com" autocomplete="off">
          </div>

          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Register</button>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
          Sudah Punya Akun ? <a href="/login" tabindex="-1">Login Disini</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <!-- Photo -->
      <div class="bg-cover h-100 min-vh-100" style="background-image: url(<?= base_url('assets') ?>/static/custom/register.jpg)"></div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="<?= base_url('assets') ?>/dist/js/tabler.min.js?1692870487" defer></script>
  <script src="<?= base_url('assets') ?>/dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>