<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRekomendasi extends Model
{
    protected $table            = 'surat_t_rekomendasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['uuid', 'uuid_user', 'no_surat_rekomendasi', 'jenis_surat', 'nama_pejabat', 'nip_pejabat', 'pangkat_pejabat', 'jabatan_pejabat', 'nama_mahasiswa', 'nim', 'uuid_program_studi', 'angkatan', 'semester', 'tahun_ajaran', 'tanggal_pengajuan', 'status', 'status_keterangan'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
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
}
