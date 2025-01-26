<?php
  echo "Page index";
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
    <label for="SelectedProd"> Choisissez un produit : </label> 
    <select name="SelectedProd" id="SelectedProd">  
      <option value="patate" selected> Patates </option>  
      <option value="pomme"> Pommes </option>  
      <option value="pain"> Pain </option>  
    </select>  
    <br><br>
    <!--submit button -->
    <button type="submit"> Confirmation Commande </button>
    </form>
</body>
</html> 