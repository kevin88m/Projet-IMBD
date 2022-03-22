<?php
include('connect.php');

$sql="SELECT * FROM `films`LIMIT 1";

$query = $pdo->prepare($sql);

$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

$date= $result["Date_de_sortie"];
$date = date('d/m/Y',strtotime($date));


?>

<?php
include('connect.php');

$sql="SELECT * FROM `films`";
$modfilm = $pdo->prepare($sql);

$modfilm->execute();

$res = $modfilm->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

  <title>CRUD & affichage</title>
</head>

<body>

  <div class="card">
    <div class="card-header">

      <img src="image/imdb-logo-AF81176825-seeklogo.com.jpg" height="135" width="135">


    </div>
    <div class="card-body">
      <h5 class="card-title">Guide du film</h5>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre du film</th>
            <th scope="col">Genre</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Scénario</th>
            <th scope="col">Casting</th>
            <th scope="col">Date de sortie</th>


          </tr>
        </thead>
        <tbody>
          <?php  $film=$result
          ?>
          <tr>
            <td><?= $film["ID"] ?></td>
            <td><?= $film["Titre_film"] ?></td>
            <td><?= $film["Genre"] ?></td>
            <td><?= $film["Realisateur"] ?></td>
            <td><?= $film["Scenario"] ?></td>
            <td><?= $film["Casting"] ?></td>
            <td><?= $date?></td>
          </tr>
          <?php
          
          ?>
        </tbody>

      </table>
    </div>
    <div class="card-body">
      <h5 class="card-title">Ajouter/Modifier/Supprimer film</h5>
      <table class="table table-dark table-striped">
        <thead>
          <a href="add.php"  class="btn btn-secondary">Ajouter un film</a>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre du film</th>
            <th scope="col">Genre</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Scénario</th>
            <th scope="col">Casting</th>
            <th scope="col">Date de sortie</th>
            <th class="float-right">Actions</th>

          </tr>
        </thead>
        <tbody>
        <?php  
        foreach($res as $modfilm) : ?>
          
         
          <tr>
            <td><?= $modfilm["ID"] ?></td>
            <td><?= $modfilm["Titre_film"] ?></td>
            <td><?= $modfilm["Genre"] ?></td>
            <td><?= $modfilm["Realisateur"] ?></td>
            <td><?= $modfilm["Scenario"] ?></td>
            <td><?= $modfilm["Casting"] ?></td>
            <td><?= $modfilm["Date_de_sortie"]?></td>
          


          <td class="float-right">
               <input type="button" class="btn btn-warning" value="modifier">
               <input type="button"class="btn btn-info" value="supprimer">
             </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
          
          

             
        

      </table>

      
    </div>
  </div>
  
</body>

</html>