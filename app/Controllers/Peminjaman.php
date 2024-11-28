<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\ModelPeminjaman as peminjamanModels;
use App\Models\ModelPeminjamanDetail as peminjamanDetailModels;

class Peminjaman extends BaseController
{
    private $roleAkses = ['admin', 'operator', 'mahasiswa'];

    public function index()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $data['title'] = 'Manajemen Peminjaman';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen peminjaman';
        return view('peminjaman/index', $data);
    }
    public function ajaxDatatable()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $peminjamanModels = new peminjamanModels();
        $peminjamanModels->getDataTables();
        return DataTable::of($peminjamanModels)->add('action', function ($row) {
            return '<a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Data" onclick="editTampil(\'' . $row->uuid . '\')"><i class="bi bi-pencil"></i></a> 
                    <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hapus Data" onclick="hapusData(\'' . $row->uuid . '\')"><i class="bi bi-x"></i></a>
                    <a href="#" class="btn icon btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Detail Data" onclick="detailData(\'' . $row->uuid . '\')"><i class="bi bi-search"></i></a>
                    ';
        })->hide('uuid')->toJson(true);
    }

    public function tambahData()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $data['title'] = 'Manajemen Peminjaman';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen peminjaman';
        $data['ruangan'] = $this->getRuangan();
        $data['role'] = $this->role;
        return view('peminjaman/form', $data);
    }

    public function simpanData()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $peminjamanModels = new peminjamanModels();
        $peminjamanDetailModels = new peminjamanDetailModels();
        $uuid = $this->uuid;
        $alat_bahan = $this->request->getPost('alatBahanArray');

        $jenisSurat = $this->request->getPost('jenisSurat');
        if ($jenisSurat == 'peminjaman_ruangan') {
            if (!$this->validation->run($this->request->getPost(), 'peminjamanRuangan')) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $this->validation->getErrors()
                ]);
            }
        } else {
            if (!$this->validation->run($this->request->getPost(), 'peminjamanAlatBahan')) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $this->validation->getErrors()
                ]);
            }
        }

        $data = [
            'uuid' => $uuid,
            'uuid_user' => $this->uuid_user,
            'no_surat_peminjam' => $this->request->getPost('noSuratPeminjam'),
            'jenis_surat' => $jenisSurat,
            'nama_organisasi' => $this->request->getPost('namaOrganisasi'),
            'nama_kegiatan' => $this->request->getPost('namaKegiatan'),
            'uuid_ruangan' => $this->request->getPost('uuidRuangan'),
            'nama_penanggung_jawab' => $this->request->getPost('namaPenanggungJawab'),
            'kontak_penanggung_jawab' => $this->request->getPost('kontakPenanggungJawab'),
            'tanggal_peminjaman' => $this->request->getPost('tanggalPeminjaman'),
            'tanggal_awal' => $this->request->getPost('tanggalAwal'),
            'tanggal_akhir' => $this->request->getPost('tanggalAkhir'),
            'nama_hima' => $this->request->getPost('namaHima'),
            'nama_ketua_hima' => $this->request->getPost('namaKetuaHima'),
            'nim_ketua_hima' => $this->request->getPost('nimKetuaHima'),
            'nama_ketua_pelaksana' => $this->request->getPost('namaKetuaPelaksana'),
            'nim_ketua_pelaksana' => $this->request->getPost('nimKetuaPelaksana'),
            'status' => '1',
            'status_keterangan' => 'Menunggu Konfirmasi',
        ];
        $peminjamanModels->insert($data);
        if ($jenisSurat == 'peminjaman_alat_bahan') {
            foreach ($alat_bahan as $key => $value) {
                $dataDetail = [
                    'uuid_surat_peminjaman' => $data['uuid'],
                    'nama_barang' => $value['bahan'],
                    'jumlah' => $value['jumlah'],
                ];
                $peminjamanDetailModels->insert($dataDetail);
            }
        }
        return $this->response->setJSON([
            'status' => 'success',
            'title' => 'Tambah Data',
            'text' => 'Data Berhasil Ditambahkan',
            'icon' => 'success'
        ]);
    }
}
