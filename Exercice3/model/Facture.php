<?php

class Facture{
    private array  $achat_list=[];

   function __construct(){
        
    }
    function addProduit(Produit $produit,int $qte){
        $name=$produit->getName();
        $prix=$produit->getPrix();
        if(isset($this->achat_list[$name])){

            $this->achat_list[$name]['qte']+=$qte;
        }else{
            $this->achat_list[$name]=['qte'=>$qte, 'prix'=>$prix,];
        }
    }

    function __toString(){
        $prix_total=0;
        $str="";
        foreach($this->achat_list as $names=>$detail){
            $str.="name: ".$names."<br>Quantite: ".$detail['qte'].
            "<br>prix unitaire: ".$detail['prix'];
            $prix_total+=$detail['qte']*$detail['prix'];

        }
        $str.="<br>Prix Total :". $prix_total;
        return $str;
    }
    

}
?>