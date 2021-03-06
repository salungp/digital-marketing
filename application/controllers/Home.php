<?php class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// create visitor
		$this->db->insert('visitor', [
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'browser' => $_SERVER['HTTP_USER_AGENT']
		]);

		$armada = $this->db->order_by('text', 'desc')->get_where('content', ['title' => 'armada-item'])->result_array();
		$armada_4 = $this->db->order_by('text', 'desc')->get_where('content', ['title' => 'cluster-alinda-4'])->result_array();
		$banner = $this->db->get_where('content', ['title' => 'banner'])->row_array();
		$banner_description = $this->db->get_where('content', ['title' => 'banner-description'])->row_array();
		$layanan = $this->db->get_where('content', ['title' => 'layanan'])->result_array();
		$layanan_section = $this->db->get_where('content', ['title' => 'layanan-section'])->row_array();
		$kelebihan = $this->db->get_where('content', ['parent' => 'kelebihan'])->result_array();
		$kontak_list = $this->db->get_where('content', ['parent' => 'kontak-list'])->result_array();
		$tentang = $this->db->get_where('content', ['title' => 'tentang'])->row_array();
		$kontak_atas = $this->db->get_where('content', ['parent' => 'kontak'])->row_array();
		$nomor_wa = $this->db->get_where('content', ['title' => 'nomor-wa'])->row_array();
		$layanan_text = $this->db->get_where('content', ['title' => 'layanan-text'])->row_array();
		$pricing = $this->db->get_where('content', ['title' => 'pricing'])->result_array();
		$promo = $this->db->get_where('content', ['title' => 'promo'])->result_array();
		$fasilitas = $this->db->get_where('content', ['title' => 'fasilitas'])->row_array();
		$footer = $this->db->get_where('content', ['title' => 'footer'])->row_array();
		$menu = $this->db->get_where('content', ['title' => 'menu'])->result_array();
		$cluster_alinda_3 = $this->db->get_where('content', ['title' => 'cluster-alinda-3-title'])->row_array();
		$cluster_alinda_4 = $this->db->get_where('content', ['title' => 'cluster-alinda-4-title'])->row_array();

		$data = [
			'armada' => $armada,
			'armada_4' => $armada_4,
			'banner' => $banner,
			'banner_description' => $banner_description,
			'layanan' => $layanan,
			'layanan_section' => $layanan_section,
			'kelebihan' => $kelebihan,
			'tentang' => $tentang,
			'kontak_atas' => $kontak_atas,
			'kontak_list' => $kontak_list,
			'layanan_text' => $layanan_text,
			'nomor_wa' => $nomor_wa,
			'pricing' => $pricing,
			'promo' => $promo,
			'fasilitas' => $fasilitas,
			'footer' => $footer,
			'cluster_alinda_3' => $cluster_alinda_3,
			'cluster_alinda_4' => $cluster_alinda_4,
		];

		$this->load->view('home_templates/header', ['title' => $banner['text'], 'tentang' => $tentang, 'nomor_wa' => $nomor_wa, 'menu' => $menu]);
		$this->load->view('home/index', $data);
		$this->load->view('home_templates/footer');
	}
}