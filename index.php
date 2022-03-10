
  

  <?php

include ('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
     
        <img src="image/imdb-logo-AF81176825-seeklogo.com.jpg" height=60 width=60> </li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        </li>
      
    </ul>
  </div>
</nav>
  



    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <?php             
        $stmt=$pdo->query ('SELECT ID,Titre_film,Genre,Casting FROM films');
        $filmographie = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        
  
 
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>Ouvrir et trier par ordre croissant ou décroissant</option>
  <option value="1">Croissant</option>
  <option value="2">Décroissant</option>
  
</select>


    <table id="">

      <tr>
        <th>ID</th>
        <th>Titre du film</th>
        <th>Genre</th>
        <th>Acteurs principaux</th>
       
      </tr>
      <tr>
        
        <?php foreach ($filmographie as $filmographie): ?>

        <td><?=$filmographie['ID'] ?></td>
        <td><?=$filmographie['Titre_film'] ?></td>
        <td><?=$filmographie['Genre'] ?> </td>
        <td><?=$filmographie['Casting'] ?></td>
        
      </tr>
     
    
          <?php endforeach; ?>
    </table>

</body>
</html>
