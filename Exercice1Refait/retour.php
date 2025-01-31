<?php
require_once 'Location.php'; 
require_once 'livre.php';
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
//binary search
//initialisation des variables
    $current_id=$_POST['retour_id'];
    $debut=0;
    $fin=(count($_SESSION['location'])-1);
    
    while($debut<=$fin){
        $center=floor(($debut+$fin)/2);

        if($_SESSION['location'][$center]->getId()>$current_id){
            $fin=$center-1;
        } elseif($_SESSION['location'][$center]->getId()<$current_id) {
            $debut=$center+1;          
        } else {
            
            //initialiser les variables necessaire
            $_SESSION['location'][$center]->getId();
            $livre=$_SESSION['location'][$center]->getLivre();
            $date_retour= $_SESSION['location'][$center]->getEnd();
            $auj=date('Y-m-d');
            
            if(strtotime($auj)-strtotime($date_retour)>0){
                echo "Vous ete en retard!!! SVP donner le montant : ".
                (strtotime(date('Y-m-d'))-strtotime($date_retour)/(60*60*24))."$";
            }else{
                echo "Merci d'avoir remis le livre ".$livre->getNom()." dans les delais.<br>";
                
            }
            unset($_SESSION['location'][$center]);
            break;
        }
    }   
}
?>