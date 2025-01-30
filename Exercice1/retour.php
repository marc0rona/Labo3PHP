<!--
1- Recherche une location a partir d'un binary search
2- Compare sa date de retour et charge le montant approprie
3- enleve de la liste de location
-->
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){

$id_livre_retour=$_POST['id'];
//1- un binary search es tune recharche avec un pivot la list doit etre ordonne
//initialisation du centre de la liste
    $debut=0;
    $fin=count($_SESSION['location'])-1;
    while($debut<=$fin){
    //la fonction floor prends un espace et redonne la plus petite valeur 
    //entiere possible a l'interieur de cette espace
        $center=floor(($debut+$fin)/2);
        
        if($_SESSION['location'][$center]['id']<$id_livre_retour){
            $debut=$center+1;
        }
        else if($_SESSION['location'][$center]['id']>$id_livre_retour){
            $fin=$center-1;
        }
        else{
            //une fois trouver
           $id=$_SESSION['location'][$center]['id'];
           $end_date=$_SESSION['location'][$center]['EndDate'];
           $book=$_SESSION['location'][$center]['book'];
            $today=date('now');

            //enleve le id
            unset($_SESSION['location'][$center]);
            //1$ par jours de frais de retard
            if(strtotime($today)-strtotime($end_date)>0){
                echo "Des frais de".strtotime($today) - strtotime($end_date) / (60 * 60 * 24)."$ s'applique";
            }else{
                echo "Merci d'avoir retourner le livre ".$book." la location ".$id;
            }
            break; 

        }
    }
}
?>