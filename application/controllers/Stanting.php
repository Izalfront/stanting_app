<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stanting extends CI_Controller
{

    public function index()
    {

        $this->load->view('add');
    }

    public function proses()
    {
        $inputData = [
            'Nama_anak' => $this->input->post('Nama_anak'),
            'Tanggal_pengukuran' => $this->input->post('Tanggal_pengukuran'),
            'Bulan' => $this->input->post('Bulan'),
            'Jenis_kelamin' => $this->input->post('Jenis_kelamin'),
            'Berat_badan' => $this->input->post('Berat_badan'),
            'Tinggi_badan' => $this->input->post('Tinggi_badan'),
        ];

        $this->load->model('StantingModel');
        $this->StantingModel->insertUser($inputData);
        redirect('welcome');
    }

    public function calculateGizi()
    {
        $inputData = [
            'Bulan' => $this->input->post('Bulan'),
            'Jenis_kelamin' => $this->input->post('Jenis_kelamin'),
            'Berat_badan' => $this->input->post('Berat_badan'),
            'Tinggi_badan' => $this->input->post('Tinggi_badan'),
        ];

        $this->load->model('StantingModel');
        $weightData = $this->StantingModel->getWeightData(
            $inputData['Bulan'],
            $inputData['Jenis_kelamin'],
            $inputData['Berat_badan']
        );
        $heightData = $this->StantingModel->getHeightData(
            $inputData['Bulan'],
            $inputData['Jenis_kelamin'],
            $inputData['Tinggi_badan']
        );

        $giziStatus = $this->getGiziStatus($inputData['Berat_badan'], $weightData);
        $TinggiStatus = $this->getTinggiStatus($inputData['Tinggi_badan'], $heightData);
        $giziStatusTinggiBadan = $this->getGiziStatusTinggiBadan($inputData['Berat_badan'], $weightData);

        $data = [
            'giziStatus' => $giziStatus,
            'TinggiStatus' => $TinggiStatus,
            'giziStatusTinggiBadan' => $giziStatusTinggiBadan,
        ];

        $this->load->view('welcome_message', $data);
    }

    private function getGiziStatus($berat_badan, $weightData)
    {
        if ($berat_badan < $weightData->sd_minus_3) {
            return "Berat Badan Sangat Kurang";
        } elseif ($berat_badan >= $weightData->sd_minus_3 && $berat_badan < $weightData->sd_minus_2) {
            return "Berat Badan Kurang";
        } elseif ($berat_badan >= $weightData->sd_minus_2 && $berat_badan < $weightData->sd_plus_1) {
            return "Berat Badan Normal";
        } elseif ($berat_badan >= $weightData->sd_plus_1) {
            return "Risiko Berat Badan Lebih";
        }
    }

    private function getTinggiStatus($tinggi_badan, $heightData)
    {
        if ($tinggi_badan < $heightData->sd_minus_3) {
            return "Sangat Pendek";
        } elseif ($tinggi_badan >= $heightData->sd_minus_3 && $tinggi_badan < $heightData->sd_minus_2) {
            return "Pendek";
        } elseif ($tinggi_badan >= $heightData->sd_minus_2 && $tinggi_badan <= $heightData->sd_plus_3) {
            return "Normal";
        } elseif ($tinggi_badan > $heightData->sd_plus_3) {
            return "Tinggi";
        }
    }

    private function getGiziStatusTinggiBadan($berat_badan, $weightData)
    {
        if ($berat_badan < $weightData->sd_minus_3) {
            return "Gizi Buruk";
        } elseif ($berat_badan >= $weightData->sd_minus_3 && $berat_badan < $weightData->sd_minus_2) {
            return "Gizi Kurang";
        } elseif ($berat_badan >= $weightData->sd_minus_2 && $berat_badan <= $weightData->sd_plus_3) {
            return "Normal";
        } elseif ($berat_badan > $weightData->sd_plus_3) {
            return "Gizi Lebih";
        }
    }
}
