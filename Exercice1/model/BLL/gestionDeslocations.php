<?php
//variable de location je pense qu'on doit  envoyer l'objet location
//seras plus simple a gerer
$location=$_POST['location'];

//https://stackoverflow.com/questions/40690131/create-xml-file-in-php-using-domdocument
$xml=new DOMDocument();
$xml->formatOutput=true;

$roots=$xml->createElement('location')
$xml->appendChild($roots);

$elements1 = $xml->createElement('id');
$elements1 -> nodeValue=$location->getId();
$roots->appendChild($elements1);

$elements2 = $xml->createElement('startDate');
$elements2 -> nodeValue=$location->getStartDate();
$roots->appendChild($elements2);

$elements3 = $xml->createElement('endDate');
$elements3 -> nodeValue=$location->getEndDate();
$roots->appendChild($elements3);
//append les livres dans la locations
$books=$location->getBooks()
foreach($books as $book){
    $elements4 = $xml->createElement('book');
    $roots->appendChild($elements4);


    $bookElement1 = $xml->createElement('name');
    $bookElement1=$books->getBookName();
    $elements4->appendChild($bookElement1);

    $bookElement2=$xml->createElement('genre');
    $bookElement2=$books->getBookName();
    $elements4->appendChild($bookElement2);

    $bookElement3=$xml->createElement('auteurName');
    $bookElement3=$books->getAuteurName();
    $elements4->appendChild($bookElement3);

    $bookElement4=$xml->createElement('numberPage');
    $bookElement4=$books->getNumberPage();
    $elements4->appendChild($bookElement4);
    
}


?>