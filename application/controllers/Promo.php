<?php class Promo extends CI_Controller
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
		$title_page = 'Admin - Promo list';
    $breadcrumb = [
      'title' => 'Promo list',
      'description' => '',
      'breadcrumbs' => [],
      'active' => 'Promo'
    ];
    $promo = $this->db->order_by('id', 'desc')->get_where('content', ['title' => 'promo'])->result_array();

    $this->load->view('templates/header', ['title' => $title_page]);
    $this->load->view('templates/breadcrumb', ['breadcrumb' => $breadcrumb]);
    $this->load->view('promo/index', ['promo' => $promo]);
    $this->load->view('templates/footer');
	}

	public function create()
	{
		$title = 'promo';
		$slug = strtolower(str_replace(' ', '-', $title));
		$text = $this->input->post('text');
		$parent = 'promo';
		$image = '';
		$author = $this->session->userdata('login');

		if ($_FILES['image']['name'] != '') {
			$file_name = $_FILES['image']['name'];
			$file_from = $_FILES['image']['tmp_name'];
			$eks = explode('.', $file_name)[count(explode('.', $file_name))-1];
			$allow_ekse = ['jpg', 'png', 'gif', 'mp4', 'avi', 'mp4a', 'wav'];

			if (!in_array($eks, $allow_ekse)) {
				$this->message->alert('danger', 'Maaf ekstensi selain gambar tidak diperbolehkan');
				redirect($this->agent->referrer());
			}

			$image = './assets/data/content/'.$slug.uniqid().'.'.$eks;

			move_uploaded_file($file_from, $image);
		}

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
		$promo = $this->db->get_where('content', ['id' => $id])->row_array();
		$title = 'promo';
		$slug = strtolower(str_replace(' ', '-', $title));
		$text = $this->input->post('text');
		$parent = 'promo';
		$image = $promo['image'];
		$author = $this->session->userdata('login');

		if ($_FILES['image']['name'] != '') {
			$file_name = $_FILES['image']['name'];
			$file_from = $_FILES['image']['tmp_name'];
			$eks = explode('.', $file_name)[count(explode('.', $file_name))-1];
			$allow_ekse = ['jpg', 'png', 'gif'];

			if (!in_array($eks, $allow_ekse)) {
				$this->message->alert('danger', 'Maaf ekstensi selain gambar tidak diperbolehkan');
				redirect($this->agent->referrer());
			}

			$image = './assets/data/content/'.$slug.uniqid().'.'.$eks;

			move_uploaded_file($file_from, $image);
		}

		$this->db->where('id', $id)->update('content', [
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'parent' => $parent,
			'image' => $image,
			'author' => $author,
		]);

		$this->message->alert('success', 'Data berhasil diubah.');
		redirect($this->agent->referrer());
	}

	public function search()
	{
		$key = $this->input->get('q');
		$content = $this->db->like('title', $key)->order_by('id', 'desc')->get('content')->result_array();
		$title_page = 'Admin - Content list';
    $breadcrumb = [
      'title' => 'Content list',
      'description' => '',
      'breadcrumbs' => [],
      'active' => 'Content'
    ];

    $this->load->view('templates/header', ['title' => $title_page]);
    $this->load->view('templates/breadcrumb', ['breadcrumb' => $breadcrumb]);
    $this->load->view('content/index', ['content' => $content]);
    $this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->db->delete('content', ['id' => $id]);
		$this->message->alert('success', 'Data berhasil dihapus.');
		redirect($this->agent->referrer());
	}
}