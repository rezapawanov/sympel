<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewirausahaan_model extends CI_Model {
    
    function getAll($limit=0, $offset=0, $filter=[]):array{
        $query = "select masuk.id_siswa, masuk.tanggal_absen, masuk.masuk, keluar.keluar, ms.nama_siswa, mk.nama_kelas from (
            select id_siswa, tanggal_absen, tahun_ajaran, min(waktu_absen) as masuk
            from absen a
            where a.keterangan = 'masuk'
            group by id_siswa, tanggal_absen, tahun_ajaran
            ) masuk
            left join
            (
            select id_siswa, tanggal_absen, tahun_ajaran, max(waktu_absen) as keluar
            from absen a
            where a.keterangan = 'keluar'
            group by id_siswa, tanggal_absen, tahun_ajaran
            ) keluar on (keluar.id_siswa = masuk.id_siswa and keluar.tanggal_absen = masuk.tanggal_absen)
            left join mst_siswa ms on ms.id_siswa = masuk.id_siswa
            left join mst_kelas mk on mk.id_kelas = ms.id_kelas ";
        $query .= "where masuk.tanggal_absen >= '2024-01-01' ";
        $query .= "and masuk.tanggal_absen <= '2024-03-01' order by tanggal_absen, nama_siswa asc limit 10 offset 10;";

        return [];
    }


}