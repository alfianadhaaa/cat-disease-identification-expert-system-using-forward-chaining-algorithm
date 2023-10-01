<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use Dompdf\Dompdf;

define('_TITLE', 'Gejala');

class Gejala extends BaseController
{
    protected $gejalaModel;

    function __construct()
    {
        $this->gejalaModel = new GejalaModel();
    }

    public function index()
    {
        $gejala = $this->gejalaModel->findAll();

        $data = [
            'title' => _TITLE,
            'gejala' => $gejala
        ];
        // dd($data);
        return view('gejala', $data);
    }

    public function tambahGejala()
    {
        // Ambil kode terakhir
        $lastKode = $this->gejalaModel->selectMax('kode')->get()->getRow()->kode;

        // Jika tidak ada kode sebelumnya, gunakan G01 sebagai awal
        if (empty($lastKode)) {
            $newKode = 'G01';
        } else {
            // Ekstrak angka dari kode terakhir, tambahkan 1, dan format ulang
            $lastNumber = intval(substr($lastKode, 1));
            $newNumber = $lastNumber + 1;
            $newKode = 'G' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        }

        $data = [
            'title' => _TITLE,
            'kode' => $newKode
        ];

        // Tampilkan form untuk menambahkan gejala dengan kode otomatis
        return view('gejala-tambah', $data);
    }

    public function simpan()
    {
        $this->gejalaModel->save([
            'kode' => $this->request->getVar('kode'),
            'gejala' => $this->request->getVar('gejala'),
        ]);

        session()->setFlashdata('message', 'Gejala Berhasil Ditambahkan');

        // return redirect()->to(view('content/device'));
        return redirect()->to('/gejala');
    }

    public function hapus($id)
    {
        $this->gejalaModel->delete($id);
        session()->setFlashdata('message', 'Gejala Berhasil Dihapus');
        return redirect()->to('gejala');
    }

    public function ubah($id)
    {
        $data = [
            'title' => _TITLE,
            'gejala' => $this->gejalaModel->editGejala($id)
        ];
        // dd($data);
        return view('gejala-edit', $data);
    }

    public function edit($id)
    {
        $this->gejalaModel->save([
            'id_gejala' => $id,
            'kode' => $this->request->getVar('kode'),
            'gejala' => $this->request->getVar('gejala')
        ]);

        session()->setFlashdata('message', 'Data ' . $this->request->getVar('kode') . ' Berhasil Diubah');

        // return redirect()->to(view('content/device'));
        return redirect()->to('/gejala');
    }

    public function exportPDF()
    {
        $gejala = $this->gejalaModel->findAll();

        $data = [
            'gejala' => $gejala
        ];

        $view = view('pdf/gejala-pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('gejala', array('Attachment' => false));
    }
}
