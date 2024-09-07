<?php
require_once 'database/database.php';
$id_cl=$_GET['id_cl'];

$sqlstate=$pdo->prepare('DELETE FROM client WHERE id_cl=?');
$sqlstate->execute([$id_cl]);

header('location: liste.php');








?>