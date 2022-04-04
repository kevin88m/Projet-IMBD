<?php
include('connect.php');

$sql = "SELECT * FROM `films`LIMIT 1";

$query = $pdo->prepare($sql);

$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

$date = $result["Date_de_sortie"];
$date = date('d/m/Y', strtotime($date));


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
          <?php $film = $result
          ?>
          <tr>
            <td><?= $film["ID"] ?></td>
            <td><?= $film["Titre_film"] ?></td>
            <td><?= $film["Genre"] ?></td>
            <td><?= $film["Realisateur"] ?></td>
            <td><?= $film["Scenario"] ?></td>
            <td><?= $film["Casting"] ?></td>
            <td><?= $date ?></td>
          </tr>
          <?php

          ?>
        </tbody>

      </table>
    </div>


</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div>
          <div>
            <h2 class="pull-left">Détail des films</h2>
            <a href="add.php" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Ajouter un film</a>
          </div>
          <?php
          // Include connect file
          require_once "connect.php";

          // Attempt select query execution
          $sql = "SELECT * FROM films";
          if ($film = $pdo->query($sql)) {
            if ($film) {
              echo '<table class="table table-dark table-striped">';
              echo "<thead>";
              echo "<tr>";
              echo '<td>#</td>';
              echo "<th>Titre du film</th>";
              echo "<th>Genre</th>";
              echo "<th>Réalisateur</th>";
              echo "<th>Scénario</th>";
              echo "<th>Casting</th>";
              echo "<th>Date de sortie</th>";
              echo "<th>Date d'ajout</th>";
              echo "<th colspan=3>Action</th>";


              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              while ($row = $film->fetch()) {
                echo "<tr>";

                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Titre_film'] . "</td>";
                echo "<td>" . $row['Genre'] . "</td>";
                echo "<td>" . $row['Realisateur'] . "</td>";
                echo "<td>" . $row['Scenario'] . "</td>";
                echo "<td>" . $row['Casting'] . "</td>";
                echo "<td>" . $row['Date_de_sortie'] . "</td>";
                echo "<td>" . $row['Date_ajout'] . "</td>";

                echo '<td><a href="edit.php?id='. $row['ID'] .'" class="mr-1"  title="Modification" data-toggle="tooltip"><span class="fa fa-pencil"></span></a></td>';
                echo '<td><a href="read.php?id='. $row['ID'] .'" class="mr-1"  title="Lecture" data-toggle="tooltip"><span class="fa fa-eye"></span></a></td>';
                echo '<td><a href="delete.php?id='. $row['ID'] .'"class="mr-1" title="Supprimer" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>';
                

                echo "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
              // Free film set
              unset($film);
            } else {
              echo '<div class="alert alert-danger"><em>Pas d enregistrements trouvés.</em></div>';
            }
          } else {
            echo "Oops! Quelque chose ne va pas. S'il vous plaît réesayer plus tard.";
          }

          // Close connection
          unset($pdo);
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>