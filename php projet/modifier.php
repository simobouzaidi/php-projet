
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>modifier</title>
</head>
<body>
<?php include 'barnav.php'?>

<h1 align="center">modifier</h1>

<?php require_once 'database/database.php';

$id_cl=$_GET['id_cl'];
$sqlstate=$pdo->prepare('SELECT *FROM client WHERE id_cl=?');
$sqlstate->execute([$id_cl]);
$client= $sqlstate->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['modifier'])){
    $id_cl=$_POST['id_cl'];
    $nom_cl=$_POST['nom_cl'];
    $prenom_cl=$_POST['prenom_cl'];
    $prix=$_POST['prix'];
}
    if(!empty($id_cl)&&!empty($nom_cl)&&!empty($prenom_cl)&&!empty($prix)){
        $sqlstate=$pdo->prepare('UPDATE client SET nom_cl=?, prenom_cl=?, prix=? WHERE id_cl=?');
    $sqlstate->execute([$nom_cl, $prenom_cl, $prix, $id_cl]);
    header('location: liste.php');}

?>
 <form method="post">
    <input type="hidden" name="id_cl" value="<?php echo $client['id_cl']?>">
    <input type="text" class="form-control" name="nom_cl" placeholder="nom_cl" value="<?php echo $client['nom_cl'] ?>">
    <input type="text "class="form-control" name="prenom_cl" placeholder="prenom_cl" value="<?php echo $client['prenom_cl'] ?>">
    <input type="numbre" class="form-control" name="prix" placeholder="prix" value="<?php echo $client['prix'] ?>">
    <input type="submit" value="modifier" name="modifier">
 </form>

</body>
</html>