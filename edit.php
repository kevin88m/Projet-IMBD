<?php
// Include connect file
include_once "connect.php";
 
// Define variables and initialize with empty values
$film = $genre = $realisateur =
    $scenario = $casting =  $date_de_sortie = $date_ajout = "";

$film_err = $genre_err = $realisateur_err =
    $scenario_err = $casting_err = $date_de_sortie_err =
    $date_ajout_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate movie
    $input_film = trim($_POST["film"]);
    if(empty($input_film)){
        $film_err = "Please enter an address.";     
    } else{
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
        // Prepare an update statement
        $sql = "UPDATE films SET 
        Titre_film=:film, 
        Genre = :genre,
        Realisateur = :realisateur,
        Scenario = :scenario,
        Casting = :casting,
        Date_de_sortie = :date_de_sortie,
        Date_ajout = :date_ajout
        WHERE id= :id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":film", $param_film);
            $stmt->bindParam(":genre", $param_genre);
            $stmt->bindParam(":realisateur", $param_realisateur);
            $stmt->bindParam(":scenario", $param_scenario);
            $stmt->bindParam(":casting", $param_casting);
            $stmt->bindParam(":date_de_sortie", $param_date_de_sortie);
            $stmt->bindParam(":date_ajout", $param_date_ajout);
            $stmt->bindParam(":id", $param_id);
            // Set parameters
            $param_film = $film;
            $param_genre = $genre;
            $param_realisateur = $realisateur;
            $param_scenario = $scenario;
            $param_casting = $casting;
            $param_date_de_sortie = $date_de_sortie;
            $param_date_ajout = $date_ajout;
            $param_id = $id;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index1.php");
                exit();
            } else{
                echo "Oops! quelque chose vient d'arriver.";
            }
        }
         
        // Close statement
       unset($stmt);
    }
    
    // Close connection
    //unset($pdo);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM films WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    
                    
                     $film =$row['Titre_film'];
                     $genre= $row['Genre'];
                     $realisateur=$row['Realisateur']; 
                     $scenario=$row['Scenario'];
                     $casting=$row['Casting']; 
                     $date_de_sortie=$row['Date_de_sortie']; 
                    $date_ajout=$row['Date_ajout'];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops!quelque chose vient d'arriver.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Modification</h2>
                    <p>S'il vous plaît,remplir les valeurs vides et soumettez le formulaire pour la modification.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                    <div class="form-group">
                            <label>Film</label>
                            <input type="text"  name="film" class="form-control 
                            <?php echo (!empty($film_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $film; ?>">
                            <span class="invalid-feedback"><?php echo $film_err;?></span>
                    </div>
                    
                    <div class="form-group">
                            <label>Genre</label>
                            <input type="text"  name="genre" class="form-control 
                            <?php echo (!empty($genre_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $genre; ?>">
                            <span class="invalid-feedback"><?php echo $genre_err;?></span>
                    </div> 
                    
                    <div class="form-group">
                            <label>Réalisateur</label>
                            <input type="text"  name="realisateur" class="form-control 
                            <?php echo (!empty($realisateur_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $realisateur; ?>">
                            <span class="invalid-feedback"><?php echo $realisateur_err;?></span>
                    </div>


                    <div class="form-group">
                            <label>Scénario</label>
                            <textarea name="scenario" id="Scenario" class="form-control <?php echo (!empty($scenario_err)) ? 'is-invalid' : ''; ?>
                            "><?php echo $scenario; ?></textarea>
                            <span class="invalid-feedback"><?php echo $scenario_err;?></span>
                    </div>
                       
                        <div class="form-group">
                            <label>Acteurs principaux</label>
                            <input type="text"  name="casting" class="form-control <?php echo (!empty($casting_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $casting; ?>">
                            <span class="invalid-feedback"><?php echo $casting_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Date de sortie </label>
                            <input type="date"  name="date de sortie" class="form-control <?php echo (!empty($date_de_sortie_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $date_de_sortie; ?>">
                            <span class="invalid-feedback"><?php echo $date_de_sortie_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Date d'ajout</label>
                            <input type="date"  name="date ajout" class="form-control <?php echo (!empty($date_ajout_err)) ? 'is-invalid' : ''; ?>
                            " value="<?php echo $date_ajout; ?>">
                            <span class="invalid-feedback"><?php echo $date_ajout_err;?></span>
                        </div>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-warning" value="Valider">
                        <a href="index1.php" class="btn btn-danger ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>