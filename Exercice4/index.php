<?php
   //Fetch date d'auj. pour le mettre automatiquement dans le input quand la page se Load
   $currDate = date('Y-m-d');
   $startDate = $_POST['InitDate'] ?? $currDate;
   $endDate = $_POST['EndDate'] ?? $currDate;
   
  session_start();
  $errors[] = ""; //pour msgs d'erreurs

   //Validation qui assure que la date final != date initiale
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
    //Que le Deadline != la date Initiale
      if ($endDate == $startDate || $endDate == "") 
      { $errors[] = "Le deadline ne peut pas etre pareil que la date Initiale"; }

     
     if (empty($errors)) 
     {
      //Pour que header fonctionne, ne doit pas gerer aucunes données avant l'utiliser
      header("Location: Calendrier.php"); // Redirect a Calendrier.php
      exit();
     } 
     else {
      // S'il y a des erreurs, afficher les Erreurs
      foreach ($errors as $error) {  echo "<p style='color: red;'>$error</p>";  }
      }
   }
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 4 </title>
</head>
<a>
<h2> Entrez une tâche : </h2>
  <form action="Calendrier.php" method="POST">
    <label for="titre">Entrez le nom de la tache :</label>
    <input type="text" id="titre" name="titre" required>
    <br><br> <!--Input : date d'emprunt-->
    <label for="InitDate">Date Initiale : </label>
    <!-- value = auj. // minimum = 'auj' (ne peut pas choisir une date du passé) -->
    <input type="date" id="InitDate" name="InitDate" value="<?php echo $currDate;?>" min="<?php echo $currDate;?>"> 
    <br><br>
    <label for="EndDate" style="color: red;">Deadline : </label>
    <input type="date" id="EndDate" name="EndDate" min="<?php echo $currDate;?>"> 
    <br><br>
    <button type="submit"> Ajout de tâche </button>
  </form> <br>
  <!--href qui va au Calendrier. (renvoy l'annee courante + mois courrante)-->
  <a href="Calendrier.php?year=<?=date('Y', strtotime($currDate))?>&month=<?=date('m', strtotime($currDate))?>">
    <button>Voir Calendrier de tâches</button>
  </a>
</body>
</html> 
