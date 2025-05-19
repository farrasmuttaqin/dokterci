<?php
class m_masterobat extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function simpan($data)
	{
		$this->db->insert('master_obat', $data);
	}

	function tampil_masterobat($num = '', $offset = '')
	{
		$this->db->select(array(
			'obat_id',
			'nama_obat',
			'harga_obat',
			'cara_pakai_obat',
		), FALSE);

		$this->db->order_by('obat_id', 'DESC');
		if ($num != '' && $offset != '') {
			$query = $this->db->get('master_obat', $num, $offset);
		} else {
			$query = $this->db->get('master_obat');
		}

		return $query->result();
	}

	function update_masterobat($data, $obat_id)
	{
		$this->db->where('obat_id', $obat_id);
		$this->db->update('master_obat', $data);
	}

	function ambil_masterobat($id)
	{
		$query = $this->db->get_where('master_obat', array('obat_id' => $id));

		return $query->row();
	}

	function hapus_masterobat($obat_id)
	{
		$this->db->where('obat_id', $obat_id);
		$this->db->delete('master_obat');
	}

	function cetak_masterobat()
	{

		$this->db->select('*');

		$query = $this->db->get('master_obat');
		return $query->result();
	}

	//datatables serverside mulai dari sini

	public function get_items()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get('master_obat');


		$data = [];


		foreach ($query->result() as $r) {
			$data[] = array(
				$r->nama_obat,
				$r->harga_obat,
				$r->cara_pakai_obat,
				'<a href="' . site_url() . '/master_obat/ubah/' . $r->obat_id . '" class="btn btn-sm btn-info" title="Ubah Data"><i class="glyphicon glyphicon-pencil"></i></a>
				<a href="' . site_url() . '/master_obat/hapus/' . $r->obat_id . '" class="btn btn-sm btn-danger" title="Hapus Data" onclick="return confirm(\'Yakin mau hapus data ini?\')"><i class="glyphicon glyphicon-trash"></i></a>',
			);
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
		exit();
	}
}
