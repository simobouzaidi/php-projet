<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list des utulisateur</title>
</head>
<body>
<?php require_once 'database/database.php'; 
include'barnav.php'?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">prix</th>
      <th scope="col">date de creation</th>
      <th>modifier|suprimmer</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $clients = $pdo->query('SELECT * FROM client')->fetchAll(PDO::FETCH_ASSOC);
    foreach($clients as $client) { ?>
    <tr>
      <th scope="row"><?php echo $client['id_cl']; ?></th>
      <td><?php echo $client['nom_cl']; ?></td>
      <td><?php echo $client['prenom_cl']; ?></td>
      <td><?php echo $client['prix']; ?></td>
      <td><?php echo $client['date_inscp']; ?></td>
      <td><a href="modifier.php?id_cl=<?php echo $client['id_cl']?>" class="btn btn-primary ">modifier</a>
      <a href="suprimmer.php?id_cl=<?php echo $client['id_cl']?>" class="btn btn-danger">suprimmer</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>
