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
      <table class="table-responsive table-dark table-striped">
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

              echo '<table class="table-responsive table-dark table-striped">';
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

                echo '<td><a href="edit.php?id=' . $row['ID'] . '" class="mr-1"  title="Modification" data-toggle="tooltip"><span class="fa fa-pencil"></span></a></td>';
                echo '<td><a href="read.php?id=' . $row['ID'] . '" class="mr-1"  title="Lecture" data-toggle="tooltip"><span class="fa fa-eye"></span></a></td>';
                echo '<td><a href="delete.php?id=' . $row['ID'] . '"class="mr-1" title="Supprimer" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>';


                echo "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
              echo "</div>";
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Responsive Layout Example</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="#" class="navbar-brand">Tutorial Republic</a>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="#" class="nav-item nav-link active">Home</a>
          <a href="#" class="nav-item nav-link">Services</a>
          <a href="#" class="nav-item nav-link">About</a>
          <a href="#" class="nav-item nav-link">Contact</a>
        </div>
        <div class="navbar-nav ms-auto">
          <a href="#" class="nav-item nav-link">Register</a>
          <a href="#" class="nav-item nav-link">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="p-5 my-4 bg-light rounded-3">
      <h1>Learn to Create Websites</h1>
      <p class="lead">In today's world internet is the most popular way of connecting with the people. At <a href="https://www.tutorialrepublic.com" class="text-success" target="_blank">tutorialrepublic.com</a> you will learn the essential web development technologies along with real life practice examples, so that you can create your own website to connect with the people around the world.</p>
      <p><a href="https://www.tutorialrepublic.com" target="_blank" class="btn btn-success btn-lg">Get started today</a></p>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>HTML</h2>
        <p>HTML is the standard markup language for describing the structure of the web pages. Our HTML tutorials will help you to understand the basics of latest HTML5 language, so that you can create your own website.</p>
        <p><a href="https://www.tutorialrepublic.com/html-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>CSS</h2>
        <p>CSS is used for describing the presentation of web pages. CSS can save a lot of time and effort. Our CSS tutorials will help you to learn the essentials of latest CSS3, so that you can control the style and layout of your website.</p>
        <p><a href="https://www.tutorialrepublic.com/css-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>JavaScript</h2>
        <p>JavaScript is the most popular and widely used client-side scripting language. Our JavaScript tutorials will provide in-depth knowledge of the JavaScript including ES6 features, so that you can create interactive websites.</p>
        <p><a href="https://www.tutorialrepublic.com/javascript-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>Bootstrap</h2>
        <p>Bootstrap is a powerful front-end framework for faster and easier web development. Our Bootstrap tutorials will help you to learn all the features of latest Bootstrap 4 framework so that you can easily create responsive websites.</p>
        <p><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>PHP</h2>
        <p>PHP is the most popular server-side scripting language for creating dynamic web pages. Our PHP tutorials will help you to learn all the features of latest PHP7 scripting language so that you can easily create dynamic websites.</p>
        <p><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>SQL</h2>
        <p>SQL is a standard language designed for managing data in relational database management system. Our SQL tutorials will help you to learn the fundamentals of the SQL language so that you can efficiently manage your databases.</p>
        <p><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>References</h2>
        <p>Our references section outlines all the standard HTML5 tags and CSS3 properties along with other useful references such as color names and values, character entities, web safe fonts, language codes, HTTP messages, and more.</p>
        <p><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
      <div class="col-md-6 col-lg-4 col-xl-3">
        <h2>FAQ</h2>
        <p>Our Frequently Asked Questions (FAQ) section is an extensive collection of FAQs that provides quick and working solution of common questions and queries related to web design and development with live demo.</p>
        <p><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
      </div>
    </div>
    <hr>
    <footer>
      <div class="row">
        <div class="col-md-6">
          <p>Copyright &copy; 2021 Tutorial Republic</p>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="#" class="text-dark">Terms of Use</a>
          <span class="text-muted mx-2">|</span>
          <a href="#" class="text-dark">Privacy Policy</a>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>