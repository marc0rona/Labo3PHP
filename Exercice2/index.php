<?php
  echo "Maing Page";
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 2 </title>
</head>
<body>
<h2> CALCUL DE SALAIRE </h2>
  <form method="POST">
    <label for="initSalary">Salaire de base : </label>
    <input type="number" id="initSalary" name="initSalary" required> 
    <br><br> <!--Input : heures suppl-->
    <label for="hoursXtra">Heures supplementaires : </label>
    <input type="number" id="hoursXtra" name="hoursXtra" style="width: 110px;" required> 
    <br><br> <!--Input : heures absences-->
    <label for="hoursAbscence">Heures supplementaires : </label>
    <input type="number" id="hoursAbscence" name="hoursAbscence" style="width: 110px;" equired> 
    <br><br>
    <button type="submit"> Confirmation d'Emprunt </button>
  </form>
</body>
</html> 