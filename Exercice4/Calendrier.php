<?php
var_dump($_POST); //pour voir données envoyés
//initialisationS
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
//plus simple a formater surtout quand il faut changer de mois
//strtotime = va chercher le mois dans le DEADLINE choisie (exemple : deadlien est pour fevrier = va au mois de 'Feb')
$month = isset($_POST['EndDate']) ? date('m', strtotime($_POST['EndDate'])) : date('m');  
  
function whatMonthIsIt(int $x){
    $month_map=[
            1 => "jan",
            2 => "feb", 
            3 => "mar",
            4 => "avr", 
            5 => "mai",
            6 => "jui", 
            7 => "jul",
            8 => "aout", 
            9 => "sep",
            10 => "oct",
            11 => "nov", 
            12 => "dec",   
    ];
            return $month_map[$x];
    }

    //maniere de savoir le 
    $date = new DateTime($year . "-" . $month . "-01");
    //savoir le moi commence quelle jours
    $dayoftheweek= (int)$date->format('N');
    //savoir le moi a combien de jours
    $jours_du_mois=(int)$date ->  format("t");

    //fonction pour naviguer les mois comme invarience 
    //ne peux jamais etre en dessous de 1 ou au dessous de 12
    function navigateMonth(int $x, $operation){
        if($operation=="-"){
            //reset la boucle si x==1
            if($x==1){return $x=12;}
            return --$x;}
        if($operation=="+"){
            //reset a 1 si la x = 12
            if($x==12){return $x=1;}
            return ++$x;}
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Exercice2</title>
<style>
    /* Pour Navigateurs */
    h2
    {
        margin-left: 75px;
        margin-right: 75px;
        font-family: sans-serif;
        font-size: 40px;
    }
    .flex-container
    {
        display: flex; /* Flexbox pour guarder dans une ligne */
        align-items: center; /* Pour bouttons */
        margin: auto;
        width: 50%;
        /* elements to center in Page */
        flex-direction: row; align-items: center; justify-content: center;
    }
    .LinkButton
    {
        display: inline-block;
        padding: 20px 30px;
        font-size: 18px;
        font-family: sans-serif;

        color: white;
        font-weight: bold;
        background-color: orange;
        text-decoration: none; /* on enleve la ligne */
        border-radius: 5px;
        cursor: pointer;
    }
    /*Pour Tableau */
    th
    {
        border:5px solid black;
        font-size: 28px;
        width: 14%;
    } 
    td
    {
        border: 5px solid black;
        height: 260px;
        vertical-align: top;
        text-align: left;
    }
    h4 
    {
        font-size: 18px;
        margin-left: 0;
        margin-top:  0;
    }
</style>
</head>

<body>
    <div class="flex-container"> <!--Guarder dans 1 ligne (flex)-->
        <a href="Calendrier.php?year=<?=$year-1?>&month=<?=$month?>" class="LinkButton" style="display: none;">
            Année précédente
        </a>
        <h2><?php echo $year; ?></h2>
        <a href="Calendrier.php?year=<?=$year+1?>&month=<?=$month?>" class="LinkButton">Année prochaine</a><br>
    </div>

    <div class="flex-container"> <!--Guarder dans 1 ligne (flex)-->
        <a href="Calendrier.php?year=<?=$year?>&month=<?=navigateMonth($month,"-")?>" class="LinkButton" style="background-color: blue;">Mois précédent</a>
        <h2><?php echo whatmonthIsIt($month); ?></h2>
        <a href="Calendrier.php?year=<?=$year?>&month=<?=navigateMonth($month,"+")?>" class="LinkButton" style="background-color: blue;">Mois suivant</a>
    </div>
                            <!--la table pour le calendrier -->
<?php
    echo "<table style=\"width:100%\">";
    echo "<tr><th>Lundi</th> <th>Mardi</th> <th>Mercredi</th> <th>Jeudi</th> <th>Vendredi</th> <th>Samedi</th> <th>Dimanche</th></tr>";
    echo "<tr>";
   for($days=1;$days<$jours_du_mois+$dayoftheweek;$days++)
   {
       //les deux if statement permetent de que se soit reflette
       echo"<td>";
       //si le jours de la semaine est = ou non a days ne include pas le script
       if ($dayoftheweek<=$days)
       {
        //mettre en gras les samedi et dimanche
       if($days%7==6||$days%7==0) { echo "<strong>"; }
       echo "<h4>Day : " . $days-$dayoftheweek+1 . "</h4>";
       if($days%7==6||$days%7==0){echo "</strong>";}
       }
       echo"</td>";
       if($days%7==0)
       {echo "</tr><tr>";}
   }
   echo "</tr>";
   echo "</table>";
?>
</body>
</html>