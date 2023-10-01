<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\HasilDiagnosisModel;
use App\Models\PengetahuanModel;
use App\Models\PenyakitModel;
use Dompdf\Dompdf;

define('_TITLE', 'Diagnosis');

class Diagnosis extends BaseController
{
    protected $gejalaModel, $pengetahuanModel, $penyakitModel, $hasilDiagnosisModel;

    // Deklarasikan variabel data sebagai properti kelas
    // private $data = [];

    public function __construct()
    {
        $this->gejalaModel = new GejalaModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->penyakitModel = new PenyakitModel();
        $this->hasilDiagnosisModel = new HasilDiagnosisModel();
    }

    public function index()
    {
        $gejala = $this->gejalaModel->findAll();

        // Ambil kode terakhir
        $lastKode = $this->hasilDiagnosisModel->selectMax('id_diagnosis')->get()->getRow()->id_diagnosis;

        // Jika tidak ada kode sebelumnya, gunakan DG000001 sebagai awal
        if (empty($lastKode)) {
            $newKode = 'DG000001';
        } else {
            // Ekstrak angka dari kode terakhir, tambahkan 1, dan format ulang
            $lastNumber = intval(substr($lastKode, 2));
            $newNumber = $lastNumber + 1;
            $newKode = 'DG' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }

        $data = [
            'title' => _TITLE,
            'gejala' => $gejala,
            'idDiagnosis' => $newKode
        ];
        // dd($data);
        return view('diagnosis/diagnosis', $data);
    }

    public function diagnosis()
    {
        // Di sini, Anda mendapatkan daftar gejala yang dicentang
        $gejalaDicentang = $this->request->getVar('gejala');
        $namaPemilik = $this->request->getPost('namaPemilik');
        $namaKucing = $this->request->getPost('namaKucing');

        // Inisialisasi array untuk hasil diagnosa
        $penyakit = [];
        $penyebab = [];
        $pengobatan = [];

        if (!empty($gejalaDicentang)) {
            $pengetahuanModel = new PengetahuanModel();

            foreach ($gejalaDicentang as $gejala) {
                // Dapatkan daftar penyakit yang sesuai dengan gejala
                $penyakitSementara = $pengetahuanModel->getPenyakitByGejala($gejala);

                // Gabungkan penyakit yang sudah ada dengan penyakit baru
                $penyakit = array_merge($penyakit, $penyakitSementara);

                // Loop melalui penyakit yang ditemukan dan ambil penyebab dan pengobatan
                foreach ($penyakitSementara as $penyakitItem) {
                    $dataPenyebabPengobatan = $this->penyakitModel->getPenyebabPengobatanByNamaPenyakit($penyakitItem);

                    // Pastikan dataPenyebabPengobatan tidak null
                    if ($dataPenyebabPengobatan) {
                        $penyebab[$penyakitItem] = $dataPenyebabPengobatan['penyebab'];
                        $pengobatan[$penyakitItem] = $dataPenyebabPengobatan['solusi'];
                    } else {
                        // Jika null, berikan pesan atau tindakan yang sesuai
                        $penyebab[$penyakitItem] = "Penyebab tidak ditemukan";
                        $pengobatan[$penyakitItem] = "Pengobatan tidak ditemukan";
                    }
                }
            }

            // Hilangkan duplikasi penyakit
            $penyakit = array_unique($penyakit);
        }

        $kode = $this->request->getVar('idDiagnosis');

        // Simpan hasil identifikasi ke tabel 'hasil_identifikasi'
        if (!empty($penyakit)) {
            $dataHasilIdentifikasi = [
                'id_diagnosis' => $kode,
                'nama_pemilik' => $namaPemilik,
                'nama_kucing' => $namaKucing,
                'penyakit' => implode(', ', $penyakit),
            ];
            $this->hasilDiagnosisModel->insert($dataHasilIdentifikasi);
        }

        $data = [
            'title' => _TITLE,
            'namaPemilik' => $namaPemilik,
            'namaKucing' => $namaKucing,
            'penyakit' => $penyakit,
            'penyebab' => $penyebab,
            'pengobatan' => $pengobatan,
            'gejala' => $gejalaDicentang,
            'kode' => $kode
        ];

        $session = session();
        $session->set('namaPemilik', $namaPemilik);
        $session->set('namaKucing', $namaKucing);
        $session->set('penyakit', $penyakit);
        $session->set('penyebab', $penyebab);
        $session->set('pengobatan', $pengobatan);
        $session->set('gejala', $gejalaDicentang);
        $session->set('kode', $kode);

        // dd($data);
        // Tampilkan hasil penyakit yang mungkin
        return view('diagnosis/hasil-diagnosis', $data);
    }

