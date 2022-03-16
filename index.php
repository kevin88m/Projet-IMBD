<?php

include('connect.php');




if (isset($_POST['btnClear'])) {
}


$sql = "SELECT Titre_film,Genre,Casting,ID,Date_ajout FROM films ";
$params = array();



if (isset($_POST['filter'])) {

  $filter = trim($_POST['filter']);
  $sql .= "WHERE Titre_film  LIKE ? OR Genre LIKE ? OR Casting LIKE ? OR Date_ajout LIKE ?";
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
} else {
  if (isset($_SESSION['filter']) && strlen($_SESSION['filter']) > 0) {
  }
}



if (isset($_POST['order'])){
$order =$_POST['order'];
}else{
  $order="DESC";
}

$sql="SELECT * FROM films ORDER BY Titre_film $order";
$prepared = $pdo->prepare($sql);
$prepared->execute($params);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <title>IMDB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">

      <ul class="nav navbar-nav">
        <li class=active>

          <img src="image/imdb-logo-AF81176825-seeklogo.com.jpg" height=55 width=55>
        </li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        </li>

      </ul>
    </div>
  </nav>

  <form action="" method="POST">
    <div class="row">
      <div class="col-sm-4">
        <div class="input-group ml-5">
          <select name="order" class="form-control">

            <option name="">--Selection option</option>

            <option value="DESC" >
              (Ordre Décroissant)</option>

            <option value="ASC" >
              (Ordre croissant)</option>

          </select>

          <button type="submit" class="input-group-text" id="basic-addon2">Filtrage</button>
        </div>

      </div>
    </div>
  </form>

  

  



  <h3>LISTE DES FILMS

    <form class="filterForm" method="POST" action="">
      <input type="text" id="filter" name="filter" autofocus="true" placeholder="filtrer les recherches" />
      <input type="submit" name="btnFilter" id="btnFilter" value="entrer" />
      <input type="submit" name="btnClear" id="btnClear" value="retirer" />

    </form>


  </h3>
  </div>
  <?php
  if ($prepared->rowCount() > 0) {




    echo '<table  width="70% cellpadding=" 5" cellspace="5" >';
    echo '<tr>';
    echo '<th class="Titre_film"><a href="index.php?sort=Titre_film">Film</a></th>';
    echo '<th class="Genre"><a href="index.php?sort=Genre">Genre</a></th>';
    echo '<th class="Casting"><a href="index.php?sort=Casting">Acteurs principaux</a></th>';
    echo '<th class="Date_ajout"><a href="index.php?sort=Date_ajout">Date_ajout</a></th>';

    echo '</tr>';

      $prepared->setFetchMode(PDO::FETCH_ASSOC);
      while ($row = $prepared->fetch()) {
        echo '<tr data-ref="' . $row['ID'] . '">';
        echo '<td>' . $row['Titre_film'] . '</td>';
        echo '<td>' . $row['Genre'] . '</td>';
        echo '<td>' . $row['Casting'] . '</td>';
        echo '<td>' . $row['Date_ajout'] . '</td>';

    }
    echo '</table>';
  } else {
    echo '<p>Pas de films actuellement disponible.<p>';
  }

  ?>





</body>

</html>