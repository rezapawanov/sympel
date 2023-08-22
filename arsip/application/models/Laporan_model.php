<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function arsip($tgl_awal, $tgl_akhir, $id_ruangan, $id_lemari, $id_rak, $id_box, $id_map, $id_urut, $jenis_dokumen)
    {
        if ($id_ruangan != "" && $id_ruangan != "all") {
            $param = "AND dokumen.id_ruangan = '$id_ruangan'";
        } else {
            $param =  '';
        }

        if ($id_lemari != "" && $id_lemari != "all") {
            $param2 = "AND dokumen.id_lemari = '$id_lemari'";
        } else {
            $param2 =  '';
        }

        if ($id_rak != "" && $id_rak != "all") {
            $param3 = "AND dokumen.id_rak = '$id_rak'";
        } else {
            $param3 =  '';
        }

        if ($id_box != "" && $id_box != "all") {
            $param4 = "AND dokumen.id_box = '$id_box'";
        } else {
            $param4 =  '';
        }

        if ($id_map != "" && $id_map != "all") {
            $param4 = "AND dokumen.id_map = '$id_map'";
        } else {
            $param4 =  '';
        }

        if ($id_urut != "" && $id_urut != "all") {
            $param5 = "AND dokumen.id_urut = '$id_urut'";
        } else {
            $param5 =  '';
        }

        if ($jenis_dokumen != "" && $jenis_dokumen != "all") {
            $param6 = "AND dokumen.id_urut = '$jenis_dokumen'";
        } else {
            $param6 =  '';
        }

        $q = $this->db->query("SELECT * FROM dokumen 
                            INNER JOIN mst_jenis_dokumen ON dokumen.id_jenis_dokumen = mst_jenis_dokumen.id_jenis_dokumen 
									INNER JOIN mst_ruangan ON dokumen.id_ruangan = mst_ruangan.id_ruangan 
									INNER JOIN mst_lemari ON dokumen.id_lemari = mst_lemari.id_lemari 
									INNER JOIN mst_rak ON dokumen.id_rak = mst_rak.id_rak 
									INNER JOIN mst_box ON dokumen.id_box = mst_box.id_box 
									INNER JOIN mst_map ON dokumen.id_map = mst_map.id_map 
									INNER JOIN mst_urut ON dokumen.id_urut = mst_urut.id_urut WHERE tanggal_dokumen >= '$tgl_awal' AND tanggal_dokumen <= '$tgl_akhir' $param $param2 $param3 $param4 $param5 $param6 ORDER BY tanggal_dokumen DESC");
        return $q;
    }
}
