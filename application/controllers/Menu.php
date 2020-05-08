<?php class Menu extends CI_Controller
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
		$title_page = 'Admin - Menu list';
    $breadcrumb = [
      'title' => 'Menu list',
      'description' => '',
      'breadcrumbs' => [],
      'active' => 'Menu'
    ];
    $menu = $this->db->order_by('id', 'desc')->get_where('content', ['title' => 'menu'])->result_array();

    $this->load->view('templates/header', ['title' => $title_page]);
    $this->load->view('templates/breadcrumb', ['breadcrumb' => $breadcrumb]);
    $this->load->view('menu/index', ['menu' => $menu]);
    $this->load->view('templates/footer');
	}

	public function create()
	{
		$title = 'menu';
		$slug = strtolower(str_replace(' ', '-', $title));
		$text = $this->input->post('text');
		$parent = $this->input->post('link');
		$image = '';
		$author = $this->session->userdata('login');

		$this->db->insert('content', [
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'parent' => $parent,
			'image' => $image,
			'author' => $author,
		]);

		$this->message->alert('success', 'Data berhasil ditambah.');
		redirect($this->agent->referrer());
	}

	public function update($id)
	{
		$title = 'menu';
		$slug = strtolower(str_replace(' ', '-', $title));
		$text = $this->input->post('text');
		$parent = $this->input->post('link');
		$image = '';
		$author = $this->session->userdata('login');

		$this->db->where('id', $id)->update('content', [
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'parent' => $parent,
			'image' => $image,
			'author' => $author,
		]);

		$this->message->alert('success', 'Data berhasil diupdate.');
		redirect($this->agent->referrer());
	}

	public function delete($id)
	{
		$this->db->delete('content', ['id' => $id]);
		$this->message->alert('success', 'Data berhasil dihapus.');
		redirect($this->agent->referrer());
	}
}