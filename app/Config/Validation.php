<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public array $login = ([
        'username' => [
            'label' => 'Username',
            'rules' => 'required',
            'errors' => [
                'required' => 'Username tidak boleh kosong',
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required',
            'errors' => [
                'required' => 'Password tidak boleh kosong',
            ]
        ]
    ]);

    public array $register = ([
        'username' => [
            'label' => 'Username',
            'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric|is_unique[surat_m_user.username]',
            'errors' => [
                'required' => 'Username tidak boleh kosong',
                'min_length' => 'Username minimal 3 karakter',
                'max_length' => 'Username maksimal 20 karakter',
                'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka',
                'is_unique' => 'Username sudah digunakan',
            ]
        ],
        'namaLengkap' => [
            'label' => 'Nama Lengkap',
            'rules' => 'required|min_length[3]|max_length[50]|alpha_space',
            'errors' => [
                'required' => 'Nama Lengkap tidak boleh kosong',
                'min_length' => 'Nama Lengkap minimal 3 karakter',
                'max_length' => 'Nama Lengkap maksimal 50 karakter',
                'alpha_space' => 'Nama Lengkap hanya boleh berisi huruf dan spasi',
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[8]|alpha_numeric|matches[repeatPassword]',
            'errors' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Password minimal 8 karakter',
                'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka',
                'matches' => 'Password tidak sama dengan Konfirmasi Password',
            ]
        ],
        'repeatPassword' => [
            'label' => 'Repeat Password',
            'rules' => 'required|matches[password]|min_length[8]|alpha_numeric|max_length[20]',
            'errors' => [
                'required' => 'Konfirmasi Password tidak boleh kosong',
                'matches' => 'Konfirmasi Password tidak sama dengan Password',
                'min_length' => 'Konfirmasi Password minimal 8 karakter',
                'alpha_numeric' => 'Konfirmasi Password hanya boleh berisi huruf dan angka',
                'max_length' => 'Konfirmasi Password maksimal 20 karakter',
            ]
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[surat_m_user.email]|max_length[50]',
            'errors' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan',
                'max_length' => 'Email maksimal 50 karakter',
            ]
        ],
        'programStudi' => [
            'label' => 'Program Studi',
            'rules' => 'required|not_in_list[81b84279-716c-402b-818d-f3cae3f38e1b]',
            'errors' => [
                'required' => 'Program Studi tidak boleh kosong',
                'not_in_list' => 'Harap memilih Program Studi',
            ]
        ],
        'role' => [
            'label' => 'Role',
            'rules' => 'required|in_list[mahasiswa,admin,operator]',
            'errors' => [
                'required' => 'Program Studi tidak boleh kosong',
                'in_list' => 'Harap memilih Role',
            ]
        ]
    ]);

    public array $registerUpdate = ([
        'namaLengkap' => [
            'label' => 'Nama Lengkap',
            'rules' => 'required|min_length[3]|max_length[50]|alpha_space',
            'errors' => [
                'required' => 'Nama Lengkap tidak boleh kosong',
                'min_length' => 'Nama Lengkap minimal 3 karakter',
                'max_length' => 'Nama Lengkap maksimal 50 karakter',
                'alpha_space' => 'Nama Lengkap hanya boleh berisi huruf dan spasi',
            ]
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[surat_m_user.email]|max_length[50]',
            'errors' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan',
                'max_length' => 'Email maksimal 50 karakter',
            ]
        ],
        'programStudi' => [
            'label' => 'Program Studi',
            'rules' => 'required',
            'errors' => [
                'required' => 'Program Studi tidak boleh kosong',
            ]
        ],
        'role' => [
            'label' => 'Role',
            'rules' => 'required|in_list[mahasiswa,admin,operator]',
            'errors' => [
                'required' => 'Program Studi tidak boleh kosong',
                'in_list' => 'Harap memilih Role',
            ]
        ]
    ]);

    public array $prodi = ([
        'kodeProdi' => [
            'label' => 'Kode Prodi',
            'rules' => 'required|min_length[3]|max_length[10]|alpha_numeric|is_unique[surat_r_program_studi.kode_prodi]',
            'errors' => [
                'required' => 'Kode Prodi tidak boleh kosong',
                'min_length' => 'Kode Prodi minimal 3 karakter',
                'max_length' => 'Kode Prodi maksimal 10 karakter',
                'alpha_numeric' => 'Kode Prodi hanya boleh berisi huruf dan angka',
                'is_unique' => 'Kode Prodi sudah digunakan',
            ]
        ],
        'namaProdi' => [
            'label' => 'Nama Prodi',
            'rules' => 'required|min_length[3]|max_length[50]|alpha_space',
            'errors' => [
                'required' => 'Nama Prodi tidak boleh kosong',
                'min_length' => 'Nama Prodi minimal 3 karakter',
                'max_length' => 'Nama Prodi maksimal 50 karakter',
                'alpha_space' => 'Nama Prodi hanya boleh berisi huruf dan spasi',
            ]
        ],
        'jenjang' => [
            'label' => 'Jenjang',
            'rules' => 'required|in_list[D3,S1,S2,S3,SPESIALIS,PROFESI]',
            'errors' => [
                'required' => 'Jenjang tidak boleh kosong',
                'in_list' => 'Harap memilih Jenjang',
            ]
        ]
    ]);

    public array $pejabat = ([
        'nip' => [
            'label' => 'NIP',
            'rules' => 'required|max_length[20]|numeric|is_unique[surat_r_pejabat.nip]',
            'errors' => [
                'required' => 'NIP tidak boleh kosong',
                'max_length' => 'NIP maksimal 20 karakter',
                'numeric' => 'NIP hanya boleh berisi angka',
                'is_unique' => 'NIP sudah digunakan',
            ]
        ],
        'nama' => [
            'label' => 'Nama Pejabat',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Pejabat tidak boleh kosong',
                'min_length' => 'Nama Pejabat minimal 3 karakter',
                'max_length' => 'Nama Pejabat maksimal 50 karakter',
                'regex_match' => 'Nama Pejabat hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'jabatan' => [
            'label' => 'Jabatan',
            'rules' => 'required|alpha_numeric_punct',
            'errors' => [
                'required' => 'Jabatan tidak boleh kosong',
                'alpha_numeric_punct' => 'Jabatan hanya boleh berisi huruf, angka, spasi dan tanda baca',
            ]
        ]
    ]);

    public array $ruangan = ([
        'namaRuangan' => [
            'label' => 'Nama Ruangan',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Ruangan tidak boleh kosong',
                'min_length' => 'Nama Ruangan minimal 3 karakter',
                'max_length' => 'Nama Ruangan maksimal 50 karakter',
                'regex_match' => 'Nama Ruangan hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ]
    ]);

    public array $peminjamanRuangan = ([
        'jenisSurat' => [
            'label' => 'Jenis Surat',
            'rules' => 'required|in_list[peminjaman_ruangan]',
            'errors' => [
                'required' => 'Jenis Surat tidak boleh kosong',
                'in_list' => 'Harap memilih Jenis Surat',
            ]
        ],
        'noSuratPeminjam' => [
            'label' => 'Nomor Surat Peminjam',
            'rules' => 'required|is_unique[surat_t_peminjaman.no_surat_peminjam]|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9\/\-., ]+$/]',
            'errors' => [
                'required' => 'Nomor Surat Peminjam tidak boleh kosong',
                'is_unique' => 'Nomor Surat Peminjam sudah digunakan',
                'min_length' => 'Nomor Surat Peminjam minimal 3 karakter',
                'max_length' => 'Nomor Surat Peminjam maksimal 50 karakter',
                'regex_match' => 'Nomor Surat Peminjam hanya boleh berisi huruf, angka dan tanda baca (-), (/), (.)',
            ]
        ],

        'namaHima' => [
            'label' => 'Nama Hima',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Hima tidak boleh kosong',
                'min_length' => 'Nama Hima minimal 3 karakter',
                'max_length' => 'Nama Hima maksimal 50 karakter',
                'regex_match' => 'Nama Hima hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'namaKetuaHima' => [
            'label' => 'Nama Ketua Hima',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Ketua Hima tidak boleh kosong',
                'min_length' => 'Nama Ketua Hima minimal 3 karakter',
                'max_length' => 'Nama Ketua Hima maksimal 50 karakter',
                'regex_match' => 'Nama Ketua Hima hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'nimKetuaHima' => [
            'label' => 'NIM Ketua Hima',
            'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'errors' => [
                'required' => 'NIM Ketua Hima tidak boleh kosong',
                'min_length' => 'NIM Ketua Hima minimal 3 karakter',
                'max_length' => 'NIM Ketua Hima maksimal 20 karakter',
                'alpha_numeric' => 'NIM Ketua Hima hanya boleh berisi huruf dan angka',
            ]
        ],
        'namaKetuaPelaksana' => [
            'label' => 'Nama Ketua Pelaksana',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Ketua Pelaksana tidak boleh kosong',
                'min_length' => 'Nama Ketua Pelaksana minimal 3 karakter',
                'max_length' => 'Nama Ketua Pelaksana maksimal 50 karakter',
                'regex_match' => 'Nama Ketua Pelaksana hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'nimKetuaPelaksana' => [
            'label' => 'NIM Ketua Pelaksana',
            'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'errors' => [
                'required' => 'NIM Ketua Pelaksana tidak boleh kosong',
                'min_length' => 'NIM Ketua Pelaksana minimal 3 karakter',
                'max_length' => 'NIM Ketua Pelaksana maksimal 20 karakter',
                'alpha_numeric' => 'NIM Ketua Pelaksana hanya boleh berisi huruf dan angka',
            ]
        ],
        'namaOrganisasi' => [
            'label' => 'Nama Organisasi',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Organisasi tidak boleh kosong',
                'min_length' => 'Nama Organisasi minimal 3 karakter',
                'max_length' => 'Nama Organisasi maksimal 50 karakter',
                'regex_match' => 'Nama Organisasi hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'namaKegiatan' => [
            'label' => 'Nama Kegiatan',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Kegiatan tidak boleh kosong',
                'min_length' => 'Nama Kegiatan minimal 3 karakter',
                'max_length' => 'Nama Kegiatan maksimal 50 karakter',
                'regex_match' => 'Nama Kegiatan hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'namaPenanggungJawab' => [
            'label' => 'Nama Penanggung Jawab',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Penanggung Jawab tidak boleh kosong',
                'min_length' => 'Nama Penanggung Jawab minimal 3 karakter',
                'max_length' => 'Nama Penanggung Jawab maksimal 50 karakter',
                'regex_match' => 'Nama Penanggung Jawab hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'kontakPenanggungJawab' => [
            'label' => 'Kontak Penanggung Jawab',
            'rules' => 'required|min_length[3]|max_length[50]|numeric',
            'errors' => [
                'required' => 'Kontak Penanggung Jawab tidak boleh kosong',
                'min_length' => 'Kontak Penanggung Jawab minimal 3 karakter',
                'max_length' => 'Kontak Penanggung Jawab maksimal 50 karakter',
                'numeric' => 'Kontak Penanggung Jawab hanya boleh berisi angka ',
            ]
        ],
        'uuidRuangan' => [
            'label' => 'Ruangan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Harap memilih Ruangan',
            ]
        ],
        'tanggalAwal' => [
            'label' => 'Tanggal Awal',
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal Awal tidak boleh kosong',
                'valid_date' => 'Tanggal Awal tidak valid',
            ]
        ],
        'tanggalAkhir' => [
            'label' => 'Tanggal Akhir',
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal Akhir tidak boleh kosong',
                'valid_date' => 'Tanggal Akhir tidak valid',
            ]
        ],
    ]);
    public array $peminjamanAlatBahan = ([
        'jenisSurat' => [
            'label' => 'Jenis Surat',
            'rules' => 'required|in_list[peminjaman_alat_bahan]',
            'errors' => [
                'required' => 'Jenis Surat tidak boleh kosong',
                'in_list' => 'Harap memilih Jenis Surat',
            ]
        ],
        'noSuratPeminjam' => [
            'label' => 'Nomor Surat Peminjam',
            'rules' => 'required|is_unique[surat_t_peminjaman.no_surat_peminjam]|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9\/\-., ]+$/]',
            'errors' => [
                'required' => 'Nomor Surat Peminjam tidak boleh kosong',
                'is_unique' => 'Nomor Surat Peminjam sudah digunakan',
                'min_length' => 'Nomor Surat Peminjam minimal 3 karakter',
                'max_length' => 'Nomor Surat Peminjam maksimal 50 karakter',
                'regex_match' => 'Nomor Surat Peminjam hanya boleh berisi huruf, angka dan tanda baca (-), (/), (.)',
            ]
        ],
        'tanggalAwal' => [
            'label' => 'Tanggal Awal',
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal Awal tidak boleh kosong',
                'valid_date' => 'Tanggal Awal tidak valid',
            ]
        ],
        'tanggalAkhir' => [
            'label' => 'Tanggal Akhir',
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal Akhir tidak boleh kosong',
                'valid_date' => 'Tanggal Akhir tidak valid',
            ]
        ],
        'namaHima' => [
            'label' => 'Nama Hima',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Hima tidak boleh kosong',
                'min_length' => 'Nama Hima minimal 3 karakter',
                'max_length' => 'Nama Hima maksimal 50 karakter',
                'regex_match' => 'Nama Hima hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'namaKetuaHima' => [
            'label' => 'Nama Ketua Hima',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Ketua Hima tidak boleh kosong',
                'min_length' => 'Nama Ketua Hima minimal 3 karakter',
                'max_length' => 'Nama Ketua Hima maksimal 50 karakter',
                'regex_match' => 'Nama Ketua Hima hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'nimKetuaHima' => [
            'label' => 'NIM Ketua Hima',
            'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'errors' => [
                'required' => 'NIM Ketua Hima tidak boleh kosong',
                'min_length' => 'NIM Ketua Hima minimal 3 karakter',
                'max_length' => 'NIM Ketua Hima maksimal 20 karakter',
                'alpha_numeric' => 'NIM Ketua Hima hanya boleh berisi huruf dan angka',
            ]
        ],
        'namaKetuaPelaksana' => [
            'label' => 'Nama Ketua Pelaksana',
            'rules' => 'required|min_length[3]|max_length[50]|regex_match[/^[a-zA-Z0-9., ]+$/]',
            'errors' => [
                'required' => 'Nama Ketua Pelaksana tidak boleh kosong',
                'min_length' => 'Nama Ketua Pelaksana minimal 3 karakter',
                'max_length' => 'Nama Ketua Pelaksana maksimal 50 karakter',
                'regex_match' => 'Nama Ketua Pelaksana hanya boleh berisi huruf, spasi dan tanda baca',
            ]
        ],
        'nimKetuaPelaksana' => [
            'label' => 'NIM Ketua Pelaksana',
            'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric',
            'errors' => [
                'required' => 'NIM Ketua Pelaksana tidak boleh kosong',
                'min_length' => 'NIM Ketua Pelaksana minimal 3 karakter',
                'max_length' => 'NIM Ketua Pelaksana maksimal 20 karakter',
                'alpha_numeric' => 'NIM Ketua Pelaksana hanya boleh berisi huruf dan angka',
            ]
        ]
    ]);
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
