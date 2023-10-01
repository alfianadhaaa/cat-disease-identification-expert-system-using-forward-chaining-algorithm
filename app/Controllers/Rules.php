<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengetahuanModel;
use App\Models\PenyakitModel;
use App\Models\RulesModel;
use Dompdf\Dompdf;

define('_TITLE', 'Rules');

class Rules extends BaseController
{
    protected $rulesModel, $penyakitModel, $pengetahuanModel;

    public function __construct()
    {
        $this->rulesModel = new RulesModel();
        $this->penyakitModel = new PenyakitModel();
        $this->pengetahuanModel = new PengetahuanModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE,
            'rules' => $this->rulesModel->findAll(),
            'penyakit' => $this->penyakitModel->findAll()
        ];
        // dd($data);
        return view('rules', $data);
    }

    public function tambahRulesGejala()
    {
        $this->pengetahuanModel->save([
            'gejala' => $this->request->getVar('gejala'),
            'penyakit' => $this->request->getVar('penyakit'),
        ]);

        session()->setFlashdata('message', 'Sukses Menambahkan Gejala Pada Penyakit');

        // return redirect()->to(view('content/device'));
        return redirect()->to('/rules');
    }

    public function exportPDF()
    {
        $rules = $this->rulesModel->findAll();

        $data = [
            'rules' => $rules
        ];

        $view = view('pdf/rules-pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('gejala', array('Attachment' => false));
    }
}
