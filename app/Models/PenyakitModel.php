<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyakit';
    protected $primaryKey       = 'id_penyakit';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode',
        'penyakit',
        'penyebab',
        'solusi'
    ];

    public function editPenyakit($id)
    {
        return $this->select('*')
            ->where('penyakit.id_penyakit', $id)
            ->first();
    }

    public function getPenyebabPengobatanByNamaPenyakit($nama_penyakit)
    {
        return $this->where('penyakit', $nama_penyakit)
            ->select('penyebab, solusi')
            ->first();
    }

    public function totalPenyakit()
    {
        return $this->db->table('penyakit')->countAll();
    }

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
