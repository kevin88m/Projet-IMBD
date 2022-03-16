$sort_option = "DESC";
  if (isset($_GET['sort_numeric'])) {
    if ($_GET['sort_numeric'] == "low-high") {
      $sort_option = "ASC";
    } elseif ($_GET['sort_numeric'] == "high-low") {
      $sort_option = "DESC";
    }
  }

  
  $sql = "SELECT * FROM films ORDER BY Titre_film $sort_option";
  $prepared= $pdo->prepare($sql);
  $prepared->execute($params);
  if ($prepared->rowCount() > 0)
  {
    foreach($prepared as $filter)
  {
  ?>
      <tr>
          <td><?=$filter['Titre_film']; ?></td>
          <td><?=$filter['Genre']; ?></td>
          <td><?=$filter['Casting']; ?></td>
      </tr>
  
  
}else{
        ?>
        <tr>
          <td colspan="5">Pas d'enregistrements trouver</td>
        </tr>
        <?php

}
?>