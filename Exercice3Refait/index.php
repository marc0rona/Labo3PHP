<?php
require "produit.php";
session_start();
if(!isset($_SESSION['produit_list'])){
    //important de mettre dans la session ou dans un fichier 
    //car l'etat du produit doit pouvoir etre modifier
    $_SESSION['produit_list']=[];
    try{
        $produit1= new produit('pomme',1,1000,700);
        $produit2= new produit('patate',2,1000,700);
        $produit3= new produit('pain',3,1000,700);
    } 
    catch(Exception $ex){
        echo "Caught exception: ".$ex->getMessage();
    } 
    $_SESSION['produit_list']=[ $produit1,
                                $produit2,
                                $produit3,];
                                
                                
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    //trouver l'article selectionner
    foreach($_SESSION['produit_list'] as $index=>$produit){
        if($produit->getNom()==$_POST['produit']){
           $produit->subQte($_POST['qte']);
           $_SESSION['produit_list'][$index]=$produit;
        }
    } 




                                echo "<pre>";
                                print_r($_SESSION['produit_list']);
                                echo "</pre>";
}
?>
    <h3>Acheter</h3>
    <form method="POST">
    <label for="qte" name="qte">article: </label><br>
        <select for="produit" name="produit" >
            <?php foreach($_SESSION['produit_list'] as $index => $produit){
                echo "<option value=".$produit->getNom().">".$produit->getNom()."</option>";
                }?>
        </select><br>
        <label for="qte" name="qte">qte:</label><br>
        <input type="number" min=0 value=0 name="qte"/><br>
        <button type="submit">submit</button>
    </form>

