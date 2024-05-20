<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Siswa_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data siswa";
        $d['siswa'] = $this->Siswa_model->siswa();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('siswa/siswa');
        $this->load->view('bottom');
    }



    public function siswa_detail($id_ppdb)
    {   
        $d['judul'] = "Data Calon Siswa";
        $d['judul2'] = "Detail";
        $get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
            $d['nama_sekolah'] = $get->nama_sekolah;
            $d['alamat_sekolah'] = $get->alamat;
            $d['website'] = $get->website;
        $get = $this->db->query("SELECT * FROM ppdb_siswa WHERE id_ppdb = '$id_ppdb'")->row();
        $d['id_ppdb'] = $get->id_ppdb;
        $d['no_pendaftaran'] = $get->no_pendaftaran;
        $d['jenis_pendaftaran'] = $get->jenis_pendaftaran;
        $d['jalur_pendaftaran'] = $get->jalur_pendaftaran;
        $d['hobi'] = $get->hobi;
        $d['cita_cita'] = $get->cita_cita;
        $d['nama_siswa'] = $get->nama_siswa;
        $d['jenis_kelamin'] = $get->jenis_kelamin;
        $d['nik'] = $get->nik;
        $d['tempat_lahir'] = $get->tempat_lahir;
        $d['tanggal_lahir'] = $get->tanggal_lahir;
        $d['agama'] = $get->agama;
        $d['alamat'] = $get->alamat;
        $d['rt'] = $get->rt;
        $d['rw'] = $get->rw;
        $d['dusun'] = $get->dusun;
        $d['kelurahan'] = $get->kelurahan;
        $d['kabupaten'] = $get->kabupaten;
        $d['kode_pos'] = $get->kode_pos;
        $d['tempat_tinggal'] = $get->tempat_tinggal;
        $d['transportasi'] = $get->transportasi;
        $d['no_hp'] = $get->no_hp;
        $d['email'] = $get->email;
        $d['kewarganegaraan'] = $get->kewarganegaraan;
        $d['foto'] = $get->foto;
        
        $d['tinggi_badan'] = $get->tinggi_badan;
        $d['berat_badan'] = $get->berat_badan;
        $d['jarak_ke_sekolah'] = $get->jarak_ke_sekolah;
        $d['waktu_tempuh_ke_sekolah'] = $get->waktu_tempuh_ke_sekolah;
        $d['jumlah_saudara'] = $get->jumlah_saudara;

        $d['asal_sekolah'] = $get->asal_sekolah;
        $d['alamat_sekolah_asal'] = $get->alamat_sekolah_asal;

        $d['nama_ayah'] = $get->nama_ayah;
        $d['tahun_lahir_ayah'] = $get->tahun_lahir_ayah;
        $d['pendidikan_ayah'] = $get->pendidikan_ayah;
        $d['pekerjaan_ayah'] = $get->pekerjaan_ayah;
        $d['penghasilan_ayah'] = $get->penghasilan_ayah;

        $d['nama_ibu'] = $get->nama_ibu;
        $d['tahun_lahir_ibu'] = $get->tahun_lahir_ibu;
        $d['pendidikan_ibu'] = $get->pendidikan_ibu;
        $d['pekerjaan_ibu'] = $get->pekerjaan_ibu;
        $d['penghasilan_ibu'] = $get->penghasilan_ibu;

        $d['nama_wali'] = $get->nama_wali;
        $d['tahun_lahir_wali'] = $get->tahun_lahir_wali;
        $d['pendidikan_wali'] = $get->pendidikan_wali;
        $d['pekerjaan_wali'] = $get->pekerjaan_wali;
        $d['penghasilan_wali'] = $get->penghasilan_wali;
        $d['status'] = $get->status;

        $pembayaran = $this->db->where('id_ppdb', $id_ppdb)->order_by('id', 'DESC')->get('ppdb_pembayaran')->result_array();

        $total_bayar = 0;
        if($pembayaran){
            foreach($pembayaran as $val){
                $total_bayar += $val['bayar'];
            }
            $d['nominal_harus_bayar'] = $pembayaran[0]['nominal_harus_bayar'];
        }else{
            $d['nominal_harus_bayar'] = 0;
        }
        
        $d['total_bayar'] = $total_bayar;
        $d['sisa'] = $d['nominal_harus_bayar'] - $total_bayar;

        $d['uang_dana_bulanan'] = (!empty($pembayaran)) ? $pembayaran[0]['uang_dana_bulanan'] : 0;
        $d['uang_dana_tahunan'] = (!empty($pembayaran)) ? $pembayaran[0]['uang_dana_tahunan'] : 0;
        $d['atribut_topi_dasi_dll'] = (!empty($pembayaran)) ? $pembayaran[0]['atribut_topi_dasi_dll'] : 0;
        $d['pakaian_olahraga'] = (!empty($pembayaran)) ? $pembayaran[0]['pakaian_olahraga'] : 0;
        $d['pakaian_batik'] = (!empty($pembayaran)) ? $pembayaran[0]['pakaian_batik'] : 0;
        $d['pakaian_koko'] = (!empty($pembayaran)) ? $pembayaran[0]['pakaian_koko'] : 0;
        $d['program_keagamaan'] = (!empty($pembayaran)) ? $pembayaran[0]['program_keagamaan'] : 0;
        $d['jaket_almamater_sekolah'] = (!empty($pembayaran)) ? $pembayaran[0]['jaket_almamater_sekolah'] : 0;
        $d['buku_sampul_rapor_sttb'] = (!empty($pembayaran)) ? $pembayaran[0]['buku_sampul_rapor_sttb'] : 0;
        $d['kegiatan_perkemahan_terpadu'] = (!empty($pembayaran)) ? $pembayaran[0]['kegiatan_perkemahan_terpadu'] : 0;
        $d['notes'] = (!empty($pembayaran)) ? $pembayaran[0]['notes'] : 0;

        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('siswa/siswa_detail');
        $this->load->view('bottom');
    }


    public function siswa_edit($id_siswa)
    {
        $cek = $this->db->query("SELECT id_siswa FROM siswa_display WHERE id_siswa = '$id_siswa'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data siswa";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->siswa_model->siswa_edit($id_siswa);
            $data = $get->row();
            $d['nama_siswa'] = $data->nama_siswa;
            $d['tanggal_mulai'] = $data->tanggal_mulai;
            $d['tanggal_selesai'] = $data->tanggal_selesai;
            $d['id_siswa'] = $data->id_siswa;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('siswa/siswa_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function siswa_terima($id_ppdb = '')
    {
        $post = $this->input->post();
        if(isset($post['nominal_harus_dibayar'])){
            $data = [
                'id_ppdb' => $post['id_ppdb'],
                'nominal_harus_bayar' => $post['nominal_harus_dibayar'],
                'bayar' => $post['bayar'],
                'created_at' => date('Y-m-d H:i:s', time()),
                'uang_dana_bulanan' => $post['uang_dana_bulanan'],
                'uang_dana_tahunan' => $post['uang_dana_tahunan'],
                'atribut_topi_dasi_dll' => $post['atribut_topi_dasi_dll'],
                'pakaian_olahraga' => $post['pakaian_olahraga'],
                'pakaian_batik' => $post['pakaian_batik'],
                'pakaian_koko' => $post['pakaian_koko'],
                'program_keagamaan' => $post['program_keagamaan'],
                'jaket_almamater_sekolah' => $post['jaket_almamater_sekolah'],
                'buku_sampul_rapor_sttb' => $post['buku_sampul_rapor_sttb'],
                'kegiatan_perkemahan_terpadu' => $post['kegiatan_perkemahan_terpadu'],
                'sisa_pembayaran' => $post['sisa_pembayaran'],
            ];

            $insert = $this->db->insert('ppdb_pembayaran', $data);

            if($insert){
                $in['status'] = '1';
                $this->db->update("ppdb_siswa", $in, ['id_ppdb'=>$post['id_ppdb']]);

                $ppdb_siswa = $this->db->where('id_ppdb', $post['id_ppdb'])->get('ppdb_siswa')->row_array();

                $data_ppdb = [
                    'nama_siswa'    => $ppdb_siswa['nama_siswa'],
                    'jenis_kelamin' => $ppdb_siswa['jenis_kelamin'],
                    'tempat_lahir'  => $ppdb_siswa['tempat_lahir'],
                    'tanggal_lahir' => $ppdb_siswa['tanggal_lahir'],
                    'agama'         => $ppdb_siswa['agama'],
                    'alamat_jalan'  => $ppdb_siswa['alamat'],
                    'kelurahan'     => $ppdb_siswa['kelurahan'],
                    'kode_pos'      => $ppdb_siswa['kode_pos'],
                    'telepon'       => $ppdb_siswa['no_hp'],
                    'hp'            => $ppdb_siswa['no_hp'],
                    'email'         => $ppdb_siswa['email'],
                    'foto'          => $ppdb_siswa['foto'],
                    'nama_ayah'     => $ppdb_siswa['nama_ayah'],
                    'pendidikan_ayah'   => $ppdb_siswa['pendidikan_ayah'],
                    'pekerjaan_ayah'    => $ppdb_siswa['pekerjaan_ayah'],
                    'nama_ibu'          => $ppdb_siswa['nama_ibu'],
                    'pendidikan_ibu'    => $ppdb_siswa['pendidikan_ibu'],
                    'pekerjaan_ibu'     => $ppdb_siswa['pekerjaan_ibu'],
                    'nama_wali'         => $ppdb_siswa['nama_wali'],
                    'pendidikan_wali'   => $ppdb_siswa['pendidikan_wali'],
                    'pekerjaan_wali'    => $ppdb_siswa['pekerjaan_wali'],
                    'nama_sekolah'      => $ppdb_siswa['asal_sekolah'],
                    'alamat_sekolah'    => $ppdb_siswa['alamat_sekolah_asal'],
                    'aktif_siswa'       => '1',
                    'id_ppdb'           => $ppdb_siswa['id_ppdb']
                ];

                $this->db->insert('mst_siswa', $data_ppdb);

                $res = ['success'=>true, 'message'=>'Data berhasil di simpan'];
            }else{
                $res = ['success'=>false, 'message'=>'Data gagal di simpan'];
            }

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($res);
        }

        // $in['status'] = '1';
        // $where['id_ppdb']     = $id_ppdb;
        // $this->db->update("ppdb_siswa", $in, $where);
        // echo '<script>
        // alert("Update Status Calon Siswa Berhasil")
        // document.location.href="' . base_url() . 'siswa/siswa_detail/'.$id_ppdb.'"
        // </script>';
    }
    
    public function hapus_siswa($id)
    {
        $where['id_ppdb'] = $id;
        $this->db->delete("ppdb_siswa", $where);
        $this->session->set_flashdata("success", "Hapus Data Kelulusan Berhasil");
        redirect("siswa");  
    }

    public function cetak_pembayaran($id = ''){
        $get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();

        $d['nama_sekolah'] = $get->nama_sekolah;
        $d['alamat_sekolah'] = $get->alamat;
        $d['website'] = $get->website;

        $ppdb = $this->db->where('id_ppdb', $id)->get('ppdb_siswa')->row();
        $siswa = $this->db->where('nisn', $ppdb->nik)->get('mst_siswa')->row();
        $pembayaran = $this->db->where('id_ppdb', $ppdb->id_ppdb)->order_by('created_at', 'DESC')->get('ppdb_pembayaran')->result();

        if(empty($pembayaran)){
            $this->session->set_flashdata('failed_print', 'Belum ada pembayaran!');
            return redirect('siswa/siswa_detail/'.$id);
        } 
            

        $d['nama_siswa'] = $ppdb->nama_siswa;

        $d['nominal_harus_bayar'] = $pembayaran[0]->nominal_harus_bayar;
        $d['bayar'] = $pembayaran[0]->bayar;
        $d['kembalian'] = $d['nominal_harus_bayar'] - $d['bayar'];
        $d['uang_dana_bulanan'] = (!empty($pembayaran)) ? $pembayaran[0]->uang_dana_bulanan : 0;
        $d['uang_dana_tahunan'] = (!empty($pembayaran)) ? $pembayaran[0]->uang_dana_tahunan : 0;
        $d['atribut_topi_dasi_dll'] = (!empty($pembayaran)) ? $pembayaran[0]->atribut_topi_dasi_dll : 0;
        $d['pakaian_olahraga'] = (!empty($pembayaran)) ? $pembayaran[0]->pakaian_olahraga : 0;
        $d['pakaian_batik'] = (!empty($pembayaran)) ? $pembayaran[0]->pakaian_batik : 0;
        $d['pakaian_koko'] = (!empty($pembayaran)) ? $pembayaran[0]->pakaian_koko : 0;
        $d['program_keagamaan'] = (!empty($pembayaran)) ? $pembayaran[0]->program_keagamaan : 0;
        $d['jaket_almamater_sekolah'] = (!empty($pembayaran)) ? $pembayaran[0]->jaket_almamater_sekolah : 0;
        $d['buku_sampul_rapor_sttb'] = (!empty($pembayaran)) ? $pembayaran[0]->buku_sampul_rapor_sttb : 0;
        $d['kegiatan_perkemahan_terpadu'] = (!empty($pembayaran)) ? $pembayaran[0]->kegiatan_perkemahan_terpadu : 0;
        $d['notes'] = $pembayaran[0]->notes;

        $this->load->view('siswa/cetak_pembayaran', $d);
    }
}