    public function exportPDF()
    {
        $session = session();
        $namaPemilik = $session->get('namaPemilik');
        $namaKucing = $session->get('namaKucing');
        $penyakit = $session->get('penyakit');
        $penyebab = $session->get('penyebab');
        $pengobatan = $session->get('pengobatan');
        $gejalaDicentang = $session->get('gejala');
        $kode = $session->get('kode');

        $data = [
            'namaPemilik' => $namaPemilik,
            'namaKucing' => $namaKucing,
            'penyakit' => $penyakit,
            'penyebab' => $penyebab,
            'pengobatan' => $pengobatan,
            'gejala' => $gejalaDicentang,
            'kode' => $kode
        ];

        $view = view('pdf/diagnosis-pdf', $data);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // $filename = 'diagnosis-' . $kode . 's/d' . $tgl2;
        // Output the generated PDF to Browser
        $dompdf->stream('diagnosis-' . $kode, array('Attachment' => false));
    }

    public function index2()
    {
        $gejala = $this->gejalaModel->findAll();

        // Ambil kode terakhir
        $lastKode = $this->hasilDiagnosisModel->selectMax('id_diagnosis')->get()->getRow()->id_diagnosis;

        // Jika tidak ada kode sebelumnya, gunakan DG000001 sebagai awal
        if (empty($lastKode)) {
            $newKode = 'DG000001';
        } else {
            // Ekstrak angka dari kode terakhir, tambahkan 1, dan format ulang
            $lastNumber = intval(substr($lastKode, 2));
            $newNumber = $lastNumber + 1;
            $newKode = 'DG' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }

        $data = [
            'title' => _TITLE,
            'gejala' => $gejala,
            'idDiagnosis' => $newKode
        ];
        // dd($data);
        return view('pengguna/diagnosis', $data);
    }

    public function diagnosis2()
    {
        // Di sini, Anda mendapatkan daftar gejala yang dicentang
        $gejalaDicentang = $this->request->getVar('gejala');
        $namaPemilik = $this->request->getPost('namaPemilik');
        $namaKucing = $this->request->getPost('namaKucing');

        // Inisialisasi array untuk hasil diagnosa
        $penyakit = [];
        $penyebab = [];
        $pengobatan = [];

        if (!empty($gejalaDicentang)) {
            $pengetahuanModel = new PengetahuanModel();

            foreach ($gejalaDicentang as $gejala) {
                // Dapatkan daftar penyakit yang sesuai dengan gejala
                $penyakitSementara = $pengetahuanModel->getPenyakitByGejala($gejala);

                // Gabungkan penyakit yang sudah ada dengan penyakit baru
                $penyakit = array_merge($penyakit, $penyakitSementara);

                // Loop melalui penyakit yang ditemukan dan ambil penyebab dan pengobatan
                foreach ($penyakitSementara as $penyakitItem) {
                    $dataPenyebabPengobatan = $this->penyakitModel->getPenyebabPengobatanByNamaPenyakit($penyakitItem);

                    // Pastikan dataPenyebabPengobatan tidak null
                    if ($dataPenyebabPengobatan) {
                        $penyebab[$penyakitItem] = $dataPenyebabPengobatan['penyebab'];
                        $pengobatan[$penyakitItem] = $dataPenyebabPengobatan['solusi'];
                    } else {
                        // Jika null, berikan pesan atau tindakan yang sesuai
                        $penyebab[$penyakitItem] = "Penyebab tidak ditemukan";
                        $pengobatan[$penyakitItem] = "Pengobatan tidak ditemukan";
                    }
                }
            }

            // Hilangkan duplikasi penyakit
            $penyakit = array_unique($penyakit);
        }

        $kode = $this->request->getVar('idDiagnosis');

        // Simpan hasil identifikasi ke tabel 'hasil_identifikasi'
        if (!empty($penyakit)) {
            $dataHasilIdentifikasi = [
                'id_diagnosis' => $kode,
                'nama_pemilik' => $namaPemilik,
                'nama_kucing' => $namaKucing,
                'penyakit' => implode(', ', $penyakit),
            ];
            $this->hasilDiagnosisModel->insert($dataHasilIdentifikasi);
        }

        $data = [
            'title' => _TITLE,
            'namaPemilik' => $namaPemilik,
            'namaKucing' => $namaKucing,
            'penyakit' => $penyakit,
            'penyebab' => $penyebab,
            'pengobatan' => $pengobatan,
            'gejala' => $gejalaDicentang,
            'kode' => $kode
        ];

        $session = session();
        $session->set('namaPemilik', $namaPemilik);
        $session->set('namaKucing', $namaKucing);
        $session->set('penyakit', $penyakit);
        $session->set('penyebab', $penyebab);
        $session->set('pengobatan', $pengobatan);
        $session->set('gejala', $gejalaDicentang);
        $session->set('kode', $kode);

        // dd($data);
        // Tampilkan hasil penyakit yang mungkin
        return view('pengguna/hasil-diagnosis', $data);
    }
}
