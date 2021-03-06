<?php

// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include connect file
    require_once "connect.php";
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with  root password) */
   
     // Prepare a select statement
    $sql = "SELECT * FROM films WHERE id = :id";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retrieve individual field value
                
                $film = $row["Titre_film"];
                $genre = $row['Genre'];
                $realisateur = $row['Realisateur'];
                $scenario = $row['Scenario'];
                $casting = $row['Casting'];
                $date_de_sortie = $row['Date_de_sortie'];
                $date_ajout = $row['Date_ajout'];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops!quelque chose ne va pas.";
        }
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Lecture du film</h1>
                    <div class="form-group">
                        <label>Film</label>
                        <p><b><?php echo $row["Titre_film"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <p><b><?php echo $row['Genre']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>R??alisateur</label>
                        <p><b><?php echo   $row['Realisateur']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Sc??nario</label>
                        <p><b><?php echo $row['Scenario']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Acteurs principaux</label>
                        <p><b><?php echo $row['Casting']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date de sortie </label>
                        <p><b><?php echo $row['Date_de_sortie']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date d'ajout</label>
                        <p><b><?php echo $row['Date_ajout']; ?></b></p>
                    </div>
                    <p><a href="index1.php" class="btn btn-warning">RETOUR</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>