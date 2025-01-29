<?php

require "model/GestionStock.php";
require "model/Produit.php";
require "model/stock.php";
require "model/Facture.php";
session_start();
//j'initialise se block simplement pour ne pas 
//le reinitialiser tous les fois que j'ajoute un produit a facture
if (!isset($_SESSION['stock'])) {
  $stock = new Stock();
  $gestion_stock = new GestionStock($stock);
 
  $pommes = new Produit("pomme",1);
  $pommes->setSeuil(100);
  $pommes->addQuantite(500);
  $pommes->setObserver($gestion_stock);

  $patate = new Produit("patate",2);
  $patate->setSeuil(150);
  $patate->addQuantite(750);
  $patate->setObserver($gestion_stock);

  $pain   = new Produit("pain",3);
  $pain->setSeuil(400);
  $pain->addQuantite(450);
  $pain->setObserver($gestion_stock);

  $stock->addProduit($pommes);
  $stock->addProduit($patate);
  $stock->addProduit($pain);
  $_SESSION['stock']=serialize($stock);
  
}else{
 $stock=unserialize($_SESSION['stock']);

 //perds ses references quand il est unserialized donc doit la reajouter
 $gestion_stock = new GestionStock($stock); 
 foreach ($stock->getStocklist() as $product) {
     $product->setObserver($gestion_stock); 
 }
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!isset($_SESSION['facture'])){
    $facture=new Facture();
    $_SESSION['facture']=serialize($facture);
  }
  $facture=unserialize($_SESSION['facture']);

  


  foreach($stock->getStockList() as $product){
    if($product->getName()===$_POST['SelectedProd']){
      $facture->addProduit($product,$_POST['qte']);
      $product->removeQuantite($_POST['qte']);
    }
  }

  echo $facture->__toString();
}
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 3 </title>
</head>
<body>
<h3>Entrez votre commande</h3>
    <!-- ToDo : liste de quels produits on vend-->
    <form method="POST">
    

      <!--dropList des produits a vendre -->
    <label for="SelectedProd"> Choisissez un produit : </label> <br>

    <select name="SelectedProd" id="SelectedProd"> 
      <!-- loop a travers le product hash et recupere toute les produit disponible-->
    <?php
       foreach($stock->getStocklist() as $product){
        echo"<option value=".$product->getName()." selected>".$product->getName()."</option> ";

      }?>
      </select> <br>
      <label for="quantite"> quantite : </label> <br>
      <input type="number" name="qte" id="qte" min="0"> </label> <br>
     
    <br><br>
    <!--submit button -->
    <button type="submit"> rajout au panier </button>
    </form>
      <form>
    <button type="submit"> confirmer la commande </button>
    </form>
</body>
</html> 