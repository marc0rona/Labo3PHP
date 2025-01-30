<?php

//user define type qui permet la location 
//qui assure que la location d'un livre suit une logique
class location{
    private $id;
    private $start_date;
    private $end_date;
    private $book_name;
    
    

    //setter

    //verifie si la date de emprunt est auj ou dans le futur
     private function setStartDate($date){
        $today=new DateTime('now');
        
        if($today->format('Y-m-d')<=$date){
            $this->start_date=$date;
        }else{
        throw new Exception("start date cant be before today.".$date."   today:".$today->format('Y-m-d'));}
    }

    //assure que la date de fin est apres la date de aujourd'hui
    private function setEndDate($date){
        if($this->start_date<$date) { $this->end_date=$date; }
        else{
        throw new Exception("end date cant be before start date.");}
    }
    //getters
    public function getStartDate(){
        return $this->start_date;
    }
    public function getEndDate(){
        return $this->end_date;
    }

    public function getId(){
        return $this->id;
    }
    public function getBook(){
        return $this->book_name;
    }

    //constructeur
    function __construct(int $id,string $start_date,string $end_date,string $book_name){
        $this->id=$id;
        $this->setStartDate($start_date);
        $this->setEndDate($end_date);
        $this->book_name=$book_name;
    }
}
?>