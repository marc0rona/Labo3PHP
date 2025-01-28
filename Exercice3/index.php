<?php
require "model/Produit.php";
require "model/stock.php";
  $pommes = new Produit("pomme",1);
  
  
  $pommes->setSeuil(100);
  $pommes->addQuantite(500);

  $patate = new Produit("patate",2);
  $patate->setSeuil(150);
  $patate->addQuantite(750);

  $pain   = new Produit("pain",3);
  $pain->setSeuil(400);
  $pain->addQuantite(450);

  $stock = new Stock();
  $stock->addProduit($pommes);
  $stock->addProduit($patate);
  $stock->addProduit($pain);


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
</body>
</html> 