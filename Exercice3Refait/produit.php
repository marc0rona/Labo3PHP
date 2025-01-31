<?php
class produit{
private string $nom;
private int $prix;
private int $qte;
private int $seuil;

function __construct($str, $prix, $qte, $seuil){
    $this -> setNom($str);
    $this -> setPrix($prix);
    $this -> setQte($qte);
    $this -> setSeuil($seuil);
}
//function fonctionnel
function addQte($val){
    $this-> qte+=$val;
}
function subQte($val){
    $this-> qte-=$val;
    if($this -> qte< $this -> seuil){
        $this -> addQte($this -> seuil);
        echo "Alert qte sous le seuil systeme rajoute 700 unite";
    }
}
//getters
function getNom(){
    return $this -> nom;
}
function getPrix(){
    return $this -> prix;
}
function getQte(){
    return $this -> qte;
}
function getSeuil(){
    return $this -> seuil;
}

//setter
private function setNom($str){
    if(isset($str) && !empty($str)){
        $this -> nom = $str;
    } else {
        throw new Exception("le nom est invalide.");
    }
}
private function setPrix($val){
    if(isset($val) && !empty($val) && $val>0){
        $this -> prix = $val;
    } else {
        throw new Exception("valeur de prix ne peux pas etre nul.");
    }
}
private function setQte($val){
    if(isset($val) && !empty($val) && $val>0){
        $this -> qte = $val;
    } else {
        throw new Exception("valeur de qte ne peux pas etre nul.");
    }
}
private function setSeuil($val){
    if(isset($val) && !empty($val)){
        $this -> seuil = $val;
    } else {
        throw new Exception("valeur de seuil ne peux pas etre nul.");
    }
}
}
?>