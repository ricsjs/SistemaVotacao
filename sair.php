<?php
//inicia sessao
session_start();
session_unset();
//destroi a sessao e redireciona para pagina de login (index.php)
session_destroy();
header("Location: index.php")
?>