<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;
use App\Models\HasilDiagnosisModel;

define('_TITLE', 'Dashboard');

class Dashboard extends BaseController
{
    protected $penyakitModel, $gejalaModel, $diagnosisModel;

    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
        $this->gejalaModel = new GejalaModel();
        $this->diagnosisModel = new HasilDiagnosisModel();
    }

    public function index()
    {
        // Query untuk menghitung total munculnya masing-masing penyakit
        $data1 = $this->diagnosisModel->select('penyakit, COUNT(*) as total')
            ->groupBy('penyakit')
            ->get()
            ->getResult();

        // Siapkan data untuk dikirim ke tampilan
        $labels = [];
        $totals = [];

        foreach ($data1 as $row) {
            $labels[] = $row->penyakit;
            $totals[] = $row->total;
        }

        // $dataToView = [
        //     'labels' => json_encode($labels),
        //     'totals' => json_encode($totals),
        // ];

        $data = [
            'title' => _TITLE,
            'totalPenyakit' => $this->penyakitModel->totalPenyakit(),
            'totalGejala' => $this->gejalaModel->totalGejala(),
            'totalDiagnosis' => $this->diagnosisModel->totalDiagnosis(),
            'labels' => json_encode($labels),
            'totals' => json_encode($totals),
        ];
        // dd($data);
        return view('dashboard', $data);
    }
}
