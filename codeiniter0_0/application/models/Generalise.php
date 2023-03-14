<?php
 if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Generalise extends CI_Model{
    public function getAllcategory() {
        $categories = array();
        $categories = $this->db->get('categorie');
        $result=array();
        $i=0;
        foreach ($categories->result_array() as $row) {
            $result[$i]['idcategorie']=$row['idcategorie'];
            $result[$i]['nom']=$row['nom'];
            $i++;
        }

        return $result;
    }

    public function getobjectbycategorie($idcategory) {
        // select objet.nom,objet.prix,user.nom as username from objetcategorie join objet on objetcategorie.idobjet=objet.idobjet join user on objet.iduser=user.iduser where objetcategorie.idcategorie=1;
        //tokony join sary
        $tab=array(
            'objet.idobjet','objet.nom','objet.prix','user.nom as username'
        );
        $this->db->select($tab);
        $this->db->join('objet','objetcategorie.idobjet=objet.idobjet');
        $this->db->join('user','objet.iduser=user.iduser');
        $this->db->where('objetcategorie.idcategorie',$idcategory);
        $objects = $this->db->get('objetcategorie');
        $result=array();
        $i=0;
        foreach ($objects->result_array() as $row) {
            $result[$i]['idobjet']=$row['idobjet'];
            $result[$i]['nom']=$row['nom'];
            $result[$i]['prix']=$row['prix'];
            $result[$i]['username']=$row['username'];
            $i++;
        }

        return $result;
    }

}
?>