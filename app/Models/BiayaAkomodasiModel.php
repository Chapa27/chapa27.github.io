<?php

namespace App\Models;

use CodeIgniter\Model;

class BiayaAkomodasiModel extends Model
{
    protected $table            = 'master_biaya_akomodasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['uraian', 'transport', 'uang_harian', 'is_active'];

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
    protected $validationRules      = [
        'uraian' => [
            'label' => 'Uraian',
            'rules' => 'required'
        ],
        'uang_harian' => [
            'label' => 'Uang harian',
            'rules' => 'required|numeric'
        ],
        'transport' => [
            'label' => 'Transport',
            'rules' => 'required'
        ]
    ];
    protected $validationMessages   = [
        'uraian' => [
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ]
        ],
        'uang_harian' => [
            'errors' => [
                'required' => '{field} tidak boleh kosong',
                'numeric' => '{field} harus berisi angka'
            ]
        ],
        'transport' => [
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ]
        ]
    ];
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
