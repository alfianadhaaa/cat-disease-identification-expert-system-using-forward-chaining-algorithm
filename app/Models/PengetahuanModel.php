<?php

namespace App\Models;

use CodeIgniter\Model;

class PengetahuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengetahuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'gejala',
        'penyakit'
    ];

    public function getPenyakitByGejala($gejala)
    {
        // Query untuk mencari penyakit berdasarkan gejala
        $query = $this->select('penyakit')->where('gejala', $gejala)->findAll();

        $penyakit = [];
        foreach ($query as $row) {
            $penyakit[] = $row['penyakit'];
        }

        return $penyakit;
    }

    public function getAturanPenyakit($penyakit)
    {
        // Tambahkan aturan-aturan penyakit berdasarkan nama penyakit
        $aturan = [];

        switch ($penyakit) {
            case 'ISPA':
                $aturan = ['Bersin', 'Pilek', 'Batuk', 'Mata berair', 'Demam'];
                break;
            case 'Diare':
                $aturan = ['Feses encer', 'Muntah', 'Lemas', 'Kehilangan nafsu makan'];
                break;
            case 'Kutu':
                $aturan = ['Gatal-gatal', 'Iritasi kulit', 'Rambut rontok'];
                break;
            case 'Cacing':
                $aturan = ['Diare', 'Muntah', 'Penurunan berat badan'];
                break;
            case 'Rabies':
                $aturan = ['Perubahan perilaku', 'Mulut berbusa', 'Kejang'];
                break;
            case 'Penyakit mata':
                $aturan = ['Air mata berlebihan', 'Gatal-gatal', 'Kemerahan', 'Bercak pada kornea'];
                break;
            case 'Penyakit kulit':
                $aturan = ['Keropeng', 'Lesi', 'Gatal', 'Iritasi'];
                break;
            case 'CKD':
                $aturan = ['Buang air berlebihan', 'Haus yang berlebihan', 'Penurunan berat badan'];
                break;
            case 'penyakit jantung':
                $aturan = ['Kelelahan', 'Sesak nafas', 'Batuk'];
                break;
            case 'Diabetes Mellitus':
                $aturan = ['Buang air lebih sering', 'Haus yang berlebihan', 'Penurunan berat badan'];
                break;
            case 'Tumor':
                $aturan = ['Bejolan tumor'];
                break;
                // Tambahkan aturan untuk penyakit lain di sini
        }

        return $aturan;
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
