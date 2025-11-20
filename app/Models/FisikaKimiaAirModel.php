<?php

namespace App\Models;

use CodeIgniter\Model;

class FisikaKimiaAirModel extends Model
{
    protected $table            = 'fisika_kimia_air';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_sampel',
        'id_jenis_sampel',
        'lokasi_pengambilan_sampel',
        'tgl_jam_ambil_sampel',
        'tgl_jam_terima_sampel',
        'metode_pemeriksaan',
        'volume_atau_berat',
        'jenis_wadah',
        'jenis_pengawet',
        'kode_pengantar',
        'id_laboratorium'
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
