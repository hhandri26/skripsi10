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
				$data['table'] 					= $this->admin_models->get_nilai_saw()->result();
				$data['warga'] 					= $this->admin_models->get_all_warga()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Penilaian';
				$data['sub_judul'] 				= 'Penilaian SAW';
				$data['content'] 				= 'admin/nilai_saw';
				$data['nav_top']				= 'penilaian';
				$this->load->view('admin/home', $data);

			}

			public function nilai_wp()
			{
				$data['admin']					= $this->db->get_where('admin', array('id' => 1))->row();
				$data['table'] 					= $this->admin_models->get_nilai_wp()->result();
				$data['warga'] 					= $this->admin_models->get_all_warga()->result();
				$data['script_top']    			= 'admin/script_top';
				$data['script_bottom']  		= 'admin/script_btm';
				$data['admin_nav']				= 'admin/admin_nav';
				$data['judul'] 					= 'Penilaian';
				$data['sub_judul'] 				= 'Penilaian WP';
				$data['content'] 				= 'admin/nilai_wp';
				$data['nav_top']				= 'penilaian';
				$this->load->view('admin/home', $data);

			}

			public function hitung_saw()
			{
				$no_peserta 			= $this->input->post('no_peserta');
				$max_kriteria['k_1'] 	= $this->admin_models->get_max_penilian('1')->row();
				$max_kriteria['k_2'] 	= $this->admin_models->get_max_penilian('2')->row();
				$max_kriteria['k_3'] 	= $this->admin_models->get_max_penilian('3')->row();

				$min_kriteria['mink_4'] = $this->admin_models->get_min_penilaian('4')->row();
				$min_kriteria['mink_5'] = $this->admin_models->get_min_penilaian('5')->row();
				$min_kriteria['mink_6'] = $this->admin_models->get_min_penilaian('6')->row();

				$nilai['attribut_1'] 	= $this->admin_models->get_nilai_warga($no_peserta,'1')->row();
				$nilai['attribut_2'] 	= $this->admin_models->get_nilai_warga($no_peserta,'2')->row();
				$nilai['attribut_3'] 	= $this->admin_models->get_nilai_warga($no_peserta,'3')->row();
				$nilai['attribut_4'] 	= $this->admin_models->get_nilai_warga($no_peserta,'4')->row();
				$nilai['attribut_5'] 	= $this->admin_models->get_nilai_warga($no_peserta,'5')->row();
				$nilai['attribut_6'] 	= $this->admin_models->get_nilai_warga($no_peserta,'6')->row();

				$h1	 	= $nilai['attribut_1']->angka_penilaian / $max_kriteria['k_1']->angka_penilaian;
				$h2	 	= $nilai['attribut_2']->angka_penilaian / $max_kriteria['k_2']->angka_penilaian;
				$h3	 	= $nilai['attribut_3']->angka_penilaian / $max_kriteria['k_3']->angka_penilaian;

				$h4 	= $min_kriteria['mink_4']->angka_penilaian / $nilai['attribut_4']->angka_penilaian;
				$h5 	= $min_kriteria['mink_5']->angka_penilaian / $nilai['attribut_5']->angka_penilaian;
				$h6 	= $min_kriteria['mink_6']->angka_penilaian / $nilai['attribut_6']->angka_penilaian;

				$final 	= $h1*$nilai['attribut_1']->nilai_bobot + $h2*$nilai['attribut_2']->nilai_bobot + $h3*$nilai['attribut_3']->nilai_bobot + $h4*$nilai['attribut_4']->nilai_bobot + $h4*$nilai['attribut_5']->nilai_bobot + $h6*$nilai['attribut_6']->nilai_bobot ;

				$data 	= array("no_peserta" => $no_peserta,"nilai_saw"=>$final);
				if($this->db->get_where('tb_hasil',array('no_peserta'=>$no_peserta))->row()){
					$this->session->set_flashdata('danger', 'Peserta Sudah Di Hitung');				
					redirect('admin/nilai_saw');

				}else{
					$this->admin_models->insert_nilai_saw($data);
					$this->session->set_flashdata('info', 'data berhasil di hitung!');				
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
				$data['judul'] 					= 'Warga';
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
					"c5"  			=> $a['atribut_5']
				);

				if($this->admin_models->tambah_guru($data)){
					//masuk ke tabel penilaian
					$guru 		= $this->db->get_where('tb_guru', array('date_input' =>$date))->row();
					$no_peserta = $guru->nik;
					
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
					redirect('admin/guru');

				}else{
					$this->session->set_flashdata('danger', 'kesalahan menginput data');				
					redirect('admin/guru');
				}

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
					"c5"  			=> $a['atribut_5']
				);

				if($this->admin_models->update_guru($data,$id_guru)){
					// delete terlebidahulu kolom penilaian
					$this->admin_models->delete_penilaian($this->input->post('nik'));
					//masuk ke tabel penilaian
					$guru 		= $this->db->get_where('tb_guru', array('date_input' =>$date))->row();
					$nik = $guru->nik;
					
					for($i=1; $i<=6 ;$i++){
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

		}