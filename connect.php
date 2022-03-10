<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);


  // On récupere les identifiants de la Base de données
  $config = parse_ini_file("config.ini", true);

  // Connexion à la Base de données
  try {
    $pdo = new PDO('mysql:host=' . $config["DB_HOST"] . ';dbname=' . $config["DB_NAME"], $config["DB_USERNAME"], $config["DB_PASSWORD"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
  }

  
  ?>