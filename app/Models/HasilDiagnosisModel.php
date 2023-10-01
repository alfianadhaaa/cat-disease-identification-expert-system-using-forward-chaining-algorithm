<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilDiagnosisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hasil_diagnosis';
    protected $primaryKey       = 'id_diagnosis';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_pemilik',
        'nama_kucing',
        'penyakit',
        'gejala'
    ];

    public function totalDiagnosis()
    {
        return $this->db->table('hasil_diagnosis')->countAll();
    }

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
