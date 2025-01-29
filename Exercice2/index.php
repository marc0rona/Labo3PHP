

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
    <label for="initSalary">Salaire de base : </label><br>
    <input type="number" id="initSalary" name="initSalary" min=0 required> 
    <br><br> <!--Input : heures suppl  je pense que heure supplementaire c'est plus les heures
                 apres quil fassent 8 heures-->
    <label for="hours">Heures : </label><br>
    <input type="number" id="hours" name="hours" min=0  style="width: 110px;" required>
    <br><br>

    <label for="hoursXtra">Heures supplementaire : </label><br>
    <input type="number" id="hoursXtra" name="hoursXtra" min=0 max=24 style="width: 110px;" required>  
    <br><br> <!--Input : heures absences c des jours d'absence je crois-->

    <label for="daysAbsent">jours absent : </label><br>
    <input type="number" id="daysAbsent" name="daysAbsent"min=0 max=7 style="width: 110px;" equired> 
    <br><br>

    <button type="submit"> Confirmation d'Emprunt </button>
  </form>
  
</body>
</html>
<?php
 //version plate efficace et facile
 function facile(int $revenu_net,int $max, ){
  while($max!=0){
    $tableau[]=$revenu_net;
    $calcul=$revenu_net*=1.05;
    printf("revenu net: %20.2f <br>", $calcul) ;
    $max--;
  }
 }


  if($_SERVER['REQUEST_METHOD']=='POST'){
    //trouver salaire net tranche dimpot imposition officielle ci dessous
   // https://www.revenuquebec.ca/fr/citoyens/declaration-de-revenus/produire-votre-declaration-de-revenus/taux-dimposition/
   
    $salaire=$_POST['initSalary'];
    $heure=$_POST['hours'];
    $heure_supplementaire=$_POST['hoursXtra'];
    $jour_absent=$_POST['daysAbsent'];

    $revenu_brut=(($salaire*$heure)+ (($salaire * 1.5)*$heure_supplementaire))*52 ;
    printf("revenu brut %20.2f :<br>", $revenu_brut);
   


    //doit etre des string sinon elle cast en int avant de le cast en string naturellement
    $tranche=[
      "0.14" => 53255,
      "0.19" => 53240,
      "0.24" => 23095,
      "0.2575" => PHP_INT_MAX,
   ];
    $i=0;
    $revenu_net=0;
  
    foreach ($tranche as $taux => $limite) {
      echo "$taux <br>\n";
      echo $limite."<br>\n";
      if ($revenu_brut > $limite) {
          $revenu_net += $limite * $taux;
          $revenu_brut -= $limite;
      } else {
          $revenu_net += $revenu_brut * (1-$taux);
          $revenu_brut=0;
          break; 
      }
    }
  echo "revenue net: $revenu_net<br>";
  

  echo "_________________________________________<br>";
  facile($revenu_net,10);
  }
?>