<?php
//nomr do servidor onde está o db
$servidor = "localhost";
//usuario do db
$usuario = "root";
//senha do db
$senha = "";
//nome do db
$dbname = "projeto";

//passando paramentros para conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);