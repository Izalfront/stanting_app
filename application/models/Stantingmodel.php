<?php

namespace App\Models;

use CI_Model;

class StantingModel extends CI_Model
{

    public function getUsersWithStantingData()
    {
        $this->db->select('user.*, hasil.BB_umur, hasil.TB_umur, hasil.BB_PB');
        $this->db->from('user');
        $this->db->join('hasil', 'user.ID_User = hasil.ID_User', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    // Mendapatkan data berat badan berdasarkan umur, jenis kelamin, dan berat badan input pengguna
    public function getWeightData($Bulan, $Jenis_kelamin, $Berat_badan, $Tinggi_badan)
    {
        if ($Jenis_kelamin == 'Laki-laki') {
            if ($Bulan >= 0 && $Bulan <= 60) {
                $query = $this->db->query("SELECT * FROM laki_berat_badan_0_60 WHERE umur_bulan = $Bulan");
            } elseif ($Bulan > 60 && $Bulan <= 144) {
                $query = $this->db->query("SELECT * FROM laki_berat_badan_60_144 WHERE umur_bulan = $Bulan");
            } elseif ($Tinggi_badan > 0 && $Tinggi_badan <= 24) {
                $query = $this->db->query("SELECT * FROM laki_bb_pb_0_24bln WHERE tinggi_badan = $Tinggi_badan AND berat_badan = $Berat_badan");
            } elseif ($Tinggi_badan > 24 && $Tinggi_badan <= 60) {
                $query = $this->db->query("SELECT * FROM laki_bb_pb_24_60bln WHERE tinggi_badan = $Tinggi_badan AND berat_badan = $Berat_badan");
            }
        } elseif ($Jenis_kelamin == 'Perempuan') {
            if ($Bulan >= 0 && $Bulan <= 60) {
                $query = $this->db->query("SELECT * FROM perempuan_berat_badan_0_60 WHERE umur_bulan = $Bulan");
            } elseif ($Bulan > 60 && $Bulan <= 144) {
                $query = $this->db->query("SELECT * FROM perempuan_berat_badan_60_144 WHERE umur_bulan = $Bulan");
            } elseif ($Tinggi_badan >= 0 && $Tinggi_badan <= 24) {
                $query = $this->db->query("SELECT * FROM perempuan_bb_pb_0_24 WHERE tinggi_badan = $Tinggi_badan AND berat_badan = $Berat_badan");
            } elseif ($Tinggi_badan > 24 && $Tinggi_badan <= 60) {
                $query = $this->db->query("SELECT * FROM perempuan_bb_pb_24_60 WHERE tinggi_badan = $Tinggi_badan AND berat_badan = $Berat_badan");
            }
        }

        if (isset($query)) {
            return $query->row();
        } else {
            return null;
        }
    }

    // Mendapatkan data tinggi badan berdasarkan Bulan, jenis kelamin, dan tinggi badan input pengguna
    public function getHeightData($Bulan, $Jenis_kelamin, $Tinggi_badan)
    {
        if ($Jenis_kelamin == 'Laki-laki') {
            if ($Bulan >= 0 && $Bulan <= 60) {
                $query = $this->db->query("SELECT * FROM laki_tinggi_badan_0_60 WHERE umur_bulan = $Bulan");
            } elseif ($Bulan > 60 && $Bulan <= 144) {
                $query = $this->db->query("SELECT * FROM laki_tinggi_badan_60_144 WHERE umur_bulan = $Bulan");
            }
        } elseif ($Jenis_kelamin == 'Perempuan') {
            if ($Bulan >= 0 && $Bulan <= 60) {
                $query = $this->db->query("SELECT * FROM perempuan_tinggi_badan_0_60 WHERE umur_bulan = $Bulan");
            } elseif ($Bulan > 60 && $Bulan <= 144) {
                $query = $this->db->query("SELECT * FROM perempuan_tinggi_badan_60_144 WHERE umur_bulan = $Bulan");
            }
        }

        if (isset($query)) {
            return $query->row();
        } else {
            return null;
        }
    }
}
