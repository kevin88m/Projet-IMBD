<?php

include('connect.php');

$count = $pdo->prepare("select count(ID) as cpt from films");
$count->setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount = $count->fetchAll();

@$page = $_GET['page'];
if ($page < 1) {
  $page = 1;
}

$nbr_elements_par_page = 10;
$nbr_de_pages = ceil($tcount[0]["cpt"] / $nbr_elements_par_page);
$debut = ($page - 1) * $nbr_elements_par_page;

if (isset($_POST['order'])) {
  $order = $_POST['order'];
} else {
  $order = "DESC";
}

if (isset($_POST['filter'])) {
  $filter = trim($_POST['filter']);
} else {
  $filter = "";
}

if (isset($_POST['btnClear'])) {
}


$sql = "SELECT Titre_film,Genre,Casting,ID,Date_ajout FROM films ";
$params = array();

if ($filter) {
  $sql .= "WHERE Titre_film LIKE ? OR Genre LIKE ? OR Casting LIKE ? OR Date_ajout LIKE ?";
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
  $params[] = '%' . $filter . '%';
}

$sql .= "ORDER BY Titre_film $order";

$sql .= " LIMIT $debut, $nbr_elements_par_page";

$film = $pdo->prepare($sql);
$film->execute($params);
Var_dump($film);
if (isset($_SESSION['filter']) && strlen($_SESSION['filter']) > 0) {
}


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
  <link href="style.css" rel="stylesheet">
</head>
<header><?php echo $tcount[0]["cpt"] ?>enregistrements</header>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">

      <ul class="nav navbar-nav">
        <li class=active>

          <img src="image/imdb-logo-AF81176825-seeklogo.com.jpg" width=110 height=110>
        </li>
        <li><a href="#">Home</a></li>

        </li>

      </ul>
    </div>
  </nav>

  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item ">
        <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Précédent</a>
      </li>
      <?php

      for ($i = 1; $i <= $nbr_de_pages; $i++) {

        echo "<li><a href='?page=$i'>$i</a></li>&nbsp";
      }

      ?>
      <li class="page-item ">

        <a class="page-link" href="?page=<?= $page + 1 ?>">Prochain</a>
      </li>
    </ul>
  </nav>



  <h3>LISTE DES FILMS

    <form class="filterForm" method="POST" action="">


      <div class="row">
        <div class="col-sm-4">
          <div class="input-group ml-5">
            <select name="order" class="form-control">

              <option value="">--Selection option</option>

              <option value="DESC">
                (Ordre croissant)</option>

              <option value="ASC">
                (Ordre décroissant)</option>

            </select>

            <button type="submit" class="input-group-text" id="basic-addon2">Filtrage</button>
          </div>

        </div>
      </div>

      <input type="text" id="filter" name="filter" autofocus="true" placeholder="filtrer les recherches" />
      <input type="submit" name="btnFilter" id="btnFilter" value="entrer" />
      <input type="submit" name="btnClear" id="btnClear" value="retirer" />

    </form>


  </h3>
  </div>
  <?php

  if ($film) {

    echo '<table  width="70% cellpadding=" 5" cellspace="5" >';
    echo '<tr>';
    echo '<th class="Titre_film"><a href="index.php?sort=Titre_film">Film</a></th>';
    echo '<th class="Genre"><a href="index.php?sort=Genre">Genre</a></th>';
    echo '<th class="Casting"><a href="index.php?sort=Casting">Acteurs principaux</a></th>';
    echo '<th class="Date_ajout"><a href="index.php?sort=Date_ajout">Date_ajout</a></th>';

    echo '</tr>';


    if ($film) {
      $film->setFetchMode(PDO::FETCH_ASSOC);
      while ($row = $film->fetch()) {
        echo '<tr data-ref="' . $row['ID'] . '">';
        echo '<td>' . $row['Titre_film'] . '</td>';
        echo '<td>' . $row['Genre'] . '</td>';
        echo '<td>' . $row['Casting'] . '</td>';
        echo '<td>' . $row['Date_ajout'] . '</td>';
      }
    }
    echo '</table>';
  } else {
    echo '<p>Pas de films actuellement disponible.<p>';
  }
  ?>





</body>

</html>