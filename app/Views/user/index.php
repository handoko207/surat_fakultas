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
        <form action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="uuid" name="uuid">
          <div class="col-sm-12">
            <h6>Username</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="username" name="username" placeholder="Isikan Username" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-person-gear"></i>
              </div>
              <span class="invalid-feedback" id="usernameError"></span>
            </div>
          </div>
          <div class="col-sm-12">
            <h6>Nama Lengkap</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Isikan Nama Lengkap" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-person-vcard"></i>
              </div>
              <span class="invalid-feedback" id="namaLengkapError"></span>
            </div>
          </div>
          <div class="col-sm-12" id="passwordField">
            <h6>Password</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="password" name="password" placeholder="Isikan Password" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-key"></i>
              </div>
              <span class="invalid-feedback" id="passwordError"></span>
            </div>
          </div>
          <div class="col-sm-12" id="repeatPasswordField">
            <h6>Konfirmasi Password</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Isikan Password Ulang " control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-key"></i>
              </div>
              <span class="invalid-feedback" id="repeatPasswordError"></span>
            </div>
          </div>
          <div class="col-sm-12">
            <h6>Email</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control " id="email" name="email" placeholder="Isikan Email" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <span class="invalid-feedback" id="emailError"></span>
            </div>
          </div>
          <div class="col-md-12">
            <h6>Program Studi</h6>
            <fieldset class="form-group">
              <select class="form-select" id="programStudi" control-id="ControlID-2">
                <?php
                foreach ($program_studi as $row) {
                  echo '<option value="' . $row['uuid'] . '">' . $row['nama_prodi'] . '</option>';
                }
                ?>
              </select>
              <span class="invalid-feedback" id="programStudiError"></span>
            </fieldset>
          </div>
          <div class="col-md-12">
            <h6>Role</h6>
            <fieldset class="form-group">
              <select class="form-select" id="role" control-id="ControlID-2">
                <option value="-" selected disabled>-- Silakan Pilih --</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="operator">Operator</option>
                <option value="admin">Admin</option>
              </select>
              <span class="invalid-feedback" id="roleError"></span>
            </fieldset>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger ms-1" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Batal</span>
        </button>
        <button type="button" class="btn btn-primary ms-1" onclick="simpan()">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block" id="labelTombol">Tambah Data</span>
        </button>
      </div>
      </form>
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
    resetValidation();
    $('#default').modal('show');
    $('#myModalLabel1').html('Tambah Data Pengguna');
    $('#passwordField').show();
    $('#labelTombol').text('Tambah Data');
    $('#repeatPasswordField').show();
  }

  function simpan() {
    var uuid = $('#uuid').val();
    if (uuid === '') {
      tambahData();
    } else {
      updateData();
    }
  }

  function tambahData() {
    var formData = new FormData();
    formData.append('username', $('#username').val());
    formData.append('namaLengkap', $('#namaLengkap').val());
    formData.append('password', $('#password').val());
    formData.append('repeatPassword', $('#repeatPassword').val());
    formData.append('email', $('#email').val());
    formData.append('programStudi', $('#programStudi').val());
    formData.append('role', $('#role').val());

    $.ajax({
      url: '<?= site_url('user/simpanTambah'); ?>',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        resetValidation(); // Bersihkan error sebelumnya
        if (data.status === 'success') {
          $('#default').modal('hide'); // Tutup modal
          $('#table').DataTable().ajax.reload(); // Reload table
          showNotification(data.title, data.text, data.icon); // Tampilkan notifikasi
        } else if (data.status === 'error') {
          showErrors(data.errors); // Tampilkan error di setiap field
          $('#default').modal('show'); // Tetap tampilkan modal jika ada error
        }
      },
      error: function(xhr, status, error) {
        // Tangani error dari server atau koneksi
        $('#default').modal('show');
      }
    });
  }

  function editTampil(uuid) {
    resetValidation();
    $('#myModalLabel1').html('Edit Data Pengguna');
    $('#passwordField').hide();
    $('#repeatPasswordField').hide();
    $('#labelTombol').text('Update Data');
    $('#default').modal('show');
    $('#uuid').val(uuid);
    $.ajax({
      url: '<?= site_url('user/getEdit'); ?>/' + uuid,
      type: 'GET',
      success: function(data) {
        console.log(data);
        $('#username').val(data.username);
        $('#namaLengkap').val(data.nama_lengkap);
        $('#email').val(data.email);
        $('#programStudi').val(data.uuid_program_studi).attr('selected', 'true');
        $('#role').val(data.role).attr('selected', 'true');
      },
      error: function(xhr, status, error) {
        // Tangani error dari server atau koneksi
      }
    });
  }

  function updateData() {
    var formData = new FormData();
    var uuid = $('#uuid').val();
    formData.append('username', $('#username').val());
    formData.append('namaLengkap', $('#namaLengkap').val());
    formData.append('email', $('#email').val());
    formData.append('programStudi', $('#programStudi').val());
    formData.append('role', $('#role').val());
    $.ajax({
      url: '<?= site_url('user/updateData'); ?>/' + uuid,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        resetValidation(); // Bersihkan error sebelumnya
        if (data.status === 'success') {
          $('#default').modal('hide'); // Tutup modal
          $('#table').DataTable().ajax.reload(); // Reload table
          showNotification(data.title, data.text, data.icon); // Tampilkan notifikasi
        } else if (data.status === 'error') {
          showErrors(data.errors); // Tampilkan error di setiap field
          $('#default').modal('show'); // Tetap tampilkan modal jika ada error
        }
      },
      error: function(xhr, status, error) {
        // Tangani error dari server atau koneksi
        $('#default').modal('show');
      }
    });
  }

  // Bersihkan validasi
  function resetValidation() {
    $('.form-control').removeClass('is-invalid');
    $('.form-select').removeClass('is-invalid');
    $('.invalid-feedback').text('');
  }

  // Tampilkan error ke masing-masing field
  function showErrors(errors) {
    for (const field in errors) {
      $('#' + field).addClass('is-invalid'); // Tambahkan class is-invalid
      $('#' + field + 'Error').text(errors[field]); // Tampilkan pesan error
    }
  }
</script>

<?= $this->endSection(); ?>