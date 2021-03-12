<?php
//nomr do servidor onde está o db
$servidor = "us-cdbr-east-03.cleardb.com";
//usuario do db
$usuario = "b9f0ba0a35efb6";
//senha do db
$senha = "5f357b66";
//nome do db
$dbname = "heroku_0e7d09da5813d5d";

//passando paramentros para conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
