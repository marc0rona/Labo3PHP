<?php

class Produit{
    private String $nom;
    private int $prix;
    private int $quantite;//pour simplifier l'exercice
    private int $seuil;
    private $observer;
    function __construct(String $nom,int $prix,int $qte){
        $this->nom=$nom;
        $this->prix=$prix;
        $this->quantite=$qte;
        $this->seuil=0;
    }
    //setters
    function setObserver(NotificationObserver $observer){
        $this->observer=$observer;
    }
    function setSeuil(int $val){
        $this->seuil+=$val;
    }
    //getters
    function getName(){
        return $this->nom;
    }
    function getQuantite(){
        return $this->quantite;
    }
    function getSeuil(){
        return $this->seuil;
    }
    function getPrix(){
        return $this->prix;
    }
    
        //magic methode permet de retourner le state de lobject
    function __toString(){
        return "name: " . $this->nom . "\nprix: " .  $this->prix . "\nquantite: " . $this->quantite . "\nseuil: " . $this->seuil;
    }

    
}
?>