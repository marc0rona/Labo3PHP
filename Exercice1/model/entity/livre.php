<?php
// Cette classe a pour but definir un livre elle seras utilise pour faciliter la location 

//enum de genre de livre 
Enum Genre : int
{
    case fantastique=1;
    case post_modern=2;
    case anime=3;
    case existentialism=4;
    case romantique=5;

    public static function getValue(string $str){
        foreach(self::cases() as $genre ){
            if($str===$genre->key){
                return $genre->value;
            }
        }
        throw new Exception("$str n'est pas un genre valide.");
    }
}



class Book{
    private $book_name;
    private Genre $genre;
    private $auteur_name;
    private $number_page;

    public function __construct(string $book_name, string $genre, string $auteur_name,string $number_page)
    {
        $this->book_name=$book_name;
        $this->genre=Genre::getValue($genre);
        $this->auteur_name=$auteur_name;
        $this->number_page=$number_page;
    }


    //getter
    public function getBookName(){return $this->book_name;}

    public function getBookType(){return $this->genre;}

    public function getAuteurName(){return $this->auteur_name;}

    public function getNumberPage(){return $this->number_page;}

    //tostring
}
?>