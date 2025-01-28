<?php

class Stock implements NotificationObserver{
    private $produit_list=[];

    function addProduit(Produit $produit){
        if(isset($this->produit_list[$produit->getName()])){
            throw new Exception("le produit existe deja");
        }else{
            $this->produit_list[$produit->getName()]=$produit;
        }
    }
    function getStocklist(){
        return $this->produit_list;
    }
    function addQuantite(String $produit, int $val){
        $produit=$this->produit_list[$produit->getName()];
        $produit->addQuantite($val);
    }
    function removeQuantite(String $produit, int $val){
        $produit=$this->produit_list[$produit->getName()];
        $produit->removeQuantite($val);
    }

    

}

?>