<?php
  $dsn = "mysql:dbname=cadastro;host=localhost";
  $dbpass = "";
  $dbuser = "root";
  $pdo = new PDO($dsn, $dbuser, $dbpass);

  if (!empty($_POST['nome']) && !empty($_POST['pass']) &&
  !empty($_POST['passconfirm']) && $_POST['pass'] == $_POST['passconfirm']) {
    $n = addslashes($_POST['nome']);
    $p = md5(addslashes($_POST['pass']));

  try {

    $sql = "INSERT INTO usuarios (login, senha) VALUES (?, ?)";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(1, $n);
    $sql->bindParam(2, $p);
    $sql->execute();
    echo "Cadastro Feito com sucesso: <br/>";

  } catch (PDOException $e) {
    echo "Erro ao inseriri ao banco: <br/>".$e->getMessage;
  }
}else {
  echo "Campos não preenchidos ou senha diferentes nos campos <br/>";
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href="../index.php">VOLTAR</a>
   </body>
 </html>
