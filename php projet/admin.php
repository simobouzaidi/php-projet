<?php
session_start();
 if(!isset($_SESSION['rsp'])){
header('location: connexion.php');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>admin</title>
</head>
<body><?php require_once 'database/database.php';?>
<?php include 'barnav.php'?>

<h1 align="center">bonjour: <?php echo $_SESSION['rsp']['name']?></h1>

 <?php
 if(isset($_POST['ajouter'])){
    $nom_cl=$_POST['nom_cl'];
    $prenom_cl=$_POST['prenom_cl'];
    $prix=$_POST['prix'];
    $date_inscp=date('Y-m-d');
    if(!empty($_POST['nom_cl'])&&!empty($_POST['prenom_cl'])&&!empty($_POST['prix'])){
        $sqlstate=$pdo->prepare('INSERT INTO client value(null,?,?,?,?)');
        $sqlstate->execute([$nom_cl,$prenom_cl,$prix,$date_inscp]);
        ?>
          <div class="alert alert-success" role="alert">
   bon ajouter

</div>
        <?php

    }else{?>
        <div class="alert alert-danger" role="alert">
   touts les champes obligatoire

</div><?php

 }
}
 ?>
 <form method="post">
    <input type="text" name="nom_cl" placeholder="nom_cl">
    <input type="text" name="prenom_cl" placeholder="prenom_cl">
    <input type="numbre" name="prix" placeholder="prix">
    <input type="submit" value="ajouter" name="ajouter">
 </form>

</body>
</html>