<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table            = 'surat_t_peminjaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['uuid', 'uuid_user', 'no_surat_peminjam', 'jenis_surat', 'nama_organisasi', 'nama_kegiatan', 'nama_tempat', 'nama_penanggung_jawab', 'kontak_penanggung_jawab', 'tanggal_peminjaman', 'tanggal_awal', 'tanggal_akhir', 'nama_hima', 'nama_ketua_hima', 'nim_ketua_hima', 'nama_ketua_pelaksana', 'nim_ketua_pelaksana', 'status', 'status_keterangan'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDataTables()
    {
        $builder = $this->db->table($this->table);
        $builder->select('uuid, no_surat_peminjam, jenis_surat, DATE_FORMAT(tanggal_awal, "%d-%m-%Y") as tanggal_awal, DATE_FORMAT(tanggal_akhir, "%d-%m-%Y") as tanggal_akhir, status, status_keterangan');
        return $builder;
    }
}
