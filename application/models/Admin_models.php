<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// ---------------------------------------------Admin Login & Logout -----------------------------------------------------------//

	class Admin_models extends CI_Model
	{
		public function getlogin($username, $password)
		{
			$password 	= md5($password);
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$querry 	= $this->db->get('admin');
			if($querry->num_rows()>0)
				{
					foreach ($querry->result() as $row) 
					{
						$sess = array('username' => $row->username,
									  'password' => $row->password);
						$this->session->set_userdata($sess);
						$this->session->set_flashdata('info', 'login sukses');
						redirect('admin');
					}
				}else 
					{
						$this->session->set_flashdata('info', 'username dan password salah');
						redirect('login');
					} 

		}

		public function get_all_kriteria()
		{
			$this->db->select('*');
			$this->db->from('tb_kriteria');
			return $this->db->get();
		}

		public function tambah_kriteria($data){
			return $this->db->insert('tb_kriteria',$data);
		}

		public function update_kriteria($data,$kd_kriteria){
			$this->db->where('kd_kriteria',$kd_kriteria);
			return $this->db->update('tb_kriteria',$data);
		}

		public function hapus_kriteria($kd_kriteria){
			$this->db->where('kd_kriteria',$kd_kriteria);
			return $this->db->delete('tb_kriteria');

		}

		public function get_all_bobot(){
			$this->db->select('*');
			$this->db->from('tb_bobot');
			return $this->db->get();

		}

		public function tambah_bobot($data){
			return $this->db->insert('tb_bobot',$data);

		}

		public function update_bobot($data,$nilai_bobot){
			$this->db->where('nilai_bobot',$nilai_bobot);
			return $this->db->update('tb_bobot',$data);

		}

		public function hapus_bobot($nilai_bobot){
			$this->db->where('nilai_bobot',$nilai_bobot);
			return $this->db->delete('tb_bobot');

		}

		public function get_all_atribut(){
			$this->db->select('a.id ,a.id_kriteria, a.keterangan, a.nilai, b.nama_kriteria');
			$this->db->join('tb_kriteria b','a.id_kriteria = b.kd_kriteria','left' );
			$this->db->from('tb_attribut a');
			return $this->db->get();
		}

		public function tambah_attribut($data){
			return $this->db->insert('tb_attribut',$data);

		}

		public function get_edit_atribut($id){
			$this->db->select('a.id ,a.id_kriteria, a.keterangan, a.nilai, b.nama_kriteria');
			$this->db->join('tb_kriteria b','a.id_kriteria = b.kd_kriteria','left' );
			$this->db->where('a.id',$id);
			$this->db->from('tb_attribut a');
			return $this->db->get();

		}

		public function ubah_attribut($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('tb_attribut',$data);

		}

		public function hapus_attribut($id){
			$this->db->where('id',$id);
			return $this->db->delete('tb_attribut');
		}

		public function get_all_warga(){
			$this->db->select('*');
			$this->db->from('tb_warga');
			return $this->db->get();

		}

		public function get_all_kriteria_att($id){
			$this->db->select('*');
			$this->db->where('id_kriteria',$id);
			$this->db->from('tb_attribut');
			return $this->db->get();

		}

		public function get_nilai_saw(){
			$this->db->select('*');
			$this->db->join('tb_warga','tb_hasil.no_peserta = tb_warga.no_peserta','left' );
			$this->db->from('tb_hasil');
			$this->db->order_by('nilai_saw','DESC');
			return $this->db->get();

		}

		public function get_nilai_wp(){
			$this->db->select('*');
			$this->db->join('tb_warga','tb_hasil_wp.no_peserta = tb_warga.no_peserta','left' );
			$this->db->from('tb_hasil_wp');
			$this->db->order_by('nilai_v','DESC');
			return $this->db->get();

		}

		public function tambah_warga($data){
			return $this->db->insert('tb_warga',$data);

		}

		public function add_sub_warga($data2){
			return $this->db->insert('tb_warga_attribut',$data2);
		}

		public function get_single_warga($id){
			$this->db->select('a.no_peserta as id_warga, a.nama, a.tempat_lhr, a.tanggal_lhr, a.alamat, a.no_tlpon, a.c1, a.c2, a.c3, a.c4, a.c5, a.c6, b.keterangan as keterangan_anak, c.keterangan as keterangan_pendidikan, d.keterangan as keterangan_tanggungan, e.keterangan as keterangan_penghasilan, f.keterangan as keterangan_sawah, g.keterangan as keterangan_tinggal');
			$this->db->join('tb_attribut b','a.c1 = b.id','left' );
			$this->db->join('tb_attribut c','a.c2 = c.id','left' );
			$this->db->join('tb_attribut d','a.c3 = d.id','left' );
			$this->db->join('tb_attribut e','a.c4 = e.id','left' );
			$this->db->join('tb_attribut f','a.c5 = f.id','left' );
			$this->db->join('tb_attribut g','a.c6 = g.id','left' );
			$this->db->where('a.no_peserta',$id);
			$this->db->from('tb_warga a');
			return $this->db->get();
			
		}

		public function update_warga($data,$id_warga){
			$this->db->where('no_peserta',$id_warga);
			return $this->db->update('tb_warga',$data);

		}
		public function hapus_warga($id){
			$this->db->where('no_peserta',$id);
			return $this->db->delete('tb_warga');
		}

		public function input_penilaian($data2){
			return $this->db->insert('tb_penilaian',$data2);
		}
		public function delete_penilaian($id_warga){
			$this->db->where('no_peserta',$id_warga);
			return $this->db->delete('tb_penilaian');
		}

		public function get_max_penilian($no){
			$this->db->select_max('angka_penilaian');
			$this->db->where('kd_kriteria',$no);
			$this->db->from('tb_penilaian');
			return $this->db->get();

		}

		public function get_min_penilaian($no){
			$this->db->select_min('angka_penilaian');
			$this->db->where('kd_kriteria',$no);
			$this->db->from('tb_penilaian');
			return $this->db->get();
		}

		public function get_nilai_warga($no_peserta,$no){
			$this->db->select('angka_penilaian, nilai_bobot');
			$this->db->where('no_peserta',$no_peserta);
			$this->db->where('kd_kriteria',$no);
			$this->db->from('tb_penilaian');
			return $this->db->get();

		}

		public function insert_nilai_saw($data){
			return $this->db->insert('tb_hasil',$data);
		}

		public function insert_nilai_wp_s($data){
			return $this->db->insert('tb_hasil_wp',$data);
		}

		public function get_sum_v(){
			$this->db->select_sum('nilai_s');
			$this->db->from('tb_hasil_wp');
			return $this->db->get();
		}

		public function insert_nilai_wp_v($data,$no_peserta){
			$this->db->where('no_peserta',$no_peserta);
			return $this->db->update('tb_hasil_wp',$data);

		}

		// guru
		public function get_all_guru(){
			$this->db->select('*');
			$this->db->from('tb_guru');
			return $this->db->get();

		}

		public function tambah_guru($data){
			return $this->db->insert('tb_guru',$data);
		}

		public function get_single_guru($id){
			$this->db->select('a.id as id_guru,a.nik, a.nama_guru, a.tempat_tanggal_lahir,a.jenis_kelamin, a.tanggal_lahir, a.alamat, a.c1, a.c2, a.c3, a.c4, a.c5, b.keterangan as c_1, c.keterangan as c_2, d.keterangan as c_3, e.keterangan as c_4, f.keterangan as c_5');
			$this->db->join('tb_attribut b','a.c1 = b.id','left' );
			$this->db->join('tb_attribut c','a.c2 = c.id','left' );
			$this->db->join('tb_attribut d','a.c3 = d.id','left' );
			$this->db->join('tb_attribut e','a.c4 = e.id','left' );
			$this->db->join('tb_attribut f','a.c5 = f.id','left' );
			$this->db->where('a.id',$id);
			$this->db->from('tb_guru a');
			return $this->db->get();
		}

		public function update_guru($data,$id_guru){
			$this->db->where('id',$id_guru);
			return $this->db->update('tb_guru',$data);
		}

		public function get_nilai_peserta($no_peserta,$no){
			$this->db->select('a.angka_penilaian, a.nilai_bobot');
			$this->db->where('a.no_peserta',$no_peserta);
			$this->db->where('a.kd_kriteria',$no);
			$this->db->from('tb_penilaian as a');
			return $this->db->get();
		}

		public function get_nilai_topsis(){
			$this->db->select('a.*,b.nama_guru');
			$this->db->join('tb_guru as b','a.id_guru = b.id','left' );
			$this->db->from('tb_hasil_topsis as a');
			$this->db->order_by('nilai_v','DESC');
			return $this->db->get();

		}

		public function insert_nilai_terbobot($data){
			return $this->db->insert('tb_hasil_topsis',$data);
		}

		public function get_max_c1(){
			$this->db->select_max('result_c1');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_max_c2(){
			$this->db->select_max('result_c2');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_max_c3(){
			$this->db->select_max('result_c3');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_max_c4(){
			$this->db->select_max('result_c4');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_max_c5(){
			$this->db->select_max('result_c5');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}

		public function get_min_c1(){
			$this->db->select_min('result_c1');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_min_c2(){
			$this->db->select_min('result_c2');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_min_c3(){
			$this->db->select_min('result_c3');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_min_c4(){
			$this->db->select_min('result_c4');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}
		public function get_min_c5(){
			$this->db->select_min('result_c5');
			$this->db->from('tb_hasil_topsis');
			return $this->db->get();
		}

		public function update_v($id,$value){
			$this->db->where('id_guru',$id);
			return $this->db->update('tb_hasil_topsis',array('nilai_v'=>$value));


		}

		public function update_saw($id,$value){
			$this->db->where('id_guru',$id);
			return $this->db->update('tb_hasil_topsis',array('nilai_saw'=>$value));
		}

		public function get_nilai_saw2(){
			$this->db->select('a.*,b.nama_guru');
			$this->db->join('tb_guru as b','a.id_guru = b.id','left' );
			$this->db->where('a.nilai_saw is NOT NULL', NULL, FALSE);
			$this->db->from('tb_hasil_topsis as a');
			$this->db->order_by('nilai_saw','DESC');
			return $this->db->get();

		}
	


	}