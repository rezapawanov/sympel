<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewirausahaan_model extends CI_Model {
    
    function getAll($limit=0, $offset=0, $filter=[]){

        if(!empty($filter['start']))
            $this->db->where('date(k.created_at) >=', $filter['start']);

        if(!empty($filter['end']))
            $this->db->where('date(k.created_at) <=', $filter['end']);

        if(!empty($filter['id_siswa']))
            $this->db->where('k.id_siswa', $filter['id_siswa']);
        
        $this->db->limit($limit)->offset($offset);
        
        $this->db->join('mst_siswa ms', 'ms.id_siswa = k.id_siswa');
        return $this->db->get('trx_kewirausahaan k');
    }

    function total_data($filter=[]){
 
         if(!empty($filter['start']))
             $this->db->where('date(k.created_at) >=', $filter['start']);
 
         if(!empty($filter['end']))
             $this->db->where('date(k.created_at) <=', $filter['end']);
 
         if(!empty($filter['id_siswa']))
             $this->db->where('k.id_siswa', $filter['id_siswa']);
         
         $this->db->join('mst_siswa ms', 'ms.id_siswa = k.id_siswa');
         return $this->db->get('trx_kewirausahaan k')->num_rows();
     }

}