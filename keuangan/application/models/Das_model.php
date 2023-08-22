<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Das_model extends CI_Model
{

  public function das_sumber_dana()
  {
    $q = $this->db->query("SELECT * FROM das_sumber_dana ORDER BY id_das_sumber_dana DESC");
    return $q;
  }

  public function das_kategori()
  {
    $q = $this->db->query("SELECT * FROM das_kategori ORDER BY id_das_kategori DESC");
    return $q;
  }

  public function das_sisa()
  {
    $q = $this->db->query("SELECT * FROM das_sisa ORDER BY id_das_sisa DESC");
    return $q;
  }

  public function das()
  {
    $q = $this->db->query("SELECT * FROM das 
    INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori
    INNER JOIN mst_user ON das.id_user = mst_user.id_user 
    INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan  ORDER BY id_das DESC");
    return $q;
  }

  public function das_bendahara()
  {
    $q = $this->db->query("SELECT * FROM das_bendahara 
    INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori
    INNER JOIN mst_user ON das_bendahara.id_user = mst_user.id_user 
    INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan  ORDER BY id_das_bendahara DESC");
    return $q;
  }

  public function das_user($id_das)
  {
    $q = $this->db->query("SELECT * FROM das_user  WHERE id_das = '$id_das' ORDER BY id_das_user DESC");
    return $q;
  }

 
  public function das_user_bendahara($id_das_bendahara)
  {
    $q = $this->db->query("SELECT * FROM das_user_bendahara  WHERE id_das_bendahara = '$id_das_bendahara' ORDER BY id_das_user_bendahara DESC");
    return $q;
  }

  public function das_saya($id_user)
  {
    $q = $this->db->query("SELECT das_user.tanggal,das_user.total_terima,das_user.sisa_saldo,das_user.id_das,das_user.id_das_user,das_user.keterangan,das_user.no_das,kegiatan,jenis_dana,tahun_ajaran,open FROM das_user 
        INNER JOIN das ON das_user.id_das = das.id_das 
        INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori
        INNER JOIN mst_user ON das.id_user = mst_user.id_user  WHERE das.id_user = '$id_user' ORDER BY id_das_user DESC");
    return $q;
  }


  public function das_saya_kelola($id_das_user)
  {
    $q = $this->db->query("SELECT * FROM das_user_output WHERE id_das_user = '$id_das_user' ORDER BY id_das_user_output DESC");
    return $q;
  }

  public function das_bendahara_kelola($id_das_user_bendahara)
  {
    $q = $this->db->query("SELECT * FROM das_user_bendahara_output WHERE id_das_user_bendahara = '$id_das_user_bendahara' ORDER BY id_das_user_bendahara_output DESC");
    return $q;
  }

  public function das_sisa_kelola($id_das_sisa)
  {
    $q = $this->db->query("SELECT * FROM das_sisa_output WHERE id_das_sisa = '$id_das_sisa' ORDER BY id_das_sisa_output DESC");
    return $q;
  }
}
