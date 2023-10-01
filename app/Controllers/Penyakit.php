<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;
use Dompdf\Dompdf;

define('_TITLE', 'Penyakit');

class Penyakit extends BaseController
{
    protected $penyakitModel;

    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
    }

    public function index()
    {
        $penyakit = $this->penyakitModel->findAll();

        $data = [
            'title' => _TITLE,
            'penyakit' => $penyakit
        ];
        // dd($data);
        return view('penyakit/penyakit', $data);
    }

    public function tambahPenyakit()
    {
        // Ambil kode terakhir
        $lastKode = $this->penyakitModel->selectMax('kode')->get()->getRow()->kode;

        // Jika tidak ada kode sebelumnya, gunakan G01 sebagai awal
        if (empty($lastKode)) {
            $newKode = 'P01';
        } else {
            // Ekstrak angka dari kode terakhir, tambahkan 1, dan format ulang
            $lastNumber = intval(substr($lastKode, 1));
            $newNumber = $lastNumber + 1;
            $newKode = 'P' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        }

        $data = [
            'title' => _TITLE,
            'kode' => $newKode
        ];

        // Tampilkan form untuk menambahkan gejala dengan kode otomatis
        return view('penyakit/tambah-penyakit', $data);
    }

    public function simpan()
    {
        $this->penyakitModel->save([
            'kode' => $this->request->getVar('kode'),
            'penyakit' => $this->request->getVar('penyakit'),
            'penyebab' => $this->request->getVar('penyebab'),
            'solusi' => $this->request->getVar('solusi'),
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Penyakit');

        // return redirect()->to(view('content/device'));
        return redirect()->to('/penyakit');
    }

    public function hapus($id)
    {
        $this->penyakitModel->delete($id);
        session()->setFlashdata('message', 'Penyakit Berhasil Dihapus');
        return redirect()->to('/penyakit');
    }

    public function ubah($id)
    {
        $data = [
            'title' => _TITLE,
            'penyakit' => $this->penyakitModel->editPenyakit($id)
        ];
        // dd($data);
        return view('penyakit/edit-penyakit', $data);
    }

    public function edit($id)
    {
        $this->penyakitModel->save([
            'id_penyakit' => $id,
            'kode' => $this->request->getVar('kode'),
            'penyakit' => $this->request->getVar('penyakit'),
            'penyebab' => $this->request->getVar('penyebab'),
            'solusi' => $this->request->getVar('solusi'),
        ]);

        session()->setFlashdata('message', 'Data ' . $this->request->getVar('kode') . ' Berhasil Diubah');

        // return redirect()->to(view('content/device'));
        return redirect()->to('/penyakit');
    }

    public function exportPDF()
    {
        $penyakit = $this->penyakitModel->findAll();

        $data = [
            'penyakit' => $penyakit
        ];

        $view = view('pdf/penyakit-pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data-penyakit', array('Attachment' => false));
    }
}
