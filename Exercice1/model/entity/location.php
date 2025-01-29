<?php
require "livre.php";
//user define type qui permet la location de plusieurs livre,
class location{
    private $id;
    private $start_date;
    private $end_date;
    private Book $books=[];
    //constructeur
    function __construct(DateTime $start_date,DateTime $end_date){
        setStartDate($start_date);
        setEndDate($end_date);
    }

    //setter
    private function setStartDate($date){
        $today=new DateTime('now');
        if($today<=$date){
            $this->start_date=$date;
        }
        throw new Exception("start date cant be before today.");
    }
    private function setEndDate($date){
        if($this->start_date<$date) { $this->end_date=$date; }
        throw new Exception("end date cant be before start date.");
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
    public function getBooks(){
        return $this->books;
    }
}

?>