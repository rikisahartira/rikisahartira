<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan2 extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('input_matakuliah.php');
    }

    public function cetak()
    {
        $kodeMataKuliah = $this->input->post('kode');
        $namaMataKuliah = $this->input->post('nama');
        $sksMataKuliah = $this->input->post('sks');

        if ($sksMataKuliah == 4) {
            $sksUnggulan = "Unggulan SKS";
            $bobotnilai = "81 - 100";
            $status = "Tidak Remedial";
        } else if ($sksMataKuliah == 3) {
            $sksUnggulan = "SKS regular";
            $bobotnilai = "75 - 80";
            $status = "Tidak Remedial";
        } else if ($sksMataKuliah == 2) {
            $sksUnggulan = "SKS regular";
            $bobotnilai = "61 - 74";
            $status = "Tidak Remedial";
        } else if ($sksMataKuliah == 1) {
            $sksUnggulan = "SKS regular";
            $bobotnilai = "Nilai Dibawah 60";
            $status = "Remedial";
        }

        //membuat object untuk parsing data ke view yg dituju
        $data = [
            'kode' => $kodeMataKuliah,
            'nama' => $namaMataKuliah,
            'sks' => $sksMataKuliah,
            'unggulan' => $sksUnggulan,
            'range' => $bobotnilai,
            'Status' => $status
        ];

        //kirim ke view
        $this->load->view('output_matakuliah.html', $data);
    }
}
