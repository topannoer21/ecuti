<?php class Model_manajemen_pimpinan extends CI_Model
{
        private $table = 'tbl_kelola_atasan';
        private $table2 = 'tbl_kelola_pejabat';

            function __construct()
            {
                parent::__construct();
            }
        //code untuk model kelola atasan langsung
        function select_all_data(){
                $this->db->select('*');
                $this->db->from($this->table);
                $this->db->join('tbl_unit_kerja','tbl_unit_kerja.id_unit_kerja = tbl_kelola_atasan.unit_kerja_id');
                $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_atasan.user_id_atasan');
                $this->db->order_by('tbl_kelola_atasan.unit_kerja_id', 'ASC');
                return $this->db->get();
        }
        function select_data_pejabat(){
            $this->db->select('*');
            $this->db->from('tbl_kelola_pejabat');
            $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_pejabat.user_id_pejabat');
            $this->db->join('tbl_kelola_atasan','tbl_kelola_atasan.pejabat_id = tbl_kelola_pejabat.id_pejabat');
            $this->db->order_by('tbl_kelola_atasan.unit_kerja_id', 'ASC');
            return $this->db->get();
        }
        function select_all_pejabat(){
            $this->db->select('*');
            $this->db->from('tbl_kelola_pejabat');
            $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_pejabat.user_id_pejabat');
            $this->db->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_user.jabatan_id');
            return $this->db->get();
        }

        function get_option_unker(){
            $this->db->select('*');
            $this->db->from('tbl_unit_kerja');
            return $this->db->get();
        }

        function select_data_atasan($id){
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('tbl_user.unit_kerja_id',$id);
            $this->db->or_where('tbl_user.jabatan_id',$id);
            return $this->db->get()->result();
        }

        function select_atasan_id()
        {
            $id = $this->uri->segment('3');  
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('tbl_unit_kerja','tbl_unit_kerja.id_unit_kerja = tbl_kelola_atasan.unit_kerja_id');
            $this->db->join('tbl_user','tbl_user.id_user = tbl_kelola_atasan.user_id_atasan');
            $this->db->where('tbl_kelola_atasan.id_atasan',$id);
            return $this->db->get();
        }

        function insert_atasan()
        {
            //tangkap parameter
            $id_unit_kerja = $this->input->post('id_unit_kerja');
            $atasan_langsung = $this->input->post('atasan_langsung');
            $pejabat_berwenang = $this->input->post('pejabat_berwenang');
            //cek redudan data
            $this->db->where("unit_kerja_id", $id_unit_kerja);
            $cek = $this->db->get($this->table)->num_rows();
            if ($cek == true) {
                //pesan gagal
                $msg = "<script>alert('Unit Kerja ini Sudah ada')</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect(base_url() . 'Manajemen_pimpinan/add_data_atasan');
                return false;
            }
            $data = array(
                "unit_kerja_id" => $id_unit_kerja,
                "user_id_atasan" => $atasan_langsung,
                "pejabat_id" => $pejabat_berwenang,
            );
            //proses query
            $this->db->insert($this->table, $data);
            //pesan berhasil
            $msg = '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle fa-fw"></i> Congrats! Atasan Langsung data added successfully!
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            ';
            $this->session->set_flashdata("pesan", $msg);
            redirect(base_url() . 'Manajemen_pimpinan/kelola_atasan_langsung');
        }

        function update()
        {
            //tangkap parameter
            $id_atasan = $this->input->post('id_atasan');
            $unit_kerja = $this->input->post('id_unit_kerja');
            $user_id_atasan = $this->input->post('user_id_atasan');
            $pejabat_id = $this->input->post('pejabat_id');
            //cek redudan data
            $this->db->where("unit_kerja_id", $id_unit_kerja);
            $cek = $this->db->get($this->table)->num_rows();
            if ($cek == true) {
                //pesan gagal
                $msg = "<script>alert('Unit Kerja ini Sudah ada')</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect(base_url() . 'Manajemen_pimpinan/edit_data_atasan');
                return false;
            }
            //buat array
            $data = array(
                "unit_kerja_id" => $unit_kerja,
                "user_id_atasan" => $user_id_atasan,
                "pejabat_id" => $pejabat_id,
            );
            //proses query
            $this->db->where('id_atasan', $id_atasan);
            $this->db->update($this->table, $data);
            //pesan berhasil
            $msg = "<script>alert('Berhasil diupdate')</script>";
            $this->session->set_flashdata("pesan", $msg);
            redirect(base_url() . 'Manajemen_pimpinan/kelola_atasan_langsung');
        }

        function delete_atasan($id)
        {
            $this->db->where('id_atasan', $id);
            $this->db->delete($this->table);
        }
        // akhir dari code kelola atasan

        //model untuk kelola pejabat
        function search_user($nama){
            $this->db->like('nama_lengkap', $nama , 'both');
            $this->db->order_by('nama_lengkap', 'ASC');
            $this->db->limit(10);
            return $this->db->get('tbl_user')->result();
        }

        function insert_pejabat()
        {
            //tangkap parameter
            $user_id_pejabat = $this->input->post('id_user');
            //cek redudan data
            $this->db->where("user_id_pejabat", $id_pejabat);
            $cek = $this->db->get($this->table2)->num_rows();
            if ($cek == true) {
                //pesan gagal
                $msg = "<script>alert('Unit Kerja ini Sudah ada')</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect(base_url() . 'Manajemen_pimpinan/add_data_pejabat');
                return false;
            }
            $data = array(
                "user_id_pejabat" => $user_id_pejabat,
            );
            //proses query
            $this->db->insert($this->table2, $data);
            //pesan berhasil
            $msg = '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle fa-fw"></i> Congrats! Pejabat Berwenang data added successfully!
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            ';
            $this->session->set_flashdata("pesan", $msg);
            redirect(base_url() . 'Manajemen_pimpinan/kelola_pejabat_berwenang');
        }

        function delete_pejabat($id)
        {
            $this->db->where('id_pejabat', $id);
            $this->db->delete($this->table2);
        }
        
}