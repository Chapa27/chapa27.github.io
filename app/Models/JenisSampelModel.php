<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\App;

class JenisSampelModel extends Model
{
    protected $table            = 'master_jenis_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis_sampel', 'pnbp', 'id_lab'];

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

    public function get_data()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_jenis_sampel');
        $builder->select('master_jenis_sampel.id, master_jenis_sampel.jenis_sampel, master_jenis_sampel.pnbp, master_laboratorium.id AS id_lab, master_laboratorium.nama_lab, master_laboratorium.is_active');
        $builder->join("master_laboratorium", "master_jenis_sampel.id_lab = master_laboratorium.id");
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
