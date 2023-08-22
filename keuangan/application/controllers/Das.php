<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Das extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "bendahara" && $this->session->userdata('hak_akses') != "das") {
            redirect(base_url());
        } else {
            $this->load->Model('Das_model');
            $this->load->Model('Combo_model');
        }
    }


    public function ajax_das_user()
    {
        $id_das_user = $_GET['id_das_user'];
        $id_das = $_GET['id_das'];
        $get_status = $this->db->query("SELECT status FROM das WHERE id_das = '$id_das'")->row();
        $q = $this->db->query("SELECT das_user_output.keterangan,ada_nota,ada_bku,das_user_output.tanggal,id_das_user_output,status_das_user,jumlah,jenis_das FROM das_user_output INNER JOIN das_user ON das_user_output.id_das_user = das_user.id_das_user WHERE das_user_output.id_das_user = $id_das_user");
        $no = 1;
        echo '<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Jenis Dana</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah </th>
                        <th> Nota </th>
                        <th> BKP </th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>';
        foreach ($q->result_array() as $data) {
            if ($data['ada_nota'] == '1') {
                $ada_nota = '<label class="label label-success">Ada</label>';
            } else {
                $ada_nota = '<label class="label label-warning">Tidak Ada</label>';
            }

            if ($data['ada_bku'] == '1') {
                $ada_bku = '<label class="label label-success">Ada</label>';
            } else {
                $ada_bku = '<label class="label label-warning">Tidak Ada</label>';
            }
            echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $data['jenis_das'] . '</td>
                    <td>' . date("d-m-Y", strtotime($data['tanggal'])) . '</td>
                    <td>' . $data['keterangan'] . '</td>
                    <td>Rp ' . number_format($data['jumlah']) . '</td>
                    <td>' . $ada_nota . '</td>
                    <td>' . $ada_bku . '</td>
                    <td style="text-align:center;">';
            if ($get_status->status == 0 && $data['status_das_user'] == 0) {
                echo '<a class="btn btn-danger btn-xs" href="' . base_url() . 'das/das_user_kelola_hapus/' . $data['id_das_user_output'] . '/' . $id_das . '"><i class="fa fa-trash"> </i> </a>';
            }
            echo '</td>
				  </tr>';
            $no++;
        }
        echo '</tbody>
				 </table>';
    }

    public function index()
    {

        $d['judul'] = "Data DAS";
        $d['combo_user'] = $this->Combo_model->combo_user();
        $d['combo_das_kategori'] = $this->Combo_model->combo_das_kategori();
        $d['das'] = $this->Das_model->das();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das');
        $this->load->view('bottom');
    }

    public function das_bendahara()
    {

        $d['judul'] = "Dana Saya";
        $d['combo_das_kategori'] = $this->Combo_model->combo_das_kategori();
        $d['das_bendahara'] = $this->Das_model->das_bendahara();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_bendahara');
        $this->load->view('bottom');
    }

    public function das_sisa()
    {
        $get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
        $tahun_ajaran = $get_tahun->tahun_ajaran;
        $d['judul'] = "Data Dana Sisa";
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
        $d['das_sisa'] = $this->Das_model->das_sisa();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_sisa');
        $this->load->view('bottom');
    }

    public function das_kategori()
    {
        $get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
        $tahun_ajaran = $get_tahun->tahun_ajaran;
        $d['judul'] = "Data Kategori DAS";
        $d['combo_user'] = $this->Combo_model->combo_user();
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
        $d['das_kategori'] = $this->Das_model->das_kategori();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_kategori');
        $this->load->view('bottom');
    }

    public function das_sumber_dana()
    {
        $get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
        $tahun_ajaran = $get_tahun->tahun_ajaran;
        $d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
        $d['judul'] = "Data Sumber Dana Masuk";
        $d['das_sumber_dana'] = $this->Das_model->das_sumber_dana();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_sumber_dana');
        $this->load->view('bottom');
    }

    public function das_saya()
    {
        $id_user = $this->session->userdata("id");
        $d['judul'] = "Data DAS";
        $d['das_saya'] = $this->Das_model->das_saya($id_user);
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_saya');
        $this->load->view('bottom');
    }

    public function das_saya_kelola($id_das_user)
    {
        $get = $this->db->query("SELECT das_user.tanggal,das_user.total_terima,das_user.sisa_saldo,das_user.id_das,das_user.id_das_user,das_user.keterangan,das.status,das_user.status_das_user,das_user.no_das, jenis_dana, tahun_ajaran FROM das_user INNER JOIN das ON das_user.id_das = das.id_das 
        INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori WHERE id_das_user = '$id_das_user'")->row();
        $d['judul'] = "Kelola DAS";
        $d['das_saya_kelola'] = $this->Das_model->das_saya_kelola($id_das_user);
        $d['keterangan'] = $get->keterangan;
        $d['tanggal'] = $get->tanggal;
        $d['sisa_saldo'] = $get->sisa_saldo;
        $d['id_das_user'] = $get->id_das_user;
        $d['total_terima'] = $get->total_terima;
        $d['status'] = $get->status;
        $d['no_das'] = $get->no_das;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['status_das_user'] = $get->status_das_user;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_saya_kelola');
        $this->load->view('bottom');
    }

    public function das_saya_kelola_excel($id_das_user)
    {
        $get = $this->db->query("SELECT das_user.tanggal,das_user.total_terima,das_user.sisa_saldo,das_user.id_das,das_user.id_das_user,das_user.keterangan,das.status,das_user.status_das_user,das_user.no_das, jenis_dana, tahun_ajaran FROM das_user INNER JOIN das ON das_user.id_das = das.id_das 
        INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori WHERE id_das_user = '$id_das_user'")->row();
        $d['das_saya_kelola'] = $this->Das_model->das_saya_kelola($id_das_user);
        $d['keterangan'] = $get->keterangan;
        $d['tanggal'] = $get->tanggal;
        $d['sisa_saldo'] = $get->sisa_saldo;
        $d['id_das_user'] = $get->id_das_user;
        $d['total_terima'] = $get->total_terima;
        $d['status'] = $get->status;
        $d['no_das'] = $get->no_das;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['status_das_user'] = $get->status_das_user;
        $this->load->view('das/das_saya_kelola_excel', $d);
    }

    public function das_saya_kelola_cetak($id_das_user)
    {
        $get = $this->db->query("SELECT das_user.tanggal,das_user.total_terima,das_user.sisa_saldo,das_user.id_das,das_user.id_das_user,das_user.keterangan,das.status,das_user.status_das_user,das_user.no_das, jenis_dana, tahun_ajaran FROM das_user INNER JOIN das ON das_user.id_das = das.id_das 
        INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori WHERE id_das_user = '$id_das_user'")->row();
        $d['das_saya_kelola'] = $this->Das_model->das_saya_kelola($id_das_user);
        $d['keterangan'] = $get->keterangan;
        $d['tanggal'] = $get->tanggal;
        $d['sisa_saldo'] = $get->sisa_saldo;
        $d['id_das_user'] = $get->id_das_user;
        $d['total_terima'] = $get->total_terima;
        $d['status'] = $get->status;
        $d['no_das'] = $get->no_das;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['status_das_user'] = $get->status_das_user;
        $this->load->view('das/das_saya_kelola_cetak', $d);
    }


    public function das_bendahara_kelola($id_das_user_bendahara)
    {
        $get = $this->db->query("SELECT das_user_bendahara.tanggal,das_user_bendahara.total_terima,das_user_bendahara.sisa_saldo,das_user_bendahara.id_das_bendahara,das_user_bendahara.id_das_user_bendahara,das_user_bendahara.keterangan,das_bendahara.status,das_user_bendahara.status_das_user,das_user_bendahara.no_das, jenis_dana, tahun_ajaran FROM das_user_bendahara INNER JOIN das_bendahara ON das_user_bendahara.id_das_bendahara = das_bendahara.id_das_bendahara 
        INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori WHERE id_das_user_bendahara = '$id_das_user_bendahara'")->row();
        $d['judul'] = "Kelola Rincian Dana Saya";
        $d['das_bendahara_kelola'] = $this->Das_model->das_bendahara_kelola($id_das_user_bendahara);
        $d['keterangan'] = $get->keterangan;
        $d['tanggal'] = $get->tanggal;
        $d['id_das_bendahara'] = $get->id_das_bendahara;
        $d['sisa_saldo'] = $get->sisa_saldo;
        $d['id_das_user_bendahara'] = $get->id_das_user_bendahara;
        $d['total_terima'] = $get->total_terima;
        $d['status'] = $get->status;
        $d['no_das'] = $get->no_das;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['status_das_user'] = $get->status_das_user;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_bendahara_kelola');
        $this->load->view('bottom');
    }



    public function das_sisa_kelola($id_das_sisa)
    {
        $get = $this->db->query("SELECT * FROM das_sisa WHERE id_das_sisa = '$id_das_sisa'")->row();
        $d['judul'] = "Kelola Dana Sisa";
        $d['das_sisa_kelola'] = $this->Das_model->das_sisa_kelola($id_das_sisa);
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tanggal'] = $get->tanggal;
        $d['sisa_dana'] = $get->sisa_dana;
        $d['id_das_sisa'] = $get->id_das_sisa;
        $d['dana'] = $get->dana;
        $d['status'] = $get->status;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_sisa_kelola');
        $this->load->view('bottom');
    }

    public function das_user($id_das)
    {
        $get = $this->db->query("SELECT * FROM das 
        INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori
        INNER JOIN mst_user ON das.id_user = mst_user.id_user 
    INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE id_das = '$id_das'")->row();
        $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user WHERE id_das = '$id_das'")->row();
        $d['judul'] = "Kelola DAS User";
        $d['das_user'] = $this->Das_model->das_user($id_das);
        $d['id_user'] = $get->id_user;
        $d['nama_user'] = $get->nama;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['nama_jabatan'] = $get->nama_jabatan;
        $d['tanggal'] = $get->tanggal;
        $d['saldo'] = $get->saldo - ($total->hitung_terima - $total->hitung);
        $d['id_das'] = $get->id_das;
        $d['total'] = $get->total;
        $d['status'] = $get->status;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_user');
        $this->load->view('bottom');
    }


    public function das_user_bendahara($id_das_bendahara)
    {
        $get = $this->db->query("SELECT * FROM das_bendahara 
        INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori
        INNER JOIN mst_user ON das_bendahara.id_user = mst_user.id_user 
    INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE id_das_bendahara = '$id_das_bendahara'")->row();
        $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara WHERE id_das_bendahara = '$id_das_bendahara'")->row();
        $d['judul'] = "Kelola Dana Saya";
        $d['das_user_bendahara'] = $this->Das_model->das_user_bendahara($id_das_bendahara);
        $d['id_user'] = $get->id_user;
        $d['nama_user'] = $get->nama;
        $d['jenis_dana'] = $get->jenis_dana;
        $d['tahun_ajaran'] = $get->tahun_ajaran;
        $d['nama_jabatan'] = $get->nama_jabatan;
        $d['tanggal'] = $get->tanggal;
        $d['saldo'] = $get->saldo - ($total->hitung_terima - $total->hitung);
        $d['id_das_bendahara'] = $get->id_das_bendahara;
        $d['total'] = $get->total;
        $d['status'] = $get->status;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('das/das_user_bendahara');
        $this->load->view('bottom');
    }


    public function das_sisa_save()
    {
        $tipe = $this->input->post("tipe");
        $in['jenis_dana'] = $this->input->post("jenis_dana");
        $in['tahun_ajaran'] = $this->input->post("tahun_ajaran");

        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        if ($tipe == "add") {
            $in['dana'] = $this->input->post("dana");
            $in['sisa_dana'] = $this->input->post("dana");
            $this->db->insert("das_sisa", $in);
            $this->session->set_flashdata("success", "Tambah Data Dana SisaBerhasil");
            redirect("das/das_sisa/");
        } elseif ($tipe = 'edit') {
            $where['id_das_sisa']     = $this->input->post('id_das_sisa');
            $this->db->update("das_sisa", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Dana Sisa Berhasil");
            redirect("das/das_sisa/");
        } else {
            redirect(base_url());
        }
    }


    public function das_kategori_save()
    {
        $tipe = $this->input->post("tipe");
        $in['jenis_dana'] = $this->input->post("jenis_dana");
        $in['tahun_ajaran'] = $this->input->post("tahun_ajaran");

        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        if ($tipe == "add") {
            $in['dana'] = $this->input->post("dana");
            $in['sisa_dana'] = $this->input->post("dana");
            $this->db->insert("das_kategori", $in);
            $this->session->set_flashdata("success", "Tambah Data Kategori DAS Berhasil");
            redirect("das/das_kategori/");
        } elseif ($tipe = 'edit') {
            $where['id_das_kategori']     = $this->input->post('id_das_kategori');
            $this->db->update("das_kategori", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Kategori DAS Berhasil");
            redirect("das/das_kategori/");
        } else {
            redirect(base_url());
        }
    }

    public function das_sumber_dana_save()
    {
        $tipe = $this->input->post("tipe");
        $in['jenis_dana_masuk'] = $this->input->post("jenis_dana_masuk");
        $in['tahun_ajaran'] = $this->input->post("tahun_ajaran");

        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        if ($tipe == "add") {
            $in['jumlah_dana'] = $this->input->post("jumlah_dana");
            $this->db->insert("das_sumber_dana", $in);
            $this->session->set_flashdata("success", "Tambah Data Sumber Dana Masuk Berhasil");
            redirect("das/das_sumber_dana/");
        } elseif ($tipe = 'edit') {
            $where['id_das_sumber_dana']     = $this->input->post('id_das_sumber_dana');
            $this->db->update("das_sumber_dana", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data  Sumber Dana Masuk  Berhasil");
            redirect("das/das_sumber_dana/");
        } else {
            redirect(base_url());
        }
    }

    public function das_save()
    {
        $tipe = $this->input->post("tipe");
        $in['id_user'] = $this->input->post("id_user");
        $in['id_das_kategori'] = $this->input->post("id_das_kategori");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        if ($tipe == "add") {
            $in['total'] = $this->input->post("total");
            $in['saldo'] = $this->input->post("total");

            $get_saldo = $this->db->query("SELECT sisa_dana FROM das_kategori WHERE id_das_kategori = '$in[id_das_kategori]'")->row();
            if ($in['total'] <= $get_saldo->sisa_dana) {
                $this->db->insert("das", $in);
                $last_id = $this->db->insert_id();
                $this->session->set_flashdata("success", "Tambah Data DAS Berhasil");
                redirect("das/das_user/" . $last_id);
            } else {
                $this->session->set_flashdata("error", "Jumlah Melebihi Sisa Dana");
                redirect("das");
                // echo '<script>
                //     alert("Jumlah Melebihi Sisa Dana");
                //     document.location.href="' . base_url() . 'das";
                // </script>';
            }
        } elseif ($tipe = 'edit') {
            $where['id_das']     = $this->input->post('id_das');
            $this->db->update("das", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data DAS Berhasil");
            redirect("das/das_user/" . $where['id_das']);
        } else {
            redirect(base_url());
        }
    }


    public function das_bendahara_save()
    {
        $tipe = $this->input->post("tipe");
        $in['id_user'] = $this->session->userdata("id");
        $in['id_das_kategori'] = $this->input->post("id_das_kategori");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        if ($tipe == "add") {
            $in['total'] = $this->input->post("total");
            $in['saldo'] = $this->input->post("total");

            $get_saldo = $this->db->query("SELECT sisa_dana FROM das_kategori WHERE id_das_kategori = '$in[id_das_kategori]'")->row();
            if ($in['total'] <= $get_saldo->sisa_dana) {
                $this->db->insert("das_bendahara", $in);
                $last_id = $this->db->insert_id();
                $this->session->set_flashdata("success", "Tambah Data DAS Berhasil");
                redirect("das/das_user_bendahara/" . $last_id);
            } else {
                echo '<script>
                    alert("Jumlah Melebihi Sisa Dana");
                    document.location.href="' . base_url() . 'das";
                </script>';
            }
        } elseif ($tipe = 'edit') {
            $where['id_das_bendahara']     = $this->input->post('id_das_bendahara');
            $this->db->update("das_bendahara", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data DAS Berhasil");
            redirect("das/das_user_bendahara/" . $where['id_das_bendahara']);
        } else {
            redirect(base_url());
        }
    }

    public function das_user_save()
    {


        $in['no_das'] =  $this->input->post("no_das");


        $in['keterangan'] = $this->input->post("keterangan");
        $in['id_das'] = $this->input->post("id_das");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        $in['total_terima'] = $this->input->post("total_terima");
        $in['sisa_saldo'] = $this->input->post("total_terima");

        $get_saldo = $this->db->query("SELECT saldo FROM das WHERE id_das = '$in[id_das]'")->row();
        if ($in['total_terima'] <= $get_saldo->saldo) {
            $this->db->insert("das_user", $in);
            $this->session->set_flashdata("success", "Tambah Data DAS Ke User Berhasil");
            redirect("das/das_user/" . $this->input->post("id_das"));
        } else {
        //     echo '<script>
        //     alert("Jumlah Melebihi Sisa Saldo");
        //     document.location.href="' . base_url() . 'das/das_user/' . $this->input->post("id_das") . '";
        //   </script>';
            $this->session->set_flashdata("error", "Jumlah Melebihi Sisa Saldo");
            redirect("das/das_user/" . $this->input->post("id_das"));
        }
    }


    public function das_user_bendahara_save()
    {


        $in['no_das'] =  $this->input->post("no_das");


        $in['keterangan'] = $this->input->post("keterangan");
        $in['id_das_bendahara'] = $this->input->post("id_das_bendahara");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));

        $in['total_terima'] = $this->input->post("total_terima");
        $in['sisa_saldo'] = $this->input->post("total_terima");

        $get_saldo = $this->db->query("SELECT saldo FROM das_bendahara WHERE id_das_bendahara = '$in[id_das_bendahara]'")->row();
        if ($in['total_terima'] <= $get_saldo->saldo) {
            $this->db->insert("das_user_bendahara", $in);
            $this->session->set_flashdata("success", "Tambah Data DAS Ke User Berhasil");
            redirect("das/das_user_bendahara/" . $this->input->post("id_das_bendahara"));
        } else {
            echo '<script>
            alert("Jumlah Melebihi Sisa Saldo");
            document.location.href="' . base_url() . 'das/das_user_bendahara/' . $this->input->post("id_das_bendahara") . '";
          </script>';
        }
    }

    public function das_saya_kelola_save()
    {
        $in['id_das_user'] = $this->input->post("id_das_user");
        $in['keterangan'] = $this->input->post("keterangan");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));
        $in['jumlah'] = $this->input->post("jumlah");
        $in['jenis_das'] = $this->input->post("jenis_das");

        if (empty($this->input->post("ada_nota"))) {
            $in['ada_nota'] = 0;
        } else {
            $in['ada_nota'] = $this->input->post("ada_nota");
        }

        if (empty($this->input->post("ada_bku"))) {
            $in['ada_bku'] = 0;
        } else {
            $in['ada_bku'] = $this->input->post("ada_bku");
        }

        $this->db->insert("das_user_output", $in);
        $this->session->set_flashdata("success", "Tambah Penggunaan Dana Berhasil");
        redirect("das/das_saya_kelola/" . $this->input->post("id_das_user"));
    }


    public function das_bendahara_kelola_save()
    {
        $in['id_das_user_bendahara'] = $this->input->post("id_das_user_bendahara");
        $in['keterangan'] = $this->input->post("keterangan");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));
        $in['jumlah'] = $this->input->post("jumlah");
        $in['jenis_das'] = $this->input->post("jenis_das");

        if (empty($this->input->post("ada_nota"))) {
            $in['ada_nota'] = 0;
        } else {
            $in['ada_nota'] = $this->input->post("ada_nota");
        }

        if (empty($this->input->post("ada_bku"))) {
            $in['ada_bku'] = 0;
        } else {
            $in['ada_bku'] = $this->input->post("ada_bku");
        }

        $get_saldo = $this->db->query("SELECT sisa_saldo FROM das_user_bendahara WHERE id_das_user_bendahara = '$in[id_das_user_bendahara]'")->row();
        if ($in['jumlah'] <= $get_saldo->sisa_saldo) {
            $this->db->insert("das_user_bendahara_output", $in);
            $this->session->set_flashdata("success", "Tambah Data DAS Ke User Berhasil");
            redirect("das/das_bendahara_kelola/" . $this->input->post("id_das_user_bendahara"));
        } else {
            echo '<script>
            alert("Jumlah Pengeluaran Melebihi Sisa Saldo");
            document.location.href="' . base_url() . 'das/das_bendahara_kelola/' . $this->input->post("id_das_user_bendahara") . '";
          </script>';
        }
    }




    public function das_sisa_kelola_save()
    {
        $in['id_das_sisa'] = $this->input->post("id_das_sisa");
        $in['keterangan'] = $this->input->post("keterangan");
        $in['tanggal'] = date("Y-m-d", strtotime($this->input->post("tanggal")));
        $in['jumlah'] = $this->input->post("jumlah");

        if (empty($this->input->post("ada_nota"))) {
            $in['ada_nota'] = 0;
        } else {
            $in['ada_nota'] = $this->input->post("ada_nota");
        }

        if (empty($this->input->post("ada_bku"))) {
            $in['ada_bku'] = 0;
        } else {
            $in['ada_bku'] = $this->input->post("ada_bku");
        }

        $get_saldo = $this->db->query("SELECT sisa_dana FROM das_sisa WHERE id_das_sisa = '$in[id_das_sisa]'")->row();
        if ($in['jumlah'] <= $get_saldo->sisa_dana) {
            $this->db->insert("das_sisa_output", $in);
            $this->session->set_flashdata("success", "Tambah Data Rincian Pengeluaran Berhasil");
            redirect("das/das_sisa_kelola/" . $this->input->post("id_das_sisa"));
        } else {
            echo '<script>
            alert("Jumlah Pengeluaran Melebihi Sisa Dana");
            document.location.href="' . base_url() . 'das/das_sisa_kelola/' . $this->input->post("id_das_sisa") . '";
          </script>';
        }
    }


    public function das_sisa_hapus($id_das_sisa)
    {
        $where['id_das_sisa'] = $id_das_sisa;
        $cek = $this->db->query("SELECT * FROM das_sisa_output WHERE id_das_sisa = '$id_das_sisa'");
        if ($cek->num_rows() > 0) {
            //     echo '<script>
            //     alert("Gagal Hapus. silahkan hapus terlebih das sisa pada menu kelola");
            //     document.location.href="' . base_url() . 'das/das_sisa";
            //   </script>';
            $this->session->set_flashdata("error", "Gagal Hapus. silahkan hapus terlebih das sisa pada menu kelola");
            redirect("das/das_sisa");
        } else {
            $this->db->delete("das_sisa", $where);
            $this->session->set_flashdata("success", "Hapus Das Sisa Berhasil");
            redirect("das/das_sisa");
        }
    }

    public function das_kategori_hapus($id_das_kategori)
    {
        $where['id_das_kategori'] = $id_das_kategori;
        $cek = $this->db->query("SELECT * FROM das WHERE id_das_kategori = '$id_das_kategori'");
        if ($cek->num_rows() > 0) {
            //     echo '<script>
            //     alert("Gagal Hapus. silahkan hapus terlebih das pada menu proses dana");
            //     document.location.href="' . base_url() . 'das/das_kategori";
            //   </script>';
            $this->session->set_flashdata("error", "Gagal Hapus. silahkan hapus terlebih das pada menu proses dana");
            redirect("das/das_kategori");
        } else {
            $this->db->delete("das_kategori", $where);
            $this->session->set_flashdata("success", "Hapus Kategori Das Berhasil");
            redirect("das/das_kategori");
        }
    }


    public function das_sumber_dana_hapus($id_das_sumber_dana)
    {
        $where['id_das_sumber_dana'] = $id_das_sumber_dana;
        $this->db->delete("das_sumber_dana", $where);
        $this->session->set_flashdata("success", "Hapus Sumber Dana Berhasil");
        redirect("das/das_sumber_dana");
    }


    public function das_hapus($id_das)
    {
        $where['id_das'] = $id_das;
        $cek = $this->db->query("SELECT * FROM das_user WHERE id_das = '$id_das'");
        if ($cek->num_rows() > 0) {
            echo '<script>
            alert("Gagal Hapus. silahkan hapus terlebih dahulu user das");
            document.location.href="' . base_url() . 'das";
          </script>';
        } else {
            $this->db->delete("das", $where);
            redirect("das");
        }
    }

    public function das_bendahara_hapus($id_das_bendahara)
    {
        $where['id_das_bendahara'] = $id_das_bendahara;
        $cek = $this->db->query("SELECT * FROM das_user_bendahara WHERE id_das_bendahara = '$id_das_bendahara'");
        if ($cek->num_rows() > 0) {
            echo '<script>
            alert("Gagal Hapus. silahkan hapus terlebih dahulu user das");
            document.location.href="' . base_url() . 'das/das_bendahara";
          </script>';
        } else {
            $this->db->delete("das_bendahara", $where);
            redirect("das/das_bendahara");
        }
    }

    public function das_user_hapus($id_das_user, $id_das)
    {
        $where['id_das_user'] = $id_das_user;
        $cek = $this->db->query("SELECT * FROM das_user_output WHERE id_das_user = '$id_das_user'");
        if ($cek->num_rows() > 0) {
        //     echo '<script>
        //     alert("Gagal Hapus. DAS sudah di input oleh user");
        //     document.location.href="' . base_url() . 'das/das_user/' . $id_das . '";
        //   </script>';
            $this->session->set_flashdata("error","Gagal Hapus. DAS sudah di input oleh user");
		    redirect("das/das_user/".$id_das);
        } else {
            $this->db->delete("das_user", $where);
            $this->session->set_flashdata("success","Berhasil menghapus anggaran");
            redirect("das/das_user/" . $id_das);
        }
    }

    public function das_user_bendahara_hapus($id_das_user_bendahara, $id_das_bendahara)
    {
        $where['id_das_user_bendahara'] = $id_das_user_bendahara;
        $cek = $this->db->query("SELECT * FROM das_user_bendahara_output WHERE id_das_user_bendahara = '$id_das_user_bendahara'");
        if ($cek->num_rows() > 0) {
            echo '<script>
            alert("Gagal Hapus. DAS sudah di input oleh user");
            document.location.href="' . base_url() . 'das/das_user_bendahara/' . $id_das_bendahara . '";
          </script>';
        } else {
            $this->db->delete("das_user_bendahara", $where);
            redirect("das/das_user_bendahara/" . $id_das_bendahara);
        }
    }

    public function das_user_kelola_hapus($id_das_user_output, $id_das)
    {
        $where['id_das_user_output'] = $id_das_user_output;
        $this->db->delete("das_user_output", $where);
        $this->session->set_flashdata("success", "Hapus Penggunaan Dana Berhasil");
        redirect("das/das_user/" . $id_das);
    }

    public function das_user_bendahara_kelola_hapus($id_das_user_bendahara_output, $id_das_user_bendahara)
    {
        $where['id_das_user_bendahara_output'] = $id_das_user_bendahara_output;
        $this->db->delete("das_user_bendahara_output", $where);
        redirect("das/das_bendahara_kelola/" . $id_das_user_bendahara);
    }

    public function das_user_kelola_hapus2($id_das_user_output, $id_das)
    {
        $where['id_das_user_output'] = $id_das_user_output;
        $this->db->delete("das_user_output", $where);
        $this->session->set_flashdata("success", "Hapus Penggunaan Dana Berhasil");
        redirect("das/das_saya_kelola/" . $id_das);
    }

    public function das_sisa_kelola_hapus($id_das_sisa_output, $id_das_sisa)
    {
        $where['id_das_sisa_output'] = $id_das_sisa_output;
        $this->db->delete("das_sisa_output", $where);
        redirect("das/das_sisa_kelola/" . $id_das_sisa);
    }


    public function das_tutup($id_das)
    {
        $where['id_das'] = $id_das;
        $in['status'] = 1;
        if ($this->db->update("das", $in, $where)) {
            $this->session->set_flashdata("success","Berhasil menutup seluruh transaksi DAS ");
		    redirect("das");
        //     echo '<script>
        //     alert("berhasil menutup seluruh transaksi DAS");
        //     document.location.href="' . base_url() . 'das";
        //   </script>';
        } else {
            $this->session->set_flashdata("success","Proses Gagal ");
		    redirect("das");
            // echo '<script>
            //         alert("Proses Gagal");
            //         document.location.href="' . base_url() . 'das";
            //     </script>';
        }
    }


    public function das_bendahara_tutup($id_das_bendahara)
    {
        $where['id_das_bendahara'] = $id_das_bendahara;
        $in['status'] = 1;
        if ($this->db->update("das_bendahara", $in, $where)) {
            $this->session->set_flashdata("success","berhasil menutup seluruh transaksi DAS");
		    redirect("das/das_bendahara");
        //     echo '<script>
        //     alert("berhasil menutup seluruh transaksi DAS");
        //     document.location.href="' . base_url() . 'das/das_bendahara";
        //   </script>';
        } else {
            $this->session->set_flashdata("success","Proses Gagal");
		    redirect("das/das_bendahara");
            // echo '<script>
            //         alert("Proses Gagal");
            //         document.location.href="' . base_url() . 'das/das_bendahara";
            //     </script>';
        }
    }

    public function das_sisa_tutup($id_das_sisa)
    {
        $where['id_das_sisa'] = $id_das_sisa;
        $in['status'] = 1;
        if ($this->db->update("das_sisa", $in, $where)) {
            $this->session->set_flashdata("success","berhasil menutup seluruh transaksi dana ini");
		    redirect("das/das_sisa");
        //     echo '<script>
        //     alert("berhasil menutup seluruh transaksi dana ini");
        //     document.location.href="' . base_url() . 'das/das_sisa";
        //   </script>';
        } else {
            // echo '<script>
            //         alert("Proses Gagal");
            //         document.location.href="' . base_url() . 'das/das_sisa";
            //     </script>';
                $this->session->set_flashdata("success","Proses Gagal");
		    redirect("das/das_sisa");
        }
    }

    public function das_user_tutup($id_das_user, $id_das)
    {
        $where['id_das_user'] = $id_das_user;
        $in['status_das_user'] = 1;
        if ($this->db->update("das_user", $in, $where)) {
            $this->session->set_flashdata("success","Berhasil menutup seluruh transaksi DAS User");
		    redirect("das/das_user/".$id_das);
        //     echo '<script>
        //     alert("berhasil menutup seluruh transaksi DAS");
        //     document.location.href="' . base_url() . 'das/das_user/' . $id_das . '";
        //   </script>';
        } else {
            $this->session->set_flashdata("success","Proses Gagal");
		    redirect("das/das_user/".$id_das);
            // echo '<script>
            //         alert("Proses Gagal");
            //         document.location.href="' . base_url() . 'das/das_user/' . $id_das . '";
            //     </script>';
        }
    }

    public function das_user_bendahara_tutup($id_das_user_bendahara, $id_das_bendahara)
    {
        $where['id_das_user_bendahara'] = $id_das_user_bendahara;
        $in['status_das_user'] = 1;
        if ($this->db->update("das_user_bendahara", $in, $where)) {
            echo '<script>
            alert("berhasil menutup seluruh transaksi DAS");
            document.location.href="' . base_url() . 'das/das_user_bendahara/' . $id_das_bendahara . '";
          </script>';
        } else {
            echo '<script>
                    alert("Proses Gagal");
                    document.location.href="' . base_url() . 'das/das_user_bendahara/' . $id_das_bendahara . '";
                </script>';
        }
    }


    public function request_kelola($id_das_user)
    {
        $where['id_das_user'] = $id_das_user;
        $in['open'] = 2;
        $this->db->update("das_user", $in, $where);
        $this->session->set_flashdata("success","Berhasil melakukan request dana");
		redirect("das/das_saya/");
        // echo '<script>
        //             alert("Berhasil melakukan request dana");
        //             document.location.href="' . base_url() . 'das/das_saya/";
        //         </script>';
    }

    public function terima_request($id_das_user, $id_das)
    {
        $where['id_das_user'] = $id_das_user;
        $in['open'] = 1;
        $this->db->update("das_user", $in, $where);
        $this->session->set_flashdata("success","Requst Kelola Dana Diberikan");
		redirect("das/das_user/".$id_das);
        // echo '<script>
        //             alert("Requst Kelola Dana Diberikan");
        //             document.location.href="' . base_url() . 'das/das_user/' . $id_das . '";
        //         </script>';
    }

    public function tolak_request($id_das_user, $id_das)
    {
        $where['id_das_user'] = $id_das_user;
        $in['open'] = 0;
        $this->db->update("das_user", $in, $where);
        $this->session->set_flashdata("success","Requst Kelola Dana Ditolak");
		redirect("das/das_user/".$id_das);
        // echo '<script>
        //             alert("Requst Kelola Dana Ditolak");
        //             document.location.href="' . base_url() . 'das/das_user/' . $id_das . '";
        //         </script>';
    }
}
