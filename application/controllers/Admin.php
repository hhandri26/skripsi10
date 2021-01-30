<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
		{
			public function __construct()
			{
				parent::__construct();
				$this->load->helper('form', 'security');
				$this->load->library('form_validation');
				$this->load->model('admin_models');
				$this->load->model('security_models');
				$this->load->library('pdf');
				$this->security_models->get_security();

			}
// ---------------------------------------------Admin Login & Logout -----------------------------------------------------------//
			public function index()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Home';
				$data['sub_judul'] 				= 'Dashboard';
				$data['content'] 				= 'admin/dashboard';
				$data['nav_top']				= 'dashboard';
				$this->load->view('admin/home', $data);
			}
			
			public function kriteria()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_all_kriteria()->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Master';
				$data['sub_judul'] 				= 'Master Kriteria';
				$data['content'] 				= 'admin/kriteria';
				$data['nav_top']				= 'master';
				$this->load->view('admin/home', $data);
				
			}

			public function add_kriteria()
			{
				$data = array(
								"nama_kriteria"	=> $this->input->post('nama_kriteria'),
								"atribut" 		=> $this->input->post('atribut'),
								"nilai_bobot"	=> $this->input->post('nilai_bobot')
						);

				if($this->admin_models->tambah_kriteria($data)){
					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/kriteria');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/kriteria');
				}
				

			}

			public function edit_kriteria()
			{
				$kd_kriteria 		= $this->input->post('kd_kriteria');
				$data = array(
					"nama_kriteria"	=> $this->input->post('nama_kriteria'),
					"atribut" 		=> $this->input->post('atribut'),
					"nilai_bobot"	=> $this->input->post('nilai_bobot')
						);

				if($this->admin_models->update_kriteria($data,$kd_kriteria)){
					$this->session->set_flashdata('info', 'data berhasil di update!');				
					redirect('admin/kriteria');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/kriteria');
				}

			}

			public function delete_kriteria()
			{
				$kd_kriteria 		= $this->input->post('kd_kriteria');
				if($this->admin_models->hapus_kriteria($kd_kriteria)){
					$this->session->set_flashdata('info', 'data berhasil di hapus!');				
					redirect('admin/kriteria');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan hapus data');				
					redirect('admin/kriteria');
				}

			}

			public function bobot()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_all_bobot()->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Master';
				$data['sub_judul'] 				= 'Master Kriteria';
				$data['content'] 				= 'admin/bobot';
				$data['nav_top']				= 'master';
				$this->load->view('admin/home', $data);

			} 

			public function add_bobot()
			{
				$data = array(
					"nilai_bobot"	=> $this->input->post('nilai_bobot'),
					"keterangan" 	=> $this->input->post('keterangan')
				);

				if($this->admin_models->tambah_bobot($data)){
					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/bobot');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/bobot');
				}
			}
			public function edit_bobot()
			{
				$nilai_bobot 		= $this->input->post('nilai_bobot');
				$data = array("keterangan"	=> $this->input->post('keterangan'));

				if($this->admin_models->update_bobot($data,$nilai_bobot)){
					$this->session->set_flashdata('info', 'data berhasil di update!');				
					redirect('admin/bobot');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/bobot');
				}

			}
			public function delete_bobot()
			{
				$nilai_bobot 		= $this->input->post('nilai_bobot');
				if($this->admin_models->hapus_bobot($nilai_bobot)){
					$this->session->set_flashdata('info', 'data berhasil di hapus!');				
					redirect('admin/bobot');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan hapus data');				
					redirect('admin/bobot');
				}


			}

			public function atribut()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_all_atribut()->result();
				$data['kriteria'] 				= $this->admin_models->get_all_kriteria()->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Master';
				$data['sub_judul'] 				= 'Master Atribut';
				$data['content'] 				= 'admin/atribut';
				$data['nav_top']				= 'master';
				$this->load->view('admin/home', $data);

			}

			public function add_atribut()
			{
				$data = array(
					"id_kriteria"	=> $this->input->post('id_kriteria'),
					"keterangan" 	=> $this->input->post('keterangan'),
					"nilai" 		=> $this->input->post('nilai')
				);

				if($this->admin_models->tambah_attribut($data)){
					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/atribut');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/atribut');
				}

			}
			public function form_edit_atribut($id)
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['edit'] 					= $this->admin_models->get_edit_atribut($id)->row();
				$data['kriteria'] 				= $this->admin_models->get_all_kriteria()->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Master';
				$data['sub_judul'] 				= 'Master Atribut';
				$data['content'] 				= 'admin/edit_atribut';
				$data['nav_top']				= 'master';
				$this->load->view('admin/home', $data);

			}

			public function edit_atribut()
			{
				$id 	= $this->input->post('id');
				$data = array(
					"id_kriteria"	=> $this->input->post('id_kriteria'),
					"keterangan" 	=> $this->input->post('keterangan'),
					"nilai" 		=> $this->input->post('nilai')
				);

				if($this->admin_models->ubah_attribut($data,$id)){
					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/atribut');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/atribut');
				}

			}

			public function delete_attribut()
			{
				$id 	= $this->input->post('id');
				if($this->admin_models->hapus_attribut($id)){
					$this->session->set_flashdata('info', 'data berhasil di hapus!');				
					redirect('admin/atribut');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menghapus data');				
					redirect('admin/atribut');
				}

			}

			public function warga()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_all_warga()->result();
				$data['usia_anak'] 				= $this->admin_models->get_all_kriteria_att('1')->result();
				$data['pendidikan'] 			= $this->admin_models->get_all_kriteria_att('2')->result();
				$data['tanggungan'] 			= $this->admin_models->get_all_kriteria_att('3')->result();
				$data['penghasilan'] 			= $this->admin_models->get_all_kriteria_att('4')->result();
				$data['luas_sawah'] 			= $this->admin_models->get_all_kriteria_att('5')->result();
				$data['tempat_tinggal'] 		= $this->admin_models->get_all_kriteria_att('6')->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Warga';
				$data['sub_judul'] 				= 'Tabel warga';
				$data['content'] 				= 'admin/warga';
				$data['nav_top']				= 'warga';
				$this->load->view('admin/home', $data);

			}

			public function add_warga()
			{
				$date = date("Y-m-d H:i:s") ;
				$a['atribut_1'] = $this->input->post('c1');
				$a['atribut_2'] = $this->input->post('c2');
				$a['atribut_3'] = $this->input->post('c3');
				$a['atribut_4'] = $this->input->post('c4');
				$a['atribut_5'] = $this->input->post('c5');
				$a['atribut_6'] = $this->input->post('c6');
				$data = array(
					"nama"			=> $this->input->post('nama'),
					"tempat_lhr" 	=> $this->input->post('tempat_lhr'),
					"tanggal_lhr" 	=> $this->input->post('tanggal_lhr'),
					"alamat" 		=> $this->input->post('alamat'),
					"no_tlpon" 		=> $this->input->post('no_tlpon'),
					"date_input" 	=> $date,
					"c1"			=> $a['atribut_1'],
					"c2" 			=> $a['atribut_2'],
					"c3" 			=> $a['atribut_3'],
					"c4" 			=> $a['atribut_4'],
					"c5"  			=> $a['atribut_5'],
					"c6"			=> $a['atribut_6']
				);

				if($this->admin_models->tambah_warga($data)){
					//masuk ke tabel penilaian
					$warga 		= $this->db->get_where('tb_warga', array('date_input' =>$date))->row();
					$no_peserta = $warga->no_peserta;
					
					for($i=1; $i<=6 ;$i++){
						$p['penilaian_'.$i]	= $this->db->get_where('tb_attribut', array('id' =>$a['atribut_'.$i]))->row();
						$b['bobot_'.$i]		= $this->db->get_where('tb_kriteria', array('kd_kriteria' =>$p['penilaian_'.$i]->id_kriteria))->row();
						$data2 		= array(
											"no_peserta" 		=>$no_peserta,	
											"kd_kriteria" 		=>$b['bobot_'.$i]->kd_kriteria,
											"angka_penilaian" 	=>$p['penilaian_'.$i]->nilai,
											"nilai_bobot"		=>$b['bobot_'.$i]->nilai_bobot
										);
						$this->admin_models->input_penilaian($data2);

					}

					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/warga');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/warga');
				}

			}

			public function form_edit_warga($id)
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['edit'] 					= $this->admin_models->get_single_warga($id)->row();
				$data['usia_anak'] 				= $this->admin_models->get_all_kriteria_att('1')->result();
				$data['pendidikan'] 			= $this->admin_models->get_all_kriteria_att('2')->result();
				$data['tanggungan'] 			= $this->admin_models->get_all_kriteria_att('3')->result();
				$data['penghasilan'] 			= $this->admin_models->get_all_kriteria_att('4')->result();
				$data['luas_sawah'] 			= $this->admin_models->get_all_kriteria_att('5')->result();
				$data['tempat_tinggal'] 		= $this->admin_models->get_all_kriteria_att('6')->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Warga';
				$data['sub_judul'] 				= 'Tabel warga';
				$data['content'] 				= 'admin/warga_edit';
				$data['nav_top']				= 'warga';
				$this->load->view('admin/home', $data);

			}

			public function edit_warga()
			{
				$id_warga 		= $this->input->post('id_warga');
				$date 			= date("Y-m-d H:i:s") ;
				$a['atribut_1'] = $this->input->post('c1');
				$a['atribut_2'] = $this->input->post('c2');
				$a['atribut_3'] = $this->input->post('c3');
				$a['atribut_4'] = $this->input->post('c4');
				$a['atribut_5'] = $this->input->post('c5');
				$a['atribut_6'] = $this->input->post('c6');
				$data = array(
					"nama"			=> $this->input->post('nama'),
					"tempat_lhr" 	=> $this->input->post('tempat_lhr'),
					"tanggal_lhr" 	=> $this->input->post('tanggal_lhr'),
					"alamat" 		=> $this->input->post('alamat'),
					"no_tlpon" 		=> $this->input->post('no_tlpon'),
					"date_input" 	=> $date,
					"c1"			=> $a['atribut_1'],
					"c2" 			=> $a['atribut_2'],
					"c3" 			=> $a['atribut_3'],
					"c4" 			=> $a['atribut_4'],
					"c5"  			=> $a['atribut_5'],
					"c6"			=> $a['atribut_6']
				);

				if($this->admin_models->update_warga($data,$id_warga)){
					// delete terlebidahulu kolom penilaian
					$this->admin_models->delete_penilaian($id_warga);
					//masuk ke tabel penilaian
					$warga 		= $this->db->get_where('tb_warga', array('date_input' =>$date))->row();
					$no_peserta = $warga->no_peserta;
					
					for($i=1; $i<=6 ;$i++){
						$p['penilaian_'.$i]	= $this->db->get_where('tb_attribut', array('id' =>$a['atribut_'.$i]))->row();
						$b['bobot_'.$i]		= $this->db->get_where('tb_kriteria', array('kd_kriteria' =>$p['penilaian_'.$i]->id_kriteria))->row();
						$data2 		= array(
											"no_peserta" 		=>$no_peserta,	
											"kd_kriteria" 		=>$b['bobot_'.$i]->kd_kriteria,
											"angka_penilaian" 	=>$p['penilaian_'.$i]->nilai,
											"nilai_bobot"		=>$b['bobot_'.$i]->nilai_bobot
										);
						$this->admin_models->input_penilaian($data2);

					}
					$this->session->set_flashdata('info', 'data berhasil di update!');				
					redirect('admin/warga');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan update data');				
					redirect('admin/warga');
				}


			}

			public function delete_warga()
			{
				$id 	= $this->input->post('id');
				if($this->admin_models->hapus_warga($id)){
					$this->admin_models->delete_penilaian($id_warga);
					$this->session->set_flashdata('info', 'data berhasil di hapus!');				
					redirect('admin/warga');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menghapus data');				
					redirect('admin/warga');
				}

			}

			public function nilai_saw()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_saw2()->result();
				$data['guru'] 					= $this->admin_models->get_all_guru()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Penilaian';
				$data['sub_judul'] 				= 'Penilaian SAW';
				$data['content'] 				= 'admin/nilai_saw';
				$data['nav_top']				= 'penilaian';
				$this->load->view('admin/home', $data);

			}

			public function nilai_topsis()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_topsis()->result();
				$data['guru'] 					= $this->admin_models->get_all_guru()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Penilaian';
				$data['sub_judul'] 				= 'Penilaian Topsis';
				$data['content'] 				= 'admin/nilai_topsis';
				$data['nav_top']				= 'penilaian';
				$this->load->view('admin/home', $data);

			}

			public function hitung_topsis(){
				$no_peserta 			= $this->input->post('no_peserta');
				$id_guru 				= $this->db->get_where('tb_guru',array('nik'=>$no_peserta))->row();
				$nilai1_rs= $this->admin_models->get_nilai_peserta($id_guru->nik,'1')->row();
				$nilai2_rs= $this->admin_models->get_nilai_peserta($id_guru->nik,'2')->row();
				$nilai3_rs= $this->admin_models->get_nilai_peserta($id_guru->nik,'3')->row();
				$nilai4_rs= $this->admin_models->get_nilai_peserta($id_guru->nik,'4')->row();
				$nilai5_rs= $this->admin_models->get_nilai_peserta($id_guru->nik,'5')->row();
				//var_dump($nilai2_rs);die();
				// tampung array
				$guru = $this->admin_models->get_all_guru()->result();
				$tampung_nilai = array();
				$pembagi1 = 0;
				$pembagi2 = 0;
				$pembagi3 = 0;
				$pembagi4 = 0;
				$pembagi5 = 0;

				foreach($guru as $row){
					//$pembagi+=pow($row,2);
					$nilai1= $this->admin_models->get_nilai_peserta($row->nik,'1')->row();
					$nilai2= $this->admin_models->get_nilai_peserta($row->nik,'2')->row();
					$nilai3= $this->admin_models->get_nilai_peserta($row->nik,'3')->row();
					$nilai4= $this->admin_models->get_nilai_peserta($row->nik,'4')->row();
					$nilai5= $this->admin_models->get_nilai_peserta($row->nik,'5')->row();
					$pembagi1+=pow($nilai1->angka_penilaian,2);
					$pembagi2+=pow($nilai2->angka_penilaian,2);
					$pembagi3+=pow($nilai3->angka_penilaian,2);
					$pembagi4+=pow($nilai4->angka_penilaian,2);
					$pembagi5+=pow($nilai5->angka_penilaian,2);
				}
				
				
				// hasil pembagian
				$hasil_bagi1 = sqrt($pembagi1);
				$hasil_bagi2 = sqrt($pembagi2);
				$hasil_bagi3 = sqrt($pembagi3);
				$hasil_bagi4 = sqrt($pembagi4);
				$hasil_bagi5 = sqrt($pembagi5);
				//var_dump($hasil_bagi1);die();
				// RIJ
				$rij_c1 = $nilai1_rs->angka_penilaian / $hasil_bagi1;
				$rij_c2 = $nilai2_rs->angka_penilaian / $hasil_bagi2;
				$rij_c3 = $nilai3_rs->angka_penilaian / $hasil_bagi3;
				$rij_c4 = $nilai4_rs->angka_penilaian / $hasil_bagi4;
				$rij_c5 = $nilai5_rs->angka_penilaian / $hasil_bagi5;
				// terbobot
				$w1=3;
				$w2=4;
				$w3=5;
				$w4=5;
				$w5=5;
				$nilai_bobot['1'] = $w1*$rij_c1;
				$nilai_bobot['2'] = $w2*$rij_c2;
				$nilai_bobot['3'] = $w3*$rij_c3;
				$nilai_bobot['4'] = $w4*$rij_c4;
				$nilai_bobot['5'] = $w5*$rij_c5;

				//var_dump($nilai_bobot);die();

				// masuukan hasil YIJ
				$insert= array(
					"id_guru" 	=>$id_guru->id,
					"result_c1" =>$nilai_bobot['1'],
					"result_c2"=>$nilai_bobot['2'],
					"result_c3"=>$nilai_bobot['3'],
					"result_c4"=>$nilai_bobot['4'],
					"result_c5"=>$nilai_bobot['5'],
				);
				//var_dump($insert);die();
				
				if($this->db->get_where('tb_hasil_topsis',array('id_guru'=>$id_guru->id))->row()){
					$this->session->set_flashdata('danger', 'Guru Sudah Di Hitung');				
					redirect('admin/nilai_topsis');

				}else{
					$this->admin_models->insert_nilai_terbobot($insert);
					$this->session->set_flashdata('info', 'data berhasil di hitung!');				
					redirect('admin/nilai_topsis');
				}

				//var_dump($nilai_bobot);
	

			}

			public function hitung_topsis_v(){

				usleep(mt_rand(100, 10000));

				$id_guru 			= $this->input->post('id_guru');
				$field = $this->db->get_where('tb_hasil_topsis',array('id_guru'=>$id_guru->id))->row();
				if(is_null($field->nilai_v)){
					$get_nilai 			= $this->db->get_where('tb_hasil_topsis',array('id_guru'=>$id_guru))->row();
				// nilai A+
				$a_plus['1'] 		=$this->admin_models->get_max_c1()->row();
				$a_plus['2'] 		=$this->admin_models->get_max_c2()->row();
				$a_plus['3'] 		=$this->admin_models->get_max_c3()->row();
				$a_plus['4'] 		=$this->admin_models->get_max_c4()->row();
				$a_plus['5'] 		=$this->admin_models->get_max_c5()->row();

				// nilai A -
				$a_min['1'] 		=$this->admin_models->get_min_c1()->row();
				$a_min['2'] 		=$this->admin_models->get_min_c2()->row();
				$a_min['3'] 		=$this->admin_models->get_min_c3()->row();
				$a_min['4'] 		=$this->admin_models->get_min_c4()->row();
				$a_min['5'] 		=$this->admin_models->get_min_c5()->row();
				// alternatif
				//$d_plus = sqrt(pow($a_plus['c1'] - $get_nilai->result_c1,2));

				$d_plus = sqrt( 
								pow($a_plus['1']->result_c1 - $get_nilai->result_c1,2) + 
								pow($a_plus['2']->result_c2 - $get_nilai->result_c2,2) + 
								pow($a_plus['3']->result_c3 - $get_nilai->result_c3,2) +
								pow($a_plus['4']->result_c4 - $get_nilai->result_c4,2) +
								pow($a_plus['5']->result_c5 - $get_nilai->result_c5,2) 
							) ;

				$d_min = sqrt( 
								pow($a_min['1']->result_c1 - $get_nilai->result_c1,2) + 
								pow($a_min['2']->result_c2 - $get_nilai->result_c2,2) + 
								pow($a_min['3']->result_c3 - $get_nilai->result_c3,2) +
								pow($a_min['4']->result_c4 - $get_nilai->result_c4,2) +
								pow($a_min['5']->result_c5 - $get_nilai->result_c5,2) 
							) ;

				//var_dump($a_plus['2']->result_c2 .'-'. $get_nilai->result_c2);die();
				$nilai_v = $d_min / ($d_min + $d_plus);
				$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
				//var_dump($nilai_v);
				if($this->admin_models->update_v($id_guru,$nilai_v,$time)){
					$this->session->set_flashdata('info', 'Nilai V berhasil di tambah');				
					redirect('admin/nilai_topsis');
					

				}else{
					//$this->admin_models->insert_nilai_terbobot($insert);
					$this->session->set_flashdata('danger', 'nilai v gagal dihitung!');				
					redirect('admin/nilai_topsis');
				}
					

				}else{
					$this->session->set_flashdata('danger', 'Guru Sudah Di Hitung');				
					redirect('admin/nilai_topsis');
				}
				

			}

			public function hitung_saw()
			{
				// $time = microtime();
				// $time = explode(' ', $time);
				// $time = $time[1] + $time[0];
				// $start = $time;
				usleep(mt_rand(100, 10000));
				
				$no_peserta 			= $this->input->post('no_peserta');
				$id_guru 				= $this->db->get_where('tb_guru',array('nik'=>$no_peserta))->row();
				
				
					
				$nilai1= $this->admin_models->get_nilai_peserta($id_guru->nik,'1')->row();
				$nilai2= $this->admin_models->get_nilai_peserta($id_guru->nik,'2')->row();
				$nilai3= $this->admin_models->get_nilai_peserta($id_guru->nik,'3')->row();
				$nilai4= $this->admin_models->get_nilai_peserta($id_guru->nik,'4')->row();
				$nilai5= $this->admin_models->get_nilai_peserta($id_guru->nik,'5')->row();

				$hs_nilai1 = $nilai1->angka_penilaian / 5;
				$hs_nilai2 = $nilai2->angka_penilaian / 5;
				$hs_nilai3 = $nilai3->angka_penilaian / 5;
				$hs_nilai4 = $nilai4->angka_penilaian / 5;
				$hs_nilai5 = $nilai5->angka_penilaian / 5;

				$v = (3*$hs_nilai1)+(4*$hs_nilai2)+(5*$hs_nilai3)+(5*$hs_nilai4)+(5*$hs_nilai5);

				
				$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
				
				if($this->admin_models->update_saw($id_guru->id,$v,$time)){
					$this->session->set_flashdata('info', 'Nilai V berhasil di tambah');				
					redirect('admin/nilai_saw');
					

				}else{
					//$this->admin_models->insert_nilai_terbobot($insert);
					$this->session->set_flashdata('danger', 'nilai v gagal dihitung!');				
					redirect('admin/nilai_saw');
				}
				

			}

			public function hitung_wp()
			{
				$no_peserta 			= $this->input->post('no_peserta');
				$nilai['attribut_1'] 	= $this->admin_models->get_nilai_warga($no_peserta,'1')->row();
				$nilai['attribut_2'] 	= $this->admin_models->get_nilai_warga($no_peserta,'2')->row();
				$nilai['attribut_3'] 	= $this->admin_models->get_nilai_warga($no_peserta,'3')->row();
				$nilai['attribut_4'] 	= $this->admin_models->get_nilai_warga($no_peserta,'4')->row();
				$nilai['attribut_5'] 	= $this->admin_models->get_nilai_warga($no_peserta,'5')->row();
				$nilai['attribut_6'] 	= $this->admin_models->get_nilai_warga($no_peserta,'6')->row();

				$hitung 				= pow($nilai['attribut_1']->angka_penilaian,$nilai['attribut_1']->nilai_bobot) * pow($nilai['attribut_2']->angka_penilaian,$nilai['attribut_2']->nilai_bobot) * pow($nilai['attribut_3']->angka_penilaian,$nilai['attribut_3']->nilai_bobot) * pow($nilai['attribut_4']->angka_penilaian,-$nilai['attribut_4']->nilai_bobot) * pow($nilai['attribut_5']->angka_penilaian,-$nilai['attribut_5']->nilai_bobot) * pow($nilai['attribut_6']->angka_penilaian,-$nilai['attribut_6']->nilai_bobot);
				$data 					= array("no_peserta" => $no_peserta,"nilai_s"=>$hitung);
				if($this->db->get_where('tb_hasil_wp',array('no_peserta'=>$no_peserta))->row()){
					$this->session->set_flashdata('danger', 'Peserta Sudah Di Hitung');				
					redirect('admin/nilai_wp');

				}else{
					$this->admin_models->insert_nilai_wp_s($data);
					$this->session->set_flashdata('info', 'data berhasil di hitung!');				
					redirect('admin/nilai_wp');
				}


			}

			public function hitung_wp_v()
			{
				$no_peserta = $this->input->post('no_peserta');
				$nilai_s	= $this->input->post('nilai_s');
				$sum 		= $this->admin_models->get_sum_v()->row();
				$hitung 	= $nilai_s / $sum->nilai_s ;
				$data 		= array("nilai_v"=>$hitung);
				if($this->admin_models->insert_nilai_wp_v($data,$no_peserta)){
					$this->session->set_flashdata('info', 'data berhasil di hitung!');				
					redirect('admin/nilai_wp');
				}else{
					$this->session->set_flashdata('danger', 'kesalahan menghitung data');				
					redirect('admin/nilai_wp');
					
				}
			}

			// guru

			public function guru()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_all_guru()->result();
				$data['c1'] 					= $this->admin_models->get_all_kriteria_att('1')->result();
				$data['c2'] 					= $this->admin_models->get_all_kriteria_att('2')->result();
				$data['c3'] 					= $this->admin_models->get_all_kriteria_att('3')->result();
				$data['c4'] 					= $this->admin_models->get_all_kriteria_att('4')->result();
				$data['c5'] 					= $this->admin_models->get_all_kriteria_att('5')->result();
				$data['tempat_tinggal'] 		= $this->admin_models->get_all_kriteria_att('6')->result();
				$data['jumlah_orderan']			='1';
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Guru';
				$data['sub_judul'] 				= 'Tabel Guru';
				$data['content'] 				= 'guru/table';
				$data['nav_top']				= 'warga';
				$this->load->view('admin/home', $data);

			}

			public function add_guru()
			{
				$date = date("Y-m-d H:i:s") ;
				$a['atribut_1'] = $this->input->post('c1');
				$a['atribut_2'] = $this->input->post('c2');
				$a['atribut_3'] = $this->input->post('c3');
				$a['atribut_4'] = $this->input->post('c4');
				$a['atribut_5'] = $this->input->post('c5');
				$data = array(
					"nik"					=> $this->input->post('nik'),
					"nama_guru" 			=> $this->input->post('nama_guru'),
					"tempat_tanggal_lahir" 	=> $this->input->post('tempat_tanggal_lahir'),
					"jenis_kelamin" 		=> $this->input->post('jenis_kelamin'),
					"tanggal_lahir" 		=> $this->input->post('tanggal_lahir'),
					"alamat" 		=> $this->input->post('alamat'),
					"date_input" 	=> $date,
					"c1"			=> $a['atribut_1'],
					"c2" 			=> $a['atribut_2'],
					"c3" 			=> $a['atribut_3'],
					"c4" 			=> $a['atribut_4'],
					"c5"  			=> $a['atribut_5'],
					"password" =>$this->converPassword(date($this->input->post('tanggal_lahir')))
				);

				if($this->admin_models->tambah_guru($data)){
					//masuk ke tabel penilaian
					$guru 		= $this->db->get_where('tb_guru', array('date_input' =>$date))->row();
					$no_peserta = $guru->nik;
					
					for($i=1; $i<=5 ;$i++){
						$p['penilaian_'.$i]	= $this->db->get_where('tb_attribut', array('id' =>$a['atribut_'.$i]))->row();
						$b['bobot_'.$i]		= $this->db->get_where('tb_kriteria', array('kd_kriteria' =>$p['penilaian_'.$i]->id_kriteria))->row();
						$data2 		= array(
											"no_peserta" 		=>$no_peserta,	
											"kd_kriteria" 		=>$b['bobot_'.$i]->kd_kriteria,
											"angka_penilaian" 	=>$p['penilaian_'.$i]->nilai,
											"nilai_bobot"		=>$b['bobot_'.$i]->nilai_bobot
										);
						$this->admin_models->input_penilaian($data2);

					}

					$this->session->set_flashdata('info', 'data berhasil di tambah!');				
					redirect('admin/guru');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/guru');
				}

			}

			function converPassword($getDate)
            {
                $arrDate    = explode("-", $getDate);
                if(is_array($arrDate)){
                    $date = $arrDate[2].$arrDate[1].$arrDate[0];
                }      
                return $date;
            }

			public function form_edit_guru($id)
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['edit'] 					= $this->admin_models->get_single_guru($id)->row();
				$data['c1'] 					= $this->admin_models->get_all_kriteria_att('1')->result();
				$data['c2'] 					= $this->admin_models->get_all_kriteria_att('2')->result();
				$data['c3'] 					= $this->admin_models->get_all_kriteria_att('3')->result();
				$data['c4'] 					= $this->admin_models->get_all_kriteria_att('4')->result();
				$data['c5'] 					= $this->admin_models->get_all_kriteria_att('5')->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Guru';
				$data['sub_judul'] 				= 'Edit Guru';
				$data['content'] 				= 'guru/form';
				$data['nav_top']				= 'guru';
				$this->load->view('admin/home', $data);

			}

			public function edit_guru()
			{
				$id_guru 			= $this->input->post('id_guru');
				$date 			= date("Y-m-d H:i:s") ;
				$a['atribut_1'] = $this->input->post('c1');
				$a['atribut_2'] = $this->input->post('c2');
				$a['atribut_3'] = $this->input->post('c3');
				$a['atribut_4'] = $this->input->post('c4');
				$a['atribut_5'] = $this->input->post('c5');
				$data = array(
					"nik"					=> $this->input->post('nik'),
					"nama_guru" 			=> $this->input->post('nama_guru'),
					"tempat_tanggal_lahir" 	=> $this->input->post('tempat_tanggal_lahir'),
					"jenis_kelamin" 		=> $this->input->post('jenis_kelamin'),
					"tanggal_lahir" 		=> $this->input->post('tanggal_lahir'),
					"alamat" 		=> $this->input->post('alamat'),
					"date_input" 	=> $date,
					"c1"			=> $a['atribut_1'],
					"c2" 			=> $a['atribut_2'],
					"c3" 			=> $a['atribut_3'],
					"c4" 			=> $a['atribut_4'],
					"c5"  			=> $a['atribut_5'],
					"password" =>$this->converPassword(date($this->input->post('tanggal_lahir')))
				);

				if($this->admin_models->update_guru($data,$id_guru)){
					// delete terlebidahulu kolom penilaian
					$this->admin_models->delete_penilaian($this->input->post('nik'));
					//masuk ke tabel penilaian
					$guru 		= $this->db->get_where('tb_guru', array('date_input' =>$date))->row();
					$nik = $guru->nik;
					
					for($i=1; $i<=3 ;$i++){
						$p['penilaian_'.$i]	= $this->db->get_where('tb_attribut', array('id' =>$a['atribut_'.$i]))->row();
						$b['bobot_'.$i]		= $this->db->get_where('tb_kriteria', array('kd_kriteria' =>$p['penilaian_'.$i]->id_kriteria))->row();
						$data2 		= array(
											"no_peserta" 		=>$nik,	
											"kd_kriteria" 		=>$b['bobot_'.$i]->kd_kriteria,
											"angka_penilaian" 	=>$p['penilaian_'.$i]->nilai,
											"nilai_bobot"		=>$b['bobot_'.$i]->nilai_bobot
										);
						$this->admin_models->input_penilaian($data2);

					}
					$this->session->set_flashdata('info', 'data berhasil di update!');				
					redirect('admin/guru');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan update data');				
					redirect('admin/guru');
				}


			}

			public function delete_guru()
			{
				$id 	= $this->input->post('id');
				if($this->admin_models->hapus_warga($id)){
					$this->admin_models->delete_penilaian($id_warga);
					$this->session->set_flashdata('info', 'data berhasil di hapus!');				
					redirect('admin/warga');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menghapus data');				
					redirect('admin/warga');
				}

			}

			public function laporan_waktu(){
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_report()->result();
				$data['guru'] 					= $this->admin_models->get_all_guru()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'laporan';
				$data['sub_judul'] 				= 'Laporan';
				$data['content'] 				= 'admin/laporan';
				$data['nav_top']				= 'laporan';
				$this->load->view('admin/home', $data);

			}

			public function laporan_saw(){
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_report()->result();
				$data['guru'] 					= $this->admin_models->get_all_guru()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'laporan';
				$data['sub_judul'] 				= 'Laporan';
				$data['content'] 				= 'admin/laporan_saw';
				$data['nav_top']				= 'laporan';
				$this->load->view('admin/home', $data);

			}

			public function laporan_topsis(){
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_report()->result();
				$data['guru'] 					= $this->admin_models->get_all_guru()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'laporan';
				$data['sub_judul'] 				= 'Laporan';
				$data['content'] 				= 'admin/laporan_topsis';
				$data['nav_top']				= 'laporan';
				$this->load->view('admin/home', $data);

			}
			public function cetak($type){
				if($type=='topsis'){
					$data['table']		=$this->admin_models->get_nilai_report()->result();
					$html = $this->load->view('cetak/topsis', $data, true);

				}elseif($type=='saw'){
					$data['table']		=$this->admin_models->get_nilai_report()->result();
					$html = $this->load->view('cetak/saw', $data, true);
					

				}elseif($type=='waktu'){
					$data['table']		=$this->admin_models->get_nilai_report()->result();
					$html = $this->load->view('cetak/waktu', $data, true);

				}			
				$this->pdf->generate($html,'contoh');
			}

		}