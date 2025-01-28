<?php
class Produit{
    private String $nom;
    private int $prix;
    private int $quantite;//pour simplifier l'exercice
    private int $seuil;

    function __construct(String $nom,int $prix){
        $this->nom=$nom;
        $this->prix=$prix;
        $this->quantite=0;
        $this->seuil=0;
    }
    //getter
    function getName(){
        return $this->nom;
    }
    function getQuantite(){
        return $this->quantite;
    }
    function getSeuil(){
        return $this->seuil;
    }
    function addQuantite(int $val){
        $this->quantite+=$val;
    }
    function removeQuantite(int $val){
        $this->quantite-=$val;
    }
    function setSeuil(int $val){
        $this->seuil+=$val;
    }
        //magic methode permet de retourner le state de lobject
    function __toString(){
        return "name: " . $this->nom . "\nprix: " .  $this->prix . "\nquantite: " . $this->quantite . "\nseuil: " . $this->seuil;
    }

    
}
?>