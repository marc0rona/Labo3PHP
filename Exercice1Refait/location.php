<?php
require_once "livre.php";
class location{
    private string $start;
    private string $end;
    private int $id;
    private $livre;
   
        function __construct(string $start, string $end, livre $livre){
            //set un counter pour auto-incrementer le id
            if(!isset($_SESSION['counter'])){
                $_SESSION['counter'] = 1;
            }
        $this -> id=$_SESSION['counter']++;
        $this -> setStart($start);
        $this -> setEnd($end);
        $this -> setLivre($livre);
        }
    
   
    //getters
    function getStart(){
        return $this -> start;
    }
    function getEnd(){
        return $this -> end;
    }
    function getLivre(){
        return $this -> livre;
    }
    function getId(){
        return $this->id;
    }
    //setters
    //besoin de verifier que la date de depart est superieur a auj
    private function setStart($start){
        $auj = date('Y-m-d');
     if($auj <= $start && !empty($start) && isset($start)){
        $this -> start = $start;
     }
     else{
        throw new Exception("la date de location ne peux etre inferieur a auj.-->
                            auj: $auj | start: $start");
     }

    }
    
    //besoin de sassurer que la date de fin est apres la date de depart
    function setEnd($end){
        if($this -> start <= $end && !empty($end)&& isset($end)){
            $this -> end = $end;
        }else{
            throw new Exception("la date de fin de location ne peux etre inferieur a la date de debut.-->
                                 start:".$this -> start." | end: $end");
         }
    }

    function setLivre($livre){
        if(!empty($livre)){
            $this -> livre=$livre;
        }else{
            throw new Exception("le livre fourni a la location n'a pas ete instanciee.");
        }
    }



}


?>