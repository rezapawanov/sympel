<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function arsip($tgl_awal, $tgl_akhir, $id_ruangan, $id_lemari, $id_rak, $id_box, $id_map, $id_urut, $jenis_barang)
    {
        if ($id_ruangan != "" && $id_ruangan != "all") {
            $param = "AND sarpras.id_ruangan = '$id_ruangan'";
        } else {
            $param =  '';
        }

        if ($id_lemari != "" && $id_lemari != "all") {
            $param2 = "AND sarpras.id_lemari = '$id_lemari'";
        } else {
            $param2 =  '';
        }

        if ($id_rak != "" && $id_rak != "all") {
            $param3 = "AND sarpras.id_rak = '$id_rak'";
        } else {
            $param3 =  '';
        }

        if ($id_box != "" && $id_box != "all") {
            $param4 = "AND sarpras.id_box = '$id_box'";
        } else {
            $param4 =  '';
        }

        if ($id_map != "" && $id_map != "all") {
            $param4 = "AND sarpras.id_map = '$id_map'";
        } else {
            $param4 =  '';
        }

        if ($id_urut != "" && $id_urut != "all") {
            $param5 = "AND sarpras.id_urut = '$id_urut'";
        } else {
            $param5 =  '';
        }

        if ($jenis_barang != "" && $jenis_barang != "all") {
            $param6 = "AND sarpras.id_jenis_barang = '$jenis_barang'";
        } else {
            $param6 =  '';
        }

        $q = $this->db->query("SELECT * FROM sarpras 
                            INNER JOIN mst_jenis_barang ON sarpras.id_jenis_barang = mst_jenis_barang.id_jenis_barang 
									INNER JOIN mst_ruangan ON sarpras.id_ruangan = mst_ruangan.id_ruangan 
									INNER JOIN mst_lemari ON sarpras.id_lemari = mst_lemari.id_lemari 
									INNER JOIN mst_rak ON sarpras.id_rak = mst_rak.id_rak 
									INNER JOIN mst_box ON sarpras.id_box = mst_box.id_box 
									INNER JOIN mst_map ON sarpras.id_map = mst_map.id_map 
									INNER JOIN mst_urut ON sarpras.id_urut = mst_urut.id_urut WHERE tanggal_sarpras >= '$tgl_awal' AND tanggal_sarpras <= '$tgl_akhir' $param $param2 $param3 $param4 $param5 $param6 ORDER BY tanggal_sarpras DESC");
        return $q;
    }
}
