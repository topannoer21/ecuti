<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cuti_tahunan extends CI_Model {
    private $table = 'tbl_cuti_tahunan';


    function select_by_nip($nip)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_jenis_cuti','tbl_jenis_cuti.id_jenis_cuti = tbl_cuti_tahunan.jenis_cuti_id');
        $this->db->join('tbl_user','tbl_user.nip = tbl_cuti_tahunan.nip');
        $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.id_atasan = tbl_cuti_tahunan.atasan_id');
        $this->db->join('tbl_kelola_pejabat','tbl_kelola_pejabat.id_pejabat = tbl_kelola_atasan.pejabat_id');
        $this->db->where('tbl_cuti_tahunan.nip',$nip);
        return $this->db->get();
    }

    function get_option2(){
        $this->db->select('*');
        $this->db->from('tbl_kelola_atasan');
        $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_atasan.user_id_atasan');
        return $this->db->get();
    }

    public function delete($where,$table) {
        $this->db->where($where);
        $this->db->delete($table);
      }

    public function edit($where,$table) {
        $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.id_atasan = tbl_cuti_tahunan.atasan_id');
        $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_atasan.user_id_atasan');
        $this->db->where($where);
        return $this->db->get_where($table);
    }

    public function update($where,$data,$table) {
        $this->db->where($where);
        $this->db->update($table,$data);
      }

      public function cekidbarang()
      {
          $query = $this->db->query("SELECT MAX(id_cuti_tahunan) as idcuti from tbl_cuti_tahunan");
          $hasil = $query->row();
          return $hasil->idcuti;
      }

      public function getMax($table, $field, $kode = null) {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
        }

        //ambildata pengajuan cuti
        function select_data_pengajuan($id){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('tbl_jenis_cuti','tbl_jenis_cuti.id_jenis_cuti = tbl_cuti_tahunan.jenis_cuti_id');
            $this->db->join('tbl_user','tbl_user.nip = tbl_cuti_tahunan.nip');
            $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.id_atasan = tbl_cuti_tahunan.atasan_id');
            $this->db->join('tbl_kelola_pejabat','tbl_kelola_pejabat.id_pejabat = tbl_kelola_atasan.pejabat_id');
            $this->db->where('tbl_kelola_pejabat.user_id_pejabat',$id);
            $this->db->where('tbl_cuti_tahunan.sts_apv_2',1);
            return $this->db->get();
        }

        public function select_data_all()
        {
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('tbl_jenis_cuti','tbl_jenis_cuti.id_jenis_cuti = tbl_cuti_tahunan.jenis_cuti_id');
            $this->db->join('tbl_user','tbl_user.nip = tbl_cuti_tahunan.nip');
            $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.id_atasan = tbl_cuti_tahunan.atasan_id');
            //$this->db->join('tbl_kelola_jabatan','tbl_kelola_pejabat.user_id = tbl_cuti_tahunan');
            return $this->db->get();
        }

        function select_data_pengajuan_atsn($id){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('tbl_jenis_cuti','tbl_jenis_cuti.id_jenis_cuti = tbl_cuti_tahunan.jenis_cuti_id');
            $this->db->join('tbl_user','tbl_user.nip = tbl_cuti_tahunan.nip');
            $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.id_atasan = tbl_cuti_tahunan.atasan_id');
            $this->db->where('tbl_cuti_tahunan.sts_apv_1',1);
            $this->db->where('tbl_kelola_atasan.user_id_atasan',$id);
            return $this->db->get();
        }

        public function approve_pejabat(){
            $id = $this->uri->segment('3');
            $data = array(
                "sts_apv_2" => '0',
            );
            $this->db->where('id_cuti_tahunan', $id);
            $this->db->update($this->table, $data);

            //pesan berhasil
            $msg = "<script>alert('Congratulations, the annual leave application has been approved')</script>";
            $this->session->set_flashdata("message", $msg);
            redirect(base_url() . 'Data_cuti_tahunan/Apv_ct_pejabat');
        }

        public function get($id_ct = null){
            $this->db->from('tbl_cuti_tahunan');
            if($id_ct != null){
                $this->db->where('id_cuti_tahunan',$id_ct);
            }
            $query = $this->db->get();
            return $query;
        }

        public function tolak_ct_atasan($id_ct){
            $data = array(
                "sts_apv_1" => '3',
                "sts_apv_2" => '3',
            );
            $this->db->where('id_cuti_tahunan', $id_ct);
            $this->db->update($this->table, $data);
        }

        function update_hak($data){
            $jml_hari = $data['jml_hari'];
            $user_id = $data['user_id'];
            $sql = "UPDATE tbl_hak_cuti_tahunan SET n = n + '$jml_hari' where user_id = '$user_id'";
            $this->db->query($sql);
        }

        public function approve_atasan(){
            $id = $this->uri->segment('3');
            $data = array(
                "sts_apv_1" => '0',
            );
            $this->db->where('id_cuti_tahunan', $id);
            $this->db->update($this->table, $data);

            //pesan berhasil
            $msg = "<script>alert('Congratulations, the annual leave application has been approved')</script>";
            $this->session->set_flashdata("message", $msg);
            redirect(base_url() . 'Data_cuti_tahunan/Apv_ct_atasan');
        }
}
