<?php
require_once __DIR__ . "/../interface/NotificationAlert.php";
class GestionStock implements NotificationObserver{

    function LowStockAlert($produit){
        $produit_besoin=($produit->getSeuil()*2)-$produit->getQuantite();
        $produit->addStockQuantite($produit->getName(),$produit_besoin);
    }
    // function bufferBuyProduct(){
            //implimentation plustard on a pas toute une vie pour terminer les projets
            //techniquement un ajout n'est pas un achat mais devrait etre pris en consideration
            //
    // }

}
?>