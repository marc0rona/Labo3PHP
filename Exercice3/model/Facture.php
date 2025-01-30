<?php

class Facture{
    private array  $achat_list=[];

    function addProduit(String $name,int $prix ,int $qte){

        if(isset($this->achat_list[$name])){

            $this->achat_list[$name]['qte']+=$qte;
            
        }else{
            $this->achat_list[$name]=['qte'=>$qte, 'prix'=>$prix,];
            
        }
    }

    function __toString(){
        $prix_total=0;
        $str="<table> <tr><th>Nom de l'article</th>
        <th>prix unitaire</th>
        <th>Quantite acheter</th> </tr>";
        
        foreach($this->achat_list as $names=>$detail){
            $str.="<tr><td>".$names."</td><td> ".$detail['prix']."$</td>
            <td>".$detail['qte']."</td></tr>";
            $prix_total+=$detail['qte']*$detail['prix'];

        }
        $str.=" <tfoot><td>Prix Total :". $prix_total."</td></tfoot></table>";
        return $str;
    }
    

}
?>