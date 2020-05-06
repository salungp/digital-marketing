<?php class Pricing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login')) {
			redirect('login');
		}
		$this->load->model('Message_model', 'message');
	}

	public function index()
	{
		$title_page = 'Admin - Pricing list';
    $breadcrumb = [
      'title' => 'Pricing list',
      'description' => '',
      'breadcrumbs' => [],
      'active' => 'Pricing'
    ];
    $pricing = $this->db->order_by('id', 'desc')->get('pricing')->result_array();

    $this->load->view('templates/header', ['title' => $title_page]);
    $this->load->view('templates/breadcrumb', ['breadcrumb' => $breadcrumb]);
    $this->load->view('pricing/index', ['pricing' => $pricing]);
    $this->load->view('templates/footer');
	}

	public function search()
	{
		$key = $this->input->get('q');
		$title_page = 'Admin - Pricing list';
    $breadcrumb = [
      'title' => 'Pricing list',
      'description' => '',
      'breadcrumbs' => [],
      'active' => 'Pricing'
    ];
    $pricing = $this->db->like('text', $key)->order_by('id', 'desc')->get('pricing')->result_array();

    $this->load->view('templates/header', ['title' => $title_page]);
    $this->load->view('templates/breadcrumb', ['breadcrumb' => $breadcrumb]);
    $this->load->view('pricing/index', ['pricing' => $pricing]);
    $this->load->view('templates/footer');
	}

	public function create()
	{
		$text = htmlspecialchars($this->input->post('text'));
		$status = htmlspecialchars($this->input->post('status'));
		$type = htmlspecialchars($this->input->post('type'));

		$data = [
			'text' => $text,
			'status' => $status,
			'type' => $type
		];

		$this->db->insert('pricing', $data);
		$this->message->alert('success', 'Pricing berhasil ditambah.');
		redirect($this->agent->referrer());
	}

	public function update($id)
	{
		$text = htmlspecialchars($this->input->post('text'));
		$status = htmlspecialchars($this->input->post('status'));
		$type = htmlspecialchars($this->input->post('type'));

		$data = [
			'text' => $text,
			'status' => $status,
			'type' => $type
		];

		$this->db->where('id', $id)->update('pricing', $data);
		$this->message->alert('success', 'Pricing berhasil ditambah.');
		redirect($this->agent->referrer());
	}

	public function delete($id)
	{
		$pricing = $this->db->get_where('pricing', ['id' => $id])->row_array();

		if ($pricing) {
			$this->db->delete('id', $id);
			$this->message->alert('success', 'Pricing berhasil dihapus.');
			redirect($this->agent->referrer());
		} else {
			show_404();
		}
	}
}