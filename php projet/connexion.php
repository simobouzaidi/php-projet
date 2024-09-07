<?php
if(isset($_POST['connexion'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    
if (!empty($name) && !empty($password)) {
    require_once 'database/database.php';
    $sqlstate = $pdo->prepare(query: 'SELECT * FROM responsable WHERE name=? AND password=?');
 $sqlstate->execute([$name, $password]);
 if($sqlstate->rowCount()>=1){
    session_start();
    $_SESSION['rsp'] = $sqlstate->fetch();
    
    header('location: admin.php');
 }
 else {
    
   ?><div class="alert alert-danger" role="alert">
   votre nom ou votre mot de passe est incorrecte

</div>
   <?php
 }


} else { 
?>
    <div class="alert alert-danger" role="alert">
        votre nom ou votre mot de passe est incorrecte

    </div><?php }} ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>connexion</title>
</head>

<body>

    <h1 align="center">connexion</h1>
    <form method="post" align="center">
        <input type="text" class="form-label" name="name" placeholder="name"><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="submit" value="connexion" name="connexion" class="btn btn-primary ">
        <a href="inscription.php" class="btn btn-primary"> inscription</a>
    </form>
  

</body>

</html>