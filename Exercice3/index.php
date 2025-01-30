<?php

require "model/Produit.php";
require "model/Facture.php";
session_start();
//j'initialise se block simplement pour ne pas 
//le reinitialiser tous les fois que j'ajoute un produit a facture
if (!isset($_SESSION['stock'])) {
 
  $pommes = new Produit("pomme",1,800);
  $pommes->setSeuil(100);
  
  $patate = new Produit("patate",2,500);
  $patate->setSeuil(150);
 
  $pain   = new Produit("pain",3,450);
  $pain->setSeuil(400);

$_SESSION['stock']= [$pommes->getName() => [
    'prix' => $pommes->getPrix(),
    'qte' => $pommes->getQuantite(),
    'seuil' => $pommes->getSeuil()
],
$patate->getName() => [
    'prix' => $patate->getPrix(),
    'qte' => $patate->getQuantite(),
    'seuil' => $patate->getSeuil()
],
$pain->getName() => [
    'prix' => $pain->getPrix(),
    'qte' => $pain->getQuantite(),
    'seuil' => $pain->getSeuil()
]];
  
}
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 3 </title>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center; /* Centers text horizontally */
            vertical-align: middle; /* Centers text vertically */
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>
  <?php 
  echo "<h3>Inventaire</h3><br>";
  echo "<table><tr> 
        <th>Article</th>
        <th>quantite</th>
        <th>prix</th>
        <th>seuil</th>
        </tr>";
    foreach($_SESSION['stock'] as $produit_nom=>$produit_donne){
    echo"<tr>
    <th>".$produit_nom."</th>
    <th>".$produit_donne['qte']."</th>
    <th>".$produit_donne['prix']."</th>
    <th>".$produit_donne['seuil']."</th>
    <tr>";}
    echo"</table>";
    ?>  

<h3>Entrez votre commande</h3>
    <!-- ToDo : liste de quels produits on vend-->
    <form method="POST">
    

      <!--dropList des produits a vendre -->
    <label for="SelectedProd"> Choisissez un produit : </label> <br>

    <select name="SelectedProd" id="SelectedProd"> 
      <!-- loop a travers le product hash et recupere toute les produit disponible-->
    <?php
       foreach($_SESSION['stock'] as $produit_nom=>$produit_donne){
        echo"<option value=".$produit_nom." selected>".$produit_nom."</option> ";

      }?>
      </select> <br>
      <label for="quantite"> quantite : </label> <br>
      <input type="number" name="qte" id="qte" min="0" value="0"> </label> <br>
     
    <br>
    <!--submit button -->
    <button type="submit"> rajout au panier </button>
    </form><br>
      <form>
    <button type="submit"> confirmer la commande </button>
    </form>
</body>

</html> 

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  //assure que la facture est set
  if(!isset($_SESSION['facture'])){
    $facture=new Facture();
    //sauvegarder le state de la facture
    $_SESSION['facture']=serialize($facture);
  }
  //reinstaurer le state de la facture a la variable
  $facture=unserialize($_SESSION['facture']);


  //usage de reference afin de pouvoir modifier les donne de la session
  foreach($_SESSION['stock'] as $produit_nom=>&$produit_donne){
    if($produit_nom===$_POST['SelectedProd']){
      //rajouter le produit a la facture
      $facture->addProduit($produit_nom,$produit_donne['prix'], $_POST['qte']);

      //enlever le produit 
      $produit_donne['qte']-= $_POST['qte'];
      if($produit_donne['qte']<$produit_donne['seuil']){
        $produit_donne['qte']=1000;
      }
      $_SESSION['facture']=serialize($facture);
    }
  }
  echo "<h3>Facture</h3>";
  echo $facture->__toString();

  
}
?>