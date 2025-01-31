<!--permet de prendre une location et l'emvoyer a gestion des ocation-->
<?php
require "model\\entity\location.php";
require "C:\Users\willd\OneDrive\Desktop\PHPProject\Labo3PHP\Exercice1\model\\entity\livre.php";

session_start();
$currDate=date('Y-m-d');
//initialiser une $_SESSION['book_list] afin de avec 3 
  if(!isset($arr_book)){
    //j'initialise toute une fois afin que le data ne se regenere pas
    
    $livre1 = new Book("the_book","Jim bob",450);
    $livre2 = new Book("amgis_eht_thaw","jordan peter",900);
    $livre3 = new Book("qqc","andrew",1200);

    //je mets la list des livres dans une session afin de pouvoir itere
                  $arr_book=[$livre1->getBookName(),
                            $livre2->getBookName(),
                            $livre3->getBookName(),];
  }
//requete post permet de faire ajouter
  if($_SERVER['REQUEST_METHOD']==='POST'){
    //pour cette exercice tu ne peux que avoir un livre par location 

    //creer la session location si elle n'existe toujours pas
    if(!isset($_SESSION['location'])){
      $_SESSION['location']=[];
    }

    //creation d'un counter
  if (!isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 0;
  }
  //incrementer le id
  $id=$_SESSION['counter']++;
    //initialisation des variables
    $start_date = $_POST['InitDate'];
    $end_date = $_POST['retDate'];
    $livre_louer = $_POST['titre'];

    //creation de l'objet location
    try{
    $location_creation = new location($id, $start_date, $end_date, $livre_louer);
    }catch(Exception $ex){
      echo $ex->getMessage();
    }

    $_SESSION['location'][] = ['id' => $location_creation -> getId(),
                               'EndDate' => $location_creation -> getEndDate(),
                               'book' => $location_creation -> getBook(),]; 
  }
?>

<!-- FRONT-END : HTML -->
<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Exercice 1 </title>
</head>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center; /* Centers text horizontally */
            vertical-align: middle; /* Centers text vertically */
        }

        th {
            font-weight: bold;
        }
    </style>
<body>
<h2> BIBLIOTHÈQUE </h2>
  <form  method="POST">
    <label for="titre">Entrez le titre du livre :</label><br>
    <select type="text" id="titre" name="titre" required>
      <?php
      foreach($arr_book as $book_name=>$book_data){
      echo"<option value=".$book_data." selected>".$book_data."</option> ";
      }?>
    </select>
    <br> 
    <!--Input : date d'emprunt-->
    <label for="InitDate">Date d'emprunt : </label><br>
    <!-- value = auj. // minimum = 'auj' (ne peut pas choisir une date du passé) -->
    <input type="date" id="InitDate" name="InitDate" value="<?php echo $currDate;?>" min="<?php echo $currDate;?>"> 
    <br>
    <label for="retDate">Date de retour : </label><br>
    <!-- value = auj. // minimum = 'auj' (ne peut pas choisir une date du passé) -->
    <input type="date" id="retDate" name="retDate" value="<?php echo $currDate;?>" min="<?php echo $currDate;?>"> 
    <br>


    <button type="submit"> Confirmation d'Emprunt </button>
  </form>


    <!--petit forme qui prends -->
  <h2> RETOUR </h2>
  <form action="retour.php" method="POST">
    <label for="id">Entrez le ID:</label><br>
    <input type="number" id="id" name="id" min=0> 
    <button type="submit"> Confirmation de retour </button>
  </form>

  <h2> livre louer </h2>
    <table>
      <tr><th>Id de location</th><th>livre louer</th><th>date de retour</th></tr>
      <?php
      foreach($_SESSION['location'] as $index=>$livre)
      echo"<tr>
      <td>".$livre['id']."</td>
      <td>".$livre['book']."</td>
      <td>".$livre['EndDate']."</td>
      </tr>"
      ?>

    </table>

</body>
</html> 
