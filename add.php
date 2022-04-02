<?php
// Include connect file
require_once "connect.php";

// Define variables and initialize with empty values

$film = $genre = $realisateur =
    $scenario = $casting =  $date_de_sortie = $date_ajout = "";

$film_err = $genre_err = $realisateur_err =
    $scenario_err = $casting_err = $date_de_sortie_err =
    $date_ajout_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate film

    $input_film = trim($_POST["film"]);
    if (empty($input_film)) {

        $film_err = "Remplissez le champs film.";
    } else {
        $film = $input_film;
    }


    $input_genre = trim($_POST["genre"]);
    if (empty($input_genre)) {
        $genre_err = "Remplissez le champs genre.";
    } else {
        $genre = $input_genre;
    }

    $input_realisateur = trim($_POST["realisateur"]);
    if (empty($input_realisateur)) {
        $realisateur_err = "Remplissez le champs réalisateur.";
    } else {
        $realisateur = $input_realisateur;
    }

    $input_scenario = trim($_POST["scenario"]);
    if (empty($input_scenario)) {
        $scenario_err = "Remplissez le champs scénario.";
    } else {
       $scenario = $input_scenario;
    }

    $input_casting = trim($_POST["casting"]);
    if (empty($input_casting)) {
        $casting_err = "Remplissez le champs Acteurs principaux.";
    } else {
        $casting = $input_casting;
    }
    $input_date_de_sortie = trim($_POST["date_de_sortie"]);
    if (empty($input_date_de_sortie)) {
        $date_de_sortie_err = "Remplissez la date de sortie.";
    } else {
        $date_de_sortie = $input_date_de_sortie;
    }

    $input_date_ajout = trim($_POST["date_ajout"]);
    if (empty($input_date_ajout)) {
        $date_ajout_err= "Remplissez la date d'ajout.";
    } else {
        $date_ajout = $input_date_ajout;
    }
    // Check input errors before inserting in database
    if (
        empty($film_err) && empty($genre_err)
        && empty($realisateur_err) && empty($scenario_err)
        && empty($casting_err) && empty($date_de_sortie_err)
        && empty($date_ajout_err)
        ) {
        // Prepare an insert statement

        $sql = "INSERT INTO films
        (   Titre_film,
            Genre,
            Realisateur,
            Scenario,
            Casting,
            Date_de_sortie,
            Date_ajout) 
                VALUES 
        (   :film, 
            :genre, 
            :realisateur,
            :scenario,
            :casting,
            :date_de_sortie,
            :date_ajout)";


        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":film", $param_film);
            $stmt->bindParam(":genre", $param_genre);
            $stmt->bindParam(":realisateur", $param_realisateur);
            $stmt->bindParam(":scenario", $param_scenario);
            $stmt->bindParam(":casting", $param_casting);
            $stmt->bindParam(":date_de_sortie", $param_date_de_sortie);
            $stmt->bindParam(":date_ajout", $param_date_ajout);

            // Set parameters
            $param_film = $film;
            $param_genre = $genre;
            $param_realisateur = $realisateur;
            $param_scenario = $scenario;
            $param_casting = $casting;
            $param_date_de_sortie = $date_de_sortie;
            $param_date_ajout = $date_ajout;
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index1.php");
                exit();
            } else {
                echo "Oops!Quelque chose ne se déroule pas comme prévu ,reéssayer ultérieurement .";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        * {
            box-sizing: border-box;
        }

        div.card-header {
            padding: 1.5rem 1rem;
            margin-bottom: 0;
            background-color: rgb(0 0 0);
        }

        img {
            max-width: 80%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li class=active>

                    <img src="image/imdb-logo-AF81176825-seeklogo.com.jpg" width=110 height=110>
                </li>



            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ajouter un film</h2>

                    <p>S'il vous plaît remplissez et soumettre le formulaire pour enregistrer dans la base de donnée.</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group">

                            <label>Film</label>
                            <input type="text" name="film" class="form-control 
                            <?php echo (!empty($film_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $film; ?>">
                            <span class="invalid-feedback"><?php echo $film_err; ?></span>
                        </div>

                        <div class="form-group">

                            <label>Genre</label>

                            <input type="text" name="genre" class="form-control 
                            <?php echo (!empty($genre_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $genre; ?>">
                            <span class="invalid-feedback"><?php echo $genre_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Réalisateur</label>

                            <input type="text" name="realisateur" class="form-control 
                            <?php echo (!empty($realisateur_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $realisateur; ?>">
                            <span class="invalid-feedback"><?php echo $realisateur_err; ?></span>
                        </div>


                        <div class="form-group">
                            <label>Scénario</label>
                            <textarea name="scenario" class="form-control <?php echo (!empty($scenario_err)) ? 'is-invalid' : ''; ?>">
                            <?php echo $scenario; ?></textarea>
                            <span class="invalid-feedback"><?php echo $scenario_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Acteurs principaux</label>
                            <input type="text" name="casting" class="form-control 
                            <?php echo (!empty($casting_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $casting; ?>">
                            <span class="invalid-feedback"><?php echo $casting_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Date de sortie</label>
                            <input type="date" name="date de sortie" class="form-control 
                            <?php echo (!empty($date_de_sortie_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $date_de_sortie; ?>">
                            <span class="invalid-feedback"><?php echo $date_de_sortie_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Date d'ajout</label>
                            <input type="date" name="date ajout" class="form-control
                            <?php echo (!empty($date_ajout_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $date_ajout; ?>">
                            <span class="invalid-feedback"><?php echo $date_ajout_err; ?></span>
                        </div>

                        <input type="submit" class="btn btn-danger" value="ENVOYER">
                        <a href="index1.php" class="btn btn-warning ml-2">ANNULER</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>