<?php

class master_obat extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) {redirect('auth/login');}
		$this->load->model('m_masterobat','master_obat');

	}

    function get_items(){
        return $this->master_obat->get_items();
    }


	function index($id=null){

		$get = $this->db->get('master_obat');

		$config['base_url'] = site_url().'/obat/index';

		$config['total_rows'] = $get->num_rows();
		$config['per_page'] = 10;
		$config['next_page'] = '&raquo;';
		$config['prev_page'] = '&laquo;';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';

		$this->pagination->initialize($config);

		$data['query'] = $this->master_obat->tampil_masterobat($config['per_page'],$id );

		$this->uri->segment(3);

		$data['halaman'] = $this->pagination->create_links();


//        var_dump(json_encode($data), true);
//        exit();
        //   echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view('head');
		$this->load->view('master/obat/index', $data);
		$this->load->view('foot');
	}

	function tambah_obat(){
		if(isset($_POST['submit'])){
            $data = array(
            	'nama_obat' => $this->input->post('nama_obat'),
                'harga_obat' => $this->input->post('harga_obat'),
            	'cara_pakai_obat' => $this->input->post('cara_pakai_obat'),
            	);

            $this->master_obat->simpan($data);
            $this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil disimpan.</div>');
            redirect('master_obat');

        }else{
        	$this->load->view('head');
        	$this->load->view('master/obat/tambah_obat');
        	$this->load->view('foot');
        }
    }

    function ubah($id=null){
    	if(!$id){
    		echo 'Parameter Error. Hubungi Administrator Program.';
    	}else{
    		if(isset($_POST['submit'])){
    			
    			$data = array(
                    'nama_obat' => $this->input->post('nama_obat'),
                    'harga_obat' => $this->input->post('harga_obat'),
                    'cara_pakai_obat' => $this->input->post('cara_pakai_obat'),
    			);

    			$this->master_obat->update_masterobat($data, $id);
    			$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil diubah.</div>');
    			redirect('master_obat');

    		}else{
    			$data['query'] = $this->master_obat->ambil_masterobat($id);

    			$this->load->view('head');
    			$this->load->view('master/obat/obat_edit', $data);
    			$this->load->view('foot');
    		}
    	}
    }

    function hapus($id=null){
    	if(!$id){
    		echo 'Parameter Error';
    	}else{

    		$this->master_obat->hapus_masterobat($id);
    		$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil hapus.</div>');
    		redirect('master_obat');
    	}
    }

    function cetak(){
		$data['cetak'] = $this->master_obat->cetak_masterobat();

		$this->load->view('master/obat/obat_cetak', $data);

	}

//end of class	
}