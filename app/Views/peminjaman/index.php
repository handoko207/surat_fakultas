<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Basic Tables start -->
<section class="section">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">
        Data Peminjaman
      </h5>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end">
        <a href="/peminjaman/tambahData" class="btn btn-primary block mb-2">Tambah Data</a>
      </div>
      <div class="table-responsive">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>Nomor Surat</th>
              <th>Jenis Surat</th>
              <th>Tanggal Awal </th>
              <th>Tanggal Akhir </th>
              <th>Status</th>
              <th>Keterangan</th>
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
      ajax: '/peminjaman/ajaxDatatable',
      columns: [{
          data: 'no_surat_peminjam'
        },
        {
          data: 'jenis_surat',
          render(jenis_surat) {
            return jenis_surat == 'peminjaman_ruangan' ? 'Peminjaman Ruang' : 'Peminjaman Alat / Bahan';
          },
        },
        {
          data: 'tanggal_awal'
        },
        {
          data: 'tanggal_akhir'
        },
        {
          data: 'status'
        },
        {
          data: 'status_keterangan'
        },
        {
          data: 'action',
          orderable: false,
        }
      ],
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
    $('#myModalLabel1').html('Tambah Data Program Studi');
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
    $('#myModalLabel1').html('Edit Data Program Studi');
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
          url: '<?= site_url('peminjaman/hapusData'); ?>/' + uuid,
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