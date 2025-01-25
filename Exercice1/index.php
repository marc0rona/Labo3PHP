<?php
  //Fetch date d'auj. pour le mettre automatiquement dans le input quand la page se Load
  $currDate = date('Y-m-d');
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 1 </title>
</head>
<body>
<h2> BIBLIOTHÈQUE </h2>
  <form method="POST">
    <label for="titre">Entrez le titre du livre :</label>
    <input type="text" id="titre" name="titre" required>
    <br><br> <!--Input : date d'emprunt-->
    <label for="InitDate">Date d'emprunt : </label>
    <!-- value = auj. // minimum = 'auj' (ne peut pas choisir une date du passé) -->
    <input type="date" id="InitDate" name="InitDate" value="<?php echo $currDate;?>" min="<?php echo $currDate;?>"> 
    <br><br>
    <button type="submit"> Confirmation d'Emprunt </button>
  </form>
</body>
</html> 