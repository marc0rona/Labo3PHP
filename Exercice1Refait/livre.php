<?php
//class model d'un livre normal
class livre{
private string $nom;
private string $auteur;
private int $nombre_page;

function __construct(string $nom,string $auteur, int $page){
    $this -> setNom($nom);
    $this -> setAuteur($auteur);
    $this -> setPage($page);
}

//getter
function getNom(){
    return $this -> nom;
}
function getAuteur(){
    return $this -> auteur;
}
function getPage(){
    return $this -> nombre_page;
}
//setters
private function setNom($nom){
    if(!empty($nom)){
        $this->nom=$nom;
    }else{
        throw new Exception("Le nom du livre ne peux etre vide Nom: $nom.");
    }
}
private function setAuteur($auteur){
    if(!empty($auteur)){
        $this->auteur=$auteur;
    }else{
        throw new Exception("le nom de l'auteur ne peux etre vide Nom: $auteur.");
    }
}
private function setPage($page){
    if($page>0 && !empty($page)){
        $this->nombre_page=$page;
    }else{
        throw new Exception("le nombre de page doit etre au minimum un 1 page");
    }
}

}

?>