<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3><?= $title; ?></h3>
        <p class="text-subtitle text-muted"><?= $subtitle; ?></p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- Basic Tables start -->
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          Data Pengguna
        </h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-primary block mb-2">
            Tambah Data
          </button>
        </div>
        <div class="table-responsive">
          <table class="table" id="table">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                <th>Program Studi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
  <!-- Basic Tables end -->

</div>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script src="<?= base_url(); ?>/assets/mazer/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/mazer/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/mazer/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url(); ?>/assets/mazer/static/js/pages/datatables.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '<?php echo site_url('user/ajaxDatatable'); ?>',
      columnDefs: [{
        targets: -1,
        orderable: false
      }],
      drawCallback: function(settings) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
      }
    });
  });
</script>
<?= $this->endSection(); ?>