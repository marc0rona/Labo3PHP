<!--prends un objet location et analyse les retards afectent 1$ par jours par livre en retard-->
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $today=new DateTime('now');
    //prendre les locations et le mettre dans un string
    $str=file_get_contents('location.xml');
    $number_of_books;
    $end_date;
    
    //https://www.php.net/manual/en/class.domdocument.php
    //https://www.php.net/manual/en/domdocument.getelementsbytagname.php
    $xmlWriterReader= new DOMDocument();
    $xmlWriterReader->loadXML($str);
    //creer des xmls object
    $locationXML=$xmlWriterReader->getElementsByTagName('location');


    //faut tester ca je ne sais pas si cest bon engros cherche le id mis dans le formulaire retour
    //et cherche le end date et le nombre de livre louer (1$ par livre par jour de retard)
    foreach($locationXML as $location_objects){
        $id=$location_object->getElementsByTagName('id');
        if((int)$id->textContent===$_POST['id'])
        {
            $end_date=$location_object->getElementsByTagName('ednDate');
            $number_of_books=$location_object->getElementsByTagName('book')->length;
        }
    }
    //retourne le temps en seconde
    $jours_de_retard=strtotime($today)-strtotime($end_date);
    //24*60*60=86400
    if($jours_de_retard>0)
    {
        $prix=($jours_de_retard/86400)*$number_of_books;
        echo"vous devez verser $prix $";
    }  
    else {echo "livre remis dans les delais bonne journee. :)";} 
    
}
?>