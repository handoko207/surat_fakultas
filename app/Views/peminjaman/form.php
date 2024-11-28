<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Basic Tables start -->
<section class="section">
  <form action="#" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="uuid" name="uuid">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title" id="labelForm">
          Tambah Data
        </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="jenisSurat" class="form-label">Jenis Surat</label>
            <select class="form-select" id="jenisSurat" name="jenisSurat">
              <option value="-" disabled selected>-- Pilih Jenis Surat --</option>
              <option value="peminjaman_ruangan">Peminjaman Ruangan</option>
              <option value="peminjaman_alat_bahan">Peminjaman Alat / Bahan</option>
            </select>
            <div id="jenisSuratError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="noSuratPeminjam" class="form-label">Nomor Surat Peminjam</label>
            <input type="text" class="form-control" id="noSuratPeminjam" name="noSuratPeminjam">
            <div id="noSuratPeminjamError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-12 mb-4">
            <label for="tanggalPengajuan" class="form-label">Tanggal Pengajuan</label>
            <input type="date" class="form-control" id="tanggalPengajuan" name="tanggalPengajuan" value="<?= date("Y-m-d");; ?>">
            <div id="tanggalPengajuanError" class="invalid-feedback"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="card" id="peminjamForm">
      <div class="card-header">
        <h5 class="card-title">
          Data Peminjam
        </h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="namaOrganisasi" class="form-label">Nama Organisasi</label>
          <input type="text" class="form-control" id="namaOrganisasi" name="namaOrganisasi">
          <div id="namaOrganisasi" class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
          <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
          <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan">
          <div id="nnamaKegiatanError" class="invalid-feedback"></div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="namaPenanggungJawab" class="form-label">Nama Penanggung Jawab</label>
            <input type="text" class="form-control" id="namaPenanggungJawab" name="namaPenanggungJawab">
            <div id="namaPenanggungJawabError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="kontakPenanggungJawab" class="form-label">Kontak Penanggung Jawab</label>
            <input type="number" class="form-control" id="kontakPenanggungJawab" name="kontakPenanggungJawab">
            <div id="kontakPenanggungJawabError" class="invalid-feedback"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="card" id="peminjamanForm">
      <div class="card-header">
        <h5 class="card-title" id="judulPeminjamanForm">
          Title
        </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="tanggalAwal" class="form-label">Tanggal Awal Peminjaman</label>
            <input type="datetime-local" class="form-control" id="tanggalAwal" name="tanggalAwal">
            <div id="tanggalAwalError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="tanggalAkhir" class="form-label">Tanggal Akhir Peminjaman</label>
            <input type="datetime-local" class="form-control" id="tanggalAkhir" name="tanggalAkhir">
            <div id="tanggalAkhirError" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row" id="ruangForm">
          <div class="col-md-6 mb-4">
            <label for="uuidRuangan" class="form-label">Nama Tempat Dipinjam</label>
            <select class="form-select" id="uuidRuangan" name="uuidRuangan">
              <option value="">-- Silakan Pilih --</option>
              <?php
              foreach ($ruangan as $row) {
              ?>
                <option value="<?= $row['uuid']; ?>"><?= $row['nama_ruangan']; ?></option>
              <?php } ?>
            </select>
            <div id="uuidRuanganError" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row" id="alatForm">
          <div class="d-flex justify-content-end">
            <button class="btn btn-primary block mb-2" onclick="tambahAlat()">Tambah Data</button>
          </div>
          <!-- Input untuk alat/bahan baru -->
          <div class="col-md-6 mb-4">
            <label for="namaBarang" class="form-label">Nama Alat / Bahan</label>
            <input type="text" class="form-control" id="namaBarang" name="namaBarang">
            <div id="namaBarangError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah">
            <div id="jumlahError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-12 mb-4">
            <table class="table" id="tableAlat">
              <thead>
                <tr>
                  <th>Nama Alat / Bahan</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- Data alat/bahan yang ditambahkan akan muncul di sini -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          Data Organisasi / Ormawa
        </h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="namaHima" class="form-label">Nama Hima</label>
          <input type="text" class="form-control" id="namaHima" name="namaHima">
          <div id="namaHimaError" class="invalid-feedback"></div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="namaKetuaHima" class="form-label">Nama Ketua Hima</label>
            <input type="text" class="form-control" id="namaKetuaHima" name="namaKetuaHima">
            <div id="namaKetuaHimaError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="nimKetuaHima" class="form-label">NIM Ketua Hima</label>
            <input type="text" class="form-control" id="nimKetuaHima" name="nimKetuaHima">
            <div id="nimKetuaHimaError" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="namaKetuaPelaksana" class="form-label">Nama Ketua Pelaksana</label>
            <input type="text" class="form-control" id="namaKetuaPelaksana" name="namaKetuaPelaksana">
            <div id="namaKetuaPelaksanaError" class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-4">
            <label for="nimKetuaPelaksana" class="form-label">NIM Ketua Pelaksana</label>
            <input type="text" class="form-control" id="nimKetuaPelaksana" name="nimKetuaPelaksana">
            <div id="nimKetuaPelaksanaError" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row" id="statusForm">
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
              <option value="dikirim">Dikirim</option>
              <option value="diterima">Diterima</option>
              <option value="ditolak">Ditolak</option>
              <option value="ditolak_revisi">Ditolak Dengan Revisi</option>
              <option value="diterima_menunggu_pengesahan">Diterima Menunggu Pengesahan</option>
              <option value="selesai">Selesai</option>
              <option value="diambil">Diambil</option>
            </select>
            <div id="statusError" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
            <label for="statusKeterangan" class="form-label">Keterangan Status</label>
            <textarea class="form-control" id="statusKeterangan" name="statusKeterangan"></textarea>
            <div id="statusKeteranganError" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-danger" onclick="batal()">Batal</button> &nbsp;
            <button type="submit" class="btn btn-primary" onclick="tambahData(event)">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
