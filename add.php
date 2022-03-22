<?php



require_once('connect.php');


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Ajouter un film</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h2>Ajouter un film</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="Titre_film">titre du film</label>
                        <input type="text" id="Titre_film" name="Titre_film"
                        class="form-control"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="Genre">Genre</label>
                        <input type="text" id="Genre" name="Genre"
                        class="form-control">

                    </div>
                    
                    <div class="form-group">
                        <label for="Realisateur">Réalisateur</label>
                        <input type="text" id="Realisateur" name="Realisateur"
                        class="form-control">

                    </div>
                    
                    <div class="form-group">
                        <label for="Scenario">Scénario</label>
                        <input type="text"  id="Scenario" name="Scenario"
                        class="form-control">
   
                    </div>

                    <div class="form-group">
                        <label for="Casting">Acteurs principaux</label>
                        <input type="text" id="Casting" name="Casting"
                        class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="Date_de_sortie">date de sortie</label>
                        <input type="date" id="Date_de_sortie" name="Date_de_sortie"
                        class="form-control">
   
                    </div>

                    <div class="form-group">
                        <label for="Date_ajout">Date d'ajout</label>
                        <input type="date" id="Date_ajout" name="Date_ajout"
                        class="form-control">

                    </div>

                    <button type="button" class="btn btn-warning">Envoyer</button>

                </form>
            </section>

        </div>


    </main>
</body>

</html>