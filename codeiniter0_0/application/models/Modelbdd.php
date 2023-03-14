<?php
 if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Modelbdd extends CI_Model 
{
    public function getinscrit()
    {
        $array=array();
        $array=$this->db->get('user');
        return $array;
    }
    public function bddgetprofil($id = '')
    {
        $array=array();
        $this->db->where('iduser',$id);
        $array=$this->db->get('user');
        $result=array();
        foreach ($array->result_array() as $row) {
            $result['iduser']=$row['iduser'];
            $result['nom']=$row['nom'];
            $result['prenom']=$row['prenom'];
            $result['email']=$row['email'];
            $result['genre']=$row['genre'];
            $result['isadmin']=$row['isadmin'];
        }
        return $result;
    }
    public function getobjetbyid($idobjet = '')
    {
        $array=array();
        // select * from objet where idobjet=1;
        $this->db->where('idobjet',$idobjet);
        $array=$this->db->get('objet');
        $result=array();
        $i=0;
        foreach ($array->result_array() as $row) {
            // var_dump($row);
            $result[$i]['idobjet']=$row['idobjet'];
            $result[$i]['nom']=$row['nom'];
            $result[$i]['prix']=$row['prix'];
            $result[$i]['iduser']=$row['iduser'];
            $i++;
        }
        return $result;

    }
    public function getobjetbyuser($iduser = '')
    {
        //tokony join sary
        $array=array();
        $tab=array(
            'objet.nom','objet.idobjet','objet.prix','user.nom as username'
        );
        $this->db->select($tab);
        $this->db->join('user','objet.iduser=user.iduser');
        $this->db->where('objet.iduser',$iduser);
        $array=$this->db->get('objet');
        $result=array();
        $i=0;
        foreach ($array->result_array() as $row) {
            //  var_dump($row);
            $result[$i]['idobjet']=$row['idobjet'];
            $result[$i]['nom']=$row['nom'];
            $result[$i]['prix']=$row['prix'];
            $result[$i]['username']=$row['username'];
            $i++;
        }
        return $result;

    }

    public function getidbyusername($username = '') {
        $user=array();
        $this->db->where('nom',$username);
        $user=$this->db->get('user');
        
        $result=array();
        $i=0;
        foreach ($user->result_array() as $row) {
            $result[$i]['iduser']=$row['iduser'];
            $i++;
        }
        return $result;
    }
    public function insertdemande($arraydemande)
    {
        $this->db->insert('demande',$arraydemande);
        $this->db->get('demande');
    }
    public function insertechange($arrayechange)
    {
        $this->db->insert('echange',$arrayechange);
        $this->db->get('echange');
    }

    public function getdemandebyiddemande($iddemande){
        $this->db->where('iddemande',$iddemande);
        $array=$this->db->get('demande');

        $i=0;
        $result=array();
        foreach ($array->result_array() as $row) {
            $result[$i]['iddemande']=$row['iddemande'];
            $result[$i]['idmpangataka']=$row['idmpangataka'];
            $result[$i]['idangatahana']=$row['idangatahana'];
            $result[$i]['idobjmpangataka']=$row['idobjmpangataka'];
            $result[$i]['idobjangatahana']=$row['idobjangatahana'];
            $result[$i]['etatdemande']=$row['etatdemande'];
            $i++;
        }
        return $result;
    }

    public function selectdemande() {
        $array=array();
        $request=array(
            'objet.nom','objet.prix','user.nom as username',
        );
        $this->db->select($request);
        $this->db->join('user','demande.iduser=objet.iduser');
        $this->db->join('user','demande.iduser=objet.iduser');
    }
    public function listedemande(){
    //     select objet.nom,objet.prix,user.nom as username from objet
    // -> join demande on demande.idangatahana=objet.iduser
    // -> join user on user.iduser=objet.iduser
    // -> where demande.idobjangatahana=objet.idobjet;
        $selectdemande=array(
            'objet.nom','objet.prix','user.nom as username','demande.etatdemande','demande.iddemande'
        );
        $this->db->select($selectdemande);
        $this->db->join('demande','demande.idangatahana=objet.iduser');
        $this->db->join('user','user.iduser=objet.iduser');
        $this->db->where('demande.idobjangatahana=objet.idobjet');
        $demandes=$this->db->get('objet');
        // var_dump($demandes);
        $i=0;
        $result=array();
        foreach ($demandes->result_array() as $row) {
            $result[$i]['iddemande']=$row['iddemande'];
            $result[$i]['nomdemande']=$row['nom'];
            $result[$i]['prixdemande']=$row['prix'];
            $result[$i]['usernamedemande']=$row['username'];
            $result[$i]['etatdemande']=$row['etatdemande'];
            $i++;
        }

        // select objet.nom,objet.prix,user.nom as username from objet
        // -> join demande on demande.idmpangataka=objet.iduser
        // -> join user on demande.idmpangataka=user.iduser
        // -> where demande.idobjmpangataka=objet.idobjet;
        $selectproposition=array(
            'objet.nom','objet.prix','user.nom as username','demande.etatdemande','demande.iddemande','demande.datedemande'
        );
        $this->db->select($selectproposition);
        $this->db->join('demande','demande.idmpangataka=objet.iduser');
        $this->db->join('user','user.iduser=objet.iduser');
        $this->db->where('demande.idobjmpangataka=objet.idobjet');
        $propositions=$this->db->get('objet');
        $i=0;
        foreach ($propositions->result_array() as $row) {
            $result[$i]['iddemande']=$row['iddemande'];
            $result[$i]['dateproposition']=$row['datedemande'];
            $result[$i]['nomproposition']=$row['nom'];
            $result[$i]['prixproposition']=$row['prix'];
            $result[$i]['usernameproposition']=$row['username'];
            $result[$i]['etatdemande']=$row['etatdemande'];
            $i++;
        }
        // var_dump($result);
        return $result;
    }

    public function update($nomtable,$id,$nomcolonneid,$nomcolonne,$valeur)
    {
        $this->db->set($nomcolonne,$valeur);
        $this->db->where($nomcolonneid,$id);
        $this->db->update($nomtable);
    }

    public function idobjettophoto($id)
    {
        $this->db->select('path');
        $this->db->where('idobjet',$id);
        $photos=$this->db->get('photo');
        $result='';
        foreach ($photos->result_array() as $row) {
            $result=$row['path'];
        }
        return $result;

    }

    public function getallechange() {
        $echange=$this->db->get('echange');
        $result=array();
        $i=0;
        foreach ($echange->result_array() as $row) {
            $result[$i]['idechange']=$row['idechange'];
            $result[$i]['dateechange']=$row['dateechange'];
            $result[$i]['idproprio']=$row['idproprio'];
            $result[$i]['idobjet']=$row['idobjet'];
            $result[$i]['idnouveauproprio']=$row['idnouveauproprio'];
            $i++;
        }

        return $result;
    }

    public function historique() {
        // select objet.idobjet,objet.nom,objet.prix,user.iduser,user.nom as username,echange.dateechange from objet
        // -> join echange on echange.idproprio=objet.iduser
        // -> join user on echange.idproprio=user.iduser
        // -> where echange.idobjet=objet.idobjet;
        
        $this->load->model('Modelbdd');
        $selectancien=array(
            'objet.idobjet','objet.nom','objet.prix','user.iduser','user.nom as username','echange.dateechange'
        );
        $this->db->select($selectancien);
        $this->db->join('echange','echange.idproprio=objet.iduser');
        $this->db->join('user','echange.idproprio=user.iduser');
        $this->db->where('echange.idobjet=objet.idobjet;');
        $anciens=$this->db->get('objet');
        $i=0;
        $result=array();
        foreach ($anciens->result_array() as $row) {
            var_dump($row);
            // $result[$i]['lastidobjet']=$row['idobjet'];
            // $result[$i]['lastnom']=$row['nom'];
            // $result[$i]['lastprix']=$row['prix'];
            // $result[$i]['lastiduser']=$row['iduser'];
            // $result[$i]['lastusername']=$row['username'];
            // $result[$i]['lastdateechange']=$row['dateechange'];
            // $i++;
        }

        // $echange=$this->model->getallechange();
        // for ($i=0; $i<sizeof($echange); $i++) {
        //     $this->Modelbdd->update('objet',$echange[$i]['idobjet'],'idobjet','iduser',$echange[$i]['idnouveauproprio']);
        // }

        // $this->load->model('Modelbdd');
        // $selectnouveau=array(
        //     'objet.idobjet','objet.nom','objet.prix','user.iduser','user.nom as username','echange.dateechange'
        // );
        // $this->db->select($selectnouveau);
        // $this->db->join('echange','echange.idnouveauproprio=objet.iduser');
        // $this->db->join('user','echange.idnouveauproprio=user.iduser');
        // $this->db->where('echange.idobjet=objet.idobjet;');
        // $nouveaus=$this->db->get('objet');
        // $i=0;
        // foreach ($nouveaus->result_array() as $row) {
        //     $result[$i]['newidobjet']=$row['idobjet'];
        //     $result[$i]['newnom']=$row['nom'];
        //     $result[$i]['newprix']=$row['prix'];
        //     $result[$i]['newiduser']=$row['iduser'];
        //     $result[$i]['newusername']=$row['username'];
        //     $result[$i]['newdateechange']=$row['dateechange'];
        //     $i++;
        // }
        // var_dump($result);
        return $result;
    }
    
    public function sinscrire($tab)
    {
        $this->db->insert('user',$tab);
        $this->db->get('user');
        return 0;
    }

}

?>