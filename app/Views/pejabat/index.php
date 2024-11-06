<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Basic Tables start -->
<section class="section">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">
        Data Pejabat
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
              <th>NIP</th>
              <th>Nama Pejabat</th>
              <th>Jabatan</th>
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
            <h6>NIP</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="nip" name="nip" placeholder="Isikan NIP Pejabat" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-credit-card-2-front"></i>
              </div>
              <span class="invalid-feedback" id="nipError"></span>
            </div>
          </div>
          <div class="col-sm-12">
            <h6>Nama Pejabat</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Pejabat Beserta Gelar" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
              <span class="invalid-feedback" id="namaError"></span>
            </div>
          </div>
          <div class="col-sm-12">
            <h6>Jabatan</h6>
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Isikan Jabatan" control-id="ControlID-16">
              <div class="form-control-icon">
                <i class="bi bi-diagram-3"></i>
              </div>
              <span class="invalid-feedback" id="jabatanError"></span>
            </div>
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
      ajax: '<?php echo site_url('/pejabat/ajaxDatatable'); ?>',
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
    $('#myModalLabel1').html('Tambah Data Pejabat');
    $('#labelTombol').text('Tambah Data');
    $('#uuid').val('');
    $('#nip').val('');
    $('#nama').val('');
    $('#jabatan').val('');
    resetValidation();
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
    formData.append('nip', $('#nip').val());
    formData.append('nama', $('#nama').val());
    formData.append('jabatan', $('#jabatan').val());
    $.ajax({
      url: '<?= site_url('pejabat/simpanTambah'); ?>',
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
    $('#myModalLabel1').html('Edit Data Pejabat');
    $('#labelTombol').text('Update Data');
    $('#default').modal('show');
    $('#uuid').val(uuid);
    $.ajax({
      url: '<?= site_url('pejabat/getEdit'); ?>/' + uuid,
      type: 'GET',
      success: function(data) {
        $('#nip').val(data.nip);
        $('#nama').val(data.nama);
        $('#jabatan').val(data.jabatan);
      },
      error: function(xhr, status, error) {
        // Tangani error dari server atau koneksi
      }
    });
  }

  function updateData() {
    var formData = new FormData();
    var uuid = $('#uuid').val();
    formData.append('nip', $('#nip').val());
    formData.append('nama', $('#nama').val());
    formData.append('jabatan', $('#jabatan').val());
    formData.append('uuid', uuid);
    $.ajax({
      url: '<?= site_url('pejabat/updateData'); ?>/' + uuid,
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

  function hapusData(uuid) {
    Swal.fire({
      title: "Hapus Data",
      text: "Apakah Anda yakin ingin menghapus data ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= site_url('pejabat/hapusData'); ?>/' + uuid,
          type: 'GET',
          success: function(data) {
            if (data.status === 'success') {
              $('#table').DataTable().ajax.reload();
              showNotification(data.title, data.text, data.icon); // Tampilkan notifikasi
            } else if (data.status === 'error') {
              showNotification(data.title, data.text, data.icon); // Tampilkan notifikasi
            }
          },
          error: function(xhr, status, error) {
            showNotification('Hapus Data', 'Data Gagal Dihapus, silakan hubungi Administrator', 'error');
          }
        });
      }
    });
  }

  // Bersihkan validasi
  function resetValidation() {
    $('.form-control').removeClass('is-invalid');
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