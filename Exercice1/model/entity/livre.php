<?php


//enum de genre de livre 
//j'ai essayer de integrer un enum mais j'ai rencontrer des problemes
//afin de terminer et de poursuivre l'exercice j'ai delaisser le enum
// Enum Genre : string
// {
//     case fantastique=1;
//     case post_modern=2;
//     case anime=3;
//     case existentialism=4;
//     case romantique=5;

//     public static function getValue(string $str) : string
//     {
//         foreach(self::cases() as $genre )
//         {
//             if($str===$genre->name) 
//             //not 'key'. en php, c 'name'
//             { return $genre->value;}
//         }
//         throw new Exception("$str n'est pas un genre valide.");
//     }
// }
// Cette classe a pour but definir 
//un livre afin de assurer et enforcer une logique 
class Book{
    private $book_name;
    private $auteur_name;
    private $number_page;

    public function __construct(string $book_name,string $auteur_name,int $number_page)
    {
        $this->book_name=$book_name;
        $this->auteur_name=$auteur_name;
        $this->number_page=$number_page;
    }


    //getter
    public function getBookName(){return $this->book_name;}

    public function getAuteurName(){return $this->auteur_name;}

    public function getNumberPage(){return $this->number_page;}


}
?>