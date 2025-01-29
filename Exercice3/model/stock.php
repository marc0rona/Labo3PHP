<?php
class Stock {
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
   

    

}

?>