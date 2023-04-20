<?php
require '../../autoload.php';
$object = new AuthController($pdo);

$result = $object->logout($data);

if($_SESSION['user'] == null){
    header('Location:../../pages/auth/login.php');
  }

?>