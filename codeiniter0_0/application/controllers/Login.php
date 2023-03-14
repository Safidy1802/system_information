<?php
defined('BASEPATH') OR exit('No direct script access allowed');	//protection fichier
class Login extends CI_Controller {	///Code Initeur ///class tjr MAJ

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 // localhost/index.php/welcome/index
	 //raha tsy mitemy localhost/index.php/welcome dia index no tadiaviny sinon manao erreur

	public function index()
	{
		// $this->load->helper('email_helper');
		// $this->load->helper('url_helper');
		// valid_email('test@test.test');

		// $this->load->view('welcome_message');
		//this.


		$this->session->unset_userdata('logged_in');
		$this->load->view('login');
	}
	public function page()
	{
		// $this->load->helper('session_helper');
		redirect('fonction/index');
	}

	public function inscription()
	{
		$this->load->view('inscription');
	}

	public function deconnexion()
	{
		// echo $_SESSION['nom'];
		// parent::__construct();

		// $this->session->unset_userdata('logged_in');

		redirect('fonction');

	}
	public function receiveinscription()
	{
		$this->load->model('Modelbdd');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$dtn=$this->input->post('dtn');
		$genre=$this->input->post('genre');
		$admin=$this->input->post('admin');
		$tab=array(
			'iduser' => null,
			'email' => $email,
			'mdp' => $mdp,
			'nom' => $nom,
			'prenom' => $prenom,
			'genre' => $genre,
			'dtn' => $dtn,
			'isadmin' => $admin,
		);
		$this->Modelbdd->sinscrire($tab);
		$id=$this->Modelbdd->getidbyusername($nom);
		$tab=array(
			'email' => $email,
			'iduser' => $id,
			'nom' => $nom,

		); 
		$this->load->library('session');

		$this->session->set_userdata('logged_in',$tab);
		redirect('fonction/index');

	}



	public function receive()
	{
		$this->load->library('session');
		$this->load->model('Modelbdd');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$array=array();
		$array=$this->Modelbdd->getinscrit();
		
		foreach ($array->result_array() as $row) {
			if (($row['email']==$email)&&($row['mdp']==$mdp)) {
				$tab=array(
					'email' => $row['email'],
					'iduser' => $row['iduser'],
					'username' => $row['nom'],

				); 
				echo $row['email'];
				$this->session->set_userdata('logged_in',$tab);
				echo "ok";
				break;
			}
		}
        var_dump($_SESSION['logged_in']);


		
		// array (size=2)
		// 'username' => string 'admin' (length=5)
		// 'email' => string 'admin@admin' (length=11)

		// echo $_SESSION['connect']['username'];


		redirect('fonction/index');
	}

	// public function getinscrit()
	// {
	// 	$this->load->model('Modelbdd');
    //     $array=array();
	// 	$array=$this->Modelbdd->getinscrit();
	// 	// foreach ($array->result_array() as $row) {
	// 	// 	echo $row['actor_id']." ";
	// 	// 	echo $row['first_name']." ";
	// 	// 	echo $row['last_name']." ";
	// 	// 	echo $row['last_update']." <br>";
	// 	// }

	// }

	// public function bdd()
	// {
	// 	$query = $this->db->query('select * from actor');
	// 	foreach ($query->result_array() as $row) {
	// 		echo $row['actor_id']." ";
	// 		echo $row['first_name']." ";
	// 		echo $row['last_name']." ";
	// 		echo $row['last_update']." <br>";
	// 	}
	// }
	// public function bddonerow()
	// {
	// 	$query = $this->db->query('select * from actor limit 1');
	// 	$row= $query->row_array();
	// 	echo $row['actor_id']." ";
	// 	echo $row['first_name']." ";
	// 	echo $row['last_name']." ";
	// 	echo $row['last_update']." <br>";
	// }

	// public function bddinsert()
	// {
	// 	$sql= "insert into actor (title,name) values('%s','%s')";
	// 	$sql= sprintf($sql,$this->db->escape($title),$this->db->escape($name));
	// 	// escape mametraka '' @ string
	// 	$this->db->query($sql);
	// 	echo $this->db->affectef_rows();
	// }
	

	// public function kez($pseudo = 'messi') ///messi valeur par defaut
	// {
	// 	echo "bravo ".$pseudo."<br>";
	// }
	// public function about()
	// 	{
	// 	// définition des données variables du template
	// 	$data['title'] = 'Le titre de la page';
	// 	$data['description'] = 'La description de la page pour les moteurs de recherche';
	// 	$data['keywords'] = 'les, mots, clés, de, la, page';
	// 	// on charge la view qui contient le corps de la page
	// 	$data['contents'] = 'templates/page_contenu_view';
	// 	// on charge la page dans le template
	// 	$this->load->view('templates/template', $data);
	// 	}
}