</section>
<!-- Basic Tables end -->

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script src=" <?= base_url(); ?>/assets/mazer/extensions/jquery/jquery.min.js"></script>
<script>
  var role = "<?= $role; ?>";
  var uuid = $("#uuid").val();
  var alatBahanArray = [];

  // Hide Form
  document.addEventListener("DOMContentLoaded", function() {
    $("#peminjamanForm").hide();
    $("#peminjamForm").hide();
    $("#ruangForm").hide();
    $("#alatForm").hide();
  });

  //Pengecekkan Role 
  if (role !== "admin") {
    $("#statusForm").hide();
  } else {
    $("#statusForm").show();
  }

  //Perubahan Label Form
  if (uuid !== "") {
    $("#labelForm").text("Edit Data");
  }

  // Fungsi untuk menampilkan form sesuai dengan jenis surat yang dipilih
  $("#jenisSurat").change(function() {
    $('.form-control').removeClass('is-invalid');
    $('.form-select').removeClass('is-invalid');
    $('.invalid-feedback').text('');
    if ($(this).val() == "peminjaman_ruangan") {
      $("#peminjamForm").show();
      $("#judulPeminjamanForm").text("Peminjaman Ruangan");
      $("#peminjamanForm").show();
      $("#ruangForm").show();
      $("#alatForm").hide();
    } else {
      $("#peminjamForm").hide();
      $("#judulPeminjamanForm").text("Peminjaman Alat / Bahan");
      $("#peminjamanForm").show();
      $("#ruangForm").hide();
      $("#alatForm").show();
    }
  });

  // Fungsi untuk menambahkan alat/bahan
  function tambahAlat() {
    event.preventDefault(); // Mencegah submit form atau reload halaman
    var bahan = $("#namaBarang").val();
    var jumlah = $("#jumlah").val();
    if (bahan && jumlah) {
      var html = `<tr>
                  <td>${bahan}</td>
                  <td>${jumlah}</td>
                  <td>
                    <button type="button" class="btn btn-danger" onclick="hapusAlat(this)">Hapus</button>
                  </td>
                </tr>`;
      $("#tableAlat tbody").append(html);

      // Kosongkan input setelah menambahkan
      alatBahanArray.push({
        bahan: bahan,
        jumlah: jumlah
      });
      $("#namaBarang").val('');
      $("#jumlah").val('');
    } else {
      showNotification('Tambah Alat/Bahan', 'Data Alat/bahan dan Jumlah tidak boleh kosong', 'error');
    }
  }

  // Fungsi untuk menghapus alat/bahan
  function hapusAlat(button) {
    $(button).closest('tr').remove();
  }

  // Fungsi untuk menampilkan notifikasi jika kembali ke halaman sebelumnya
  function batal() {
    Swal.fire({
      title: "Apakah Anda Yakin?",
      text: "Data yang sudah diinputkan akan hilang.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Iya, Batal"
    }).then((result) => {
      if (result.isConfirmed) {
        return window.location.href = "<?= site_url('peminjaman'); ?>";
      }
    });
  }

  function tambahData() {
    if (event) event.preventDefault();

    if (uuid == "") {
      simpanData();
    } else {
      updateData();
    };
  }

  function simpanData() {
    var data = {
      jenisSurat: $("#jenisSurat").val(),
      noSuratPeminjam: $("#noSuratPeminjam").val(),
      tanggalPengajuan: $("#tanggalPengajuan").val(),
      namaOrganisasi: $("#namaOrganisasi").val(),
      namaKegiatan: $("#namaKegiatan").val(),
      namaPenanggungJawab: $("#namaPenanggungJawab").val(),
      kontakPenanggungJawab: $("#kontakPenanggungJawab").val(),
      tanggalAwal: $("#tanggalAwal").val(),
      tanggalAkhir: $("#tanggalAkhir").val(),
      uuidRuangan: $("#uuidRuangan").val(),
      namaHima: $("#namaHima").val(),
      namaKetuaHima: $("#namaKetuaHima").val(),
      nimKetuaHima: $("#nimKetuaHima").val(),
      namaKetuaPelaksana: $("#namaKetuaPelaksana").val(),
      nimKetuaPelaksana: $("#nimKetuaPelaksana").val(),
      status: $("#status").val(),
      statusKeterangan: $("#statusKeterangan").val(),
      alatBahanArray: alatBahanArray,
    };
    $.ajax({
      url: "<?= site_url('peminjaman/simpanData'); ?>",
      type: "POST",
      data: data,

      success: function(response) {
        if (response.status == "success") {
          showNotification(response.title, response.text, response.icon); // Tampilkan notifikasi
          setTimeout(() => {
            window.location.href = "<?= site_url('peminjaman'); ?>";
          }, 2000);
        } else if (response.status == "error") {
          showErrors(response.errors);
        } else {
          showNotification('Tambah Data', response.message, 'error');
        }
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  }

  function showErrors(errors) {
    for (const field in errors) {
      $('#' + field).addClass('is-invalid'); // Tambahkan class is-invalid
      $('#' + field + 'Error').text(errors[field]); // Tampilkan pesan error
    }
  }
</script>

<?= $this->endSection(); ?>