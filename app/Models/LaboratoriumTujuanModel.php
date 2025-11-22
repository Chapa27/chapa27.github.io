<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumTujuanModel extends Model
{
    protected $table            = 'laboratorium_tujuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pelanggan', 
        'id_pengantar_lhu', 
        'kode_pengantar', 
        'id_laboratorium'
    ];

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

    public function get_data($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_laboratorium');
        $builder->select('master_laboratorium.id AS id_lab,nama_lab, mapp_setting_lab.kode_pengantar');
        $builder->join("mapp_setting_lab", "mapp_setting_lab.id_laboratorium = master_laboratorium.id");
        $builder->orderBy('master_laboratorium.id', 'ASC');
        $builder->where("mapp_setting_lab.kode_pengantar", $params);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
