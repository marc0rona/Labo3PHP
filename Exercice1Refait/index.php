<?php
require "livre.php";
require "location.php";
session_start();
$current_date=date('Y-m-d');



//initialisation d'un array avec des livres
if(!isset($list_livre)){
    try{
    $livre1 = new livre("Seigneur1","william",430);
    $livre2 = new livre("Seigneur2","william",430);
    $livre3 = new livre("Seigneur3","william",430);
    }catch(Exception $ex){
        echo "Caught exception: ".$ex->getMessage()."<br> Consequence: l'instance livre n'est pas initialiser";
    }

    $list_livre=[$livre1 -> getNom() => $livre1,
                 $livre2 -> getNom() => $livre2,
                 $livre3 -> getNom() => $livre3,];
}


if($_SERVER['REQUEST_METHOD']=="POST"){
    try{
        if(!isset($_SESSION['location'])){
            $_SESSION['location']=[];
        }
        
        
        //initialiser objet livre 
        $livre=$list_livre[$_POST['livre']];
       
        //initialiser objet location
        $location_livre = new location($_POST['Debut_location'],$_POST['fin_location'],$livre);
        
        //ouvrir une session pour retenir les locations
        $_SESSION['location'][]=$location_livre;
        echo "<pre>";
print_r($_SESSION['location']);
echo "</pre>";

    }
    catch(Exception $ex){
        echo "Caught exception: ".$ex->getMessage()."<br> Consequence: l'instance location n'est pas initialiser";
    }
}

?>
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
<h3>Location du livre</h3>
    <form method='POST'>
        <select for="livre_list" name="livre">
    <?php foreach($list_livre as $index=>$livre){
        echo "<option value=".$livre->getNom().">".$livre->getNom()."</option>";
    } ?>
    </select>
    <br>
        <label name="Debut_location">location date initial</label><br>
        <input type="date" name="Debut_location" value="<?= $current_date?>"min="<?= $current_date?>"/><br>

        <label  name="fin_location">location date final</label><br>
        <input type="date" name="fin_location"min="<?= $current_date?>"/><br>
        
        <button type="submit">submit</button>
    </form> 
    <h3>retour</h3>
        <form action="retour.php" method="POST" > 
            <label name="retour_id">location date initial</label><br>
            <input type="text" name="retour_id"/><br>
            <button type="submit">submit</button>
        </form> 

    <h3>list des locations</h3>
    <table>
        <tr><th>id de la location</th> <th>Nom du livre</th><th>Nom de l'auteur</th>
        <th>Nombre de page</th><th>date de debut </th><th>date de fin</th> </tr>
    <?php 
    if(isset($_SESSION['location'])){
        foreach($_SESSION['location'] as $index=>$location){
             echo "<tr>
             <td>".$location->getId()."</td>
             <td>".$location->getLivre()->getNom()."</td>
             <td>".$location->getLivre()->getAuteur()."</td>
             <td>".$location->getLivre()->getPage()."</td>
             <td>".$location->getStart()."</td>
             <td>".$location->getEnd()."</td>
             </tr>";
        } 
    }
    ?> 
    </table> 