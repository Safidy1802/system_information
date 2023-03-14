<?php
defined('BASEPATH') OR exit('No direct script access allowed');	//protection fichier
require_once (APPPATH . 'controllers/Mysession.php');

class Fonction extends Mysession{
    public function index ()
    {
        $this->load->model('Generalise');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();

        $this->load->view('templates/header',$categories);
        

        $this->load->view('templates/template');
        
    }
    public function acceuil()
    {
       
    }
    public function categorie($idcategorie = '')
    {
        $this->load->model('Modelbdd');
        $this->load->model('Generalise');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();
        $this->load->view('templates/header',$categories);

       if ($idcategorie=='') {
        echo "tous";
       }else{
        $data=array();
        $data['objets']=$this->Generalise->getobjectbycategorie($idcategorie);
        $this->load->view('pages/card',$data);
       }
       $this->load->view('templates/footer');

    }
    public function decouvrir()
    {
       
    }
    public function profil($nomuser = '')
    {
        $this->load->model('Modelbdd');
        $data=array();
        if ($nomuser == '') {
            $data['profil']=$this->Modelbdd->bddgetprofil($_SESSION['logged_in']['iduser']);
        $data['objets']=$this->Modelbdd->getobjetbyuser($_SESSION['logged_in']['iduser']);
    }else {
        $iduser = $this->Modelbdd->getidbyusername($nomuser);
            $data['profil']=$this->Modelbdd->bddgetprofil($iduser[0]['iduser']);
        $data['objets']=$this->Modelbdd->getobjetbyuser($iduser[0]['iduser']);
    }

        $this->load->model('Generalise');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();
        $this->load->view('templates/header',$categories);

        $this->load->view('pages/profil',$data);
        $this->load->view('templates/footer');

    }

    public function statistique()
    {
        $this->load->model('Generalise');
        $this->load->model('Modelbdd');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();
        $this->load->view('templates/header',$categories);
        $data['echanges']=$this->Modelbdd->historique();
        $this->load->view('pages/statistique',$data);

        $this->load->view('templates/footer');

    }


    public function receivejouterobjet()
    {
        $nom = $this->input->get('nom');
		$prix = $this->input->get('prix');
		$description = $this->input->get('description');
        if(isset($_FILES['photo'])) {      
            $dossier = 'Codeigniteur/Projet1/assets/img/object';     
            $fichier = basename($_FILES['photo']['name']);  

            $url = $dossier.'/'.$_FILES['photo']['name'];
            echo $dossier; 
            var_dump($_FILES['photo']);
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $url)){          
                echo 'Upload effectué avec succès !';
                echo $_FILES['photo']['tmp_name'];     
            }     
            else{          
                echo 'Echec de l\'upload !';     
            } 
        }
    }
    public function demander($idobjet){
        $this->load->model('Modelbdd');
        $this->Modelbdd->getobjetbyid($idobjet);
        $objet = $this->Modelbdd->getobjetbyid($idobjet);
        $this->load->library('session');
        $_SESSION['objetdemande']=$objet;
        // var_dump($_SESSION['objetdemande']);
        // unset($_SESSION['objetdemande']);
        redirect(site_url('fonction/profil'));
    }
    public function proposer($idobjetproposition){
        $this->load->model('Modelbdd');
        $this->Modelbdd->getobjetbyid($idobjetproposition);
        $objet = $this->Modelbdd->getobjetbyid($idobjetproposition);
        
        $idobjangatahana = $_SESSION['objetdemande'][0]['idobjet'];
        $idangatahana = $_SESSION['objetdemande'][0]['iduser'];
        $date=date_create('now')->format('Y-m-d H:i:s'); 
        $arraydemande=array(
            'datedemande'=>$date,
            'idmpangataka'=>$objet[0]['iduser'],
            'idangatahana'=>$idangatahana,
            'idobjmpangataka'=>$objet[0]['idobjet'],
            'idobjangatahana'=>$idobjangatahana,
            'etatdemande'=>0
        );
        $this->Modelbdd->insertdemande($arraydemande);
        unset($_SESSION['objetdemande']);
        redirect(site_url('fonction/demande'));
    }
    public function demande()
    {
        // var_dump($_SESSION['logged_in']);

        $this->load->model('Generalise');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();
        $this->load->view('templates/header',$categories);
        $this->load->model('Modelbdd');
        $array['listesdemande'] = $this->Modelbdd->listedemande();
        // var_dump($_SESSION);

        $this->load->view('pages/listdemande',$array);
        $this->load->view('templates/footer');

    }

    public function deconnexion()
    {
       session_destroy();
       redirect('login/');
    }

    public function verifidprofil($username ='') {
        redirect('fonction/profil/'.$username);
    }
    public function updateetat($iddemande = '',$valeur='')
    {
        $this->load->model('Modelbdd');
        $this->Modelbdd->update('demande',$iddemande,'iddemande','etatdemande',$valeur);
        $demande = $this->Modelbdd->getdemandebyiddemande($iddemande);
        $date=date_create('now')->format('Y-m-d H:i:s'); 
        if ($valeur==1) {
            $arrayechange1=array(
                'dateechange'=>$date,
                'idproprio'=>$demande[0]['idangatahana'],
                'idobjet'=>$demande[0]['idobjangatahana'],
                'idnouveauproprio'=>$demande[0]['idmpangataka']
            );
            $this->Modelbdd->insertechange($arrayechange1);

            $arrayechange2=array(
                'dateechange'=>$date,
                'idproprio'=>$demande[0]['idmpangataka'],
                'idobjet'=>$demande[0]['idobjmpangataka'],
                'idnouveauproprio'=>$demande[0]['idangatahana']
            );
            $this->Modelbdd->insertechange($arrayechange2);

        }
        redirect('fonction/demande');
    }

    public function ajoutercategorie()
    {
        $this->load->model('Generalise');
        $categories=array();
        $categories['allcategorie']=$this->Generalise->getAllcategory();
        $this->load->view('templates/header',$categories);

        $this->load->view('pages/ajoutcategorie');

        $this->load->view('templates/footer');

    }


}