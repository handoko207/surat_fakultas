<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

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
        <button type="button" class="btn btn-primary block mb-2" onclick="tambah()">
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

<!-- Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
          aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry.
          Carrot cake
          chocolate tootsie roll chocolate bar candy canes biscuit.

          Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet
          roll. Toffee sugar
          plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Cookie dessert
          tart muffin topping
          donut icing fruitcake. Sweet roll cotton candy dragée danish Candy canes
          chocolate bar cookie.
          Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw. Pastry
          gummi bears
          marshmallow jelly-o.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Close</span>
        </button>
        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Accept</span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- ModalEnd -->


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
<script>
  function tambah() {
    $('#default').modal('show');
  }
</script>
<?= $this->endSection(); ?>