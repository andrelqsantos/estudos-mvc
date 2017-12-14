<?php

$dsn = "mysql:dbname=cadastro;host=localhost";
$dbpass = "";
$dbuser = "root";
$pdo = new PDO($dsn, $dbuser, $dbpass);

  if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    $l = addslashes($_POST['login']);
    $s = md5(addslashes($_POST['senha']));
    $sql = "SELECT login, senha FROM usuarios WHERE login = ? && senha = ?";
    try {
      $sql = $pdo->prepare($sql);
      $sql->bindParam(1, $l);
      $sql->bindParam(2, $s);
      $sql->execute();
      if ($sql->rowCount() >= 1){
        $sql = $sql->fetchAll();
        foreach ($sql as $key => $login) {
        echo "Bem vindo: ".$login['login'];
        }
      }else {
        echo "Usuario nao encontrado: ";
      }
    } catch (PDOException $e) {
      echo "Erro ao consultar o banco: ".$e->getMessage();
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Titulo</title>
  </head>
  <body>
    <a href="../index.php"><br/>VOLTAR</a>
  </body>
</html>
