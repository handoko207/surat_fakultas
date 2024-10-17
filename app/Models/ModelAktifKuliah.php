<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAktifKuliah extends Model
{
    protected $table            = 'surat_t_aktif_kuliah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'status',
        'status_keterangan',
        'tanggal_pengajuan',
        'instansi',
        'jabatan_wali',
        'pangkat_wali',
        'nip_wali',
        'nama_wali',
        'tahun_ajaran',
        'semester',
        'tempat_kuliah',
        'uuid_program_studi',
        'tanggal_lahir',
        'tempat_lahir',
        'nim',
        'nama_mahasiswa',
        'jabatan_pejabat',
        'pangkat_pejabat',
        'nip_pejabat',
        'nama_pejabat',
        'jenis_surat',
        'no_surat',
        'uuid',
        'uuid_user'
    ];

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
}
