<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table            = 'buku_tamu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_antrian',
        'tanggal',
        'nama',
        'pengirim',
        'id_instansi',
        'id_keperluan',
        'jam_masuk',
        'jam_keluar',
        'no_telepon',
        'catatan',
        'jumlah_coolbox'
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

    public function get_data($today)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('buku_tamu');
        $builder->select('buku_tamu.id, buku_tamu.no_antrian, buku_tamu.nama, master_instansi.nama_instansi, 
        buku_tamu.jam_masuk, buku_tamu.jam_keluar, master_keperluan.keperluan');
        $builder->join("master_instansi", "master_instansi.id = buku_tamu.id_instansi");
        $builder->join("master_keperluan", "master_keperluan.id = buku_tamu.id_keperluan");
        $builder->where('tanggal', $today);
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
