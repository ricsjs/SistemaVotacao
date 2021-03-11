<?php 
//incluindo conexao com db
include_once("conexao.php");
//inciando sessao
session_start();
//pegando info dos inputs e fazendo consulta sql
if (isset($_POST['matricula'])){
	$nome = $_POST['nome'];
	$matricula = $_POST['matricula'];
	$senha = md5($_POST['senha']);
	$sql = "INSERT INTO usuarios (usu_nome, usu_matricula, usu_senha) VALUES ('$nome', '$matricula', '$senha')";
	$result = mysqli_query($conn, $sql);
	//verificando se os inputs estão vazios, se estiverem, imprimo uma mensagem de erro pedindo para o usuário preencher todos os campos necessários. Caso todos os inputs estiverem preenchidos, o código segue para o else, que mostrará uma mensagem que o usuário foi cadastrado com sucesso.
	if(empty($nome)or empty($matricula) or empty($senha)){
		$_SESSION['msg'] = "<h6 style = 'color: red'>Preencha todos os campos</h6>";
	}else{
		$_SESSION['msg2'] = "<h6 style = 'color: green'>Usuário cadastrado com sucesso, faça login!</h6>";
	}

}

 ?>

 <!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- outros css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- início da área do pré-carregador -->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="top: -50px; background: #AEFFB6">
                                <!-- Cabeçalho do cadastro de usuários -->
                                <div class="logo text-center">
                                    <br>
                                    <a href="#"><img src="assets/images/logo/logotipo.png" alt="logo"></a>
                                    <br>
                                </div>
                                <!-- Informações do cadastro de usuários -->
                                <div class="card-body">
                                    <form method="POST" action="cadastro.php">
                                        <h4><i class="ti-lock"><label style="color: #DD4848; font-size: 35px">Cadastro</label></i></h4>
                                        <hr style="background: #948989">
                                        <div class="form-group">
                                            <label style="color: black">Nome:</label>
                                            <input name="nome" type="text" class="form-control border-input" style="background-color: white; border-radius: 7px; border-color: black; border-width: 1px" placeholder="Digite seu nome">
                                        </div>
                                        <div class="form-group">
                                            <label style="color: black">Matrícula:</label>
                                            <input name="matricula" type="text" class="form-control border-input" style="background-color: white; border-radius: 7px; border-color: black; border-width: 1px" placeholder="Digite sua matrícula">
                                        </div>
                                        <div class="form-group">
                                            <label style="color: black">Senha:</label>
                                            <input name="senha" type="password" class="form-control border-input" style="background-color: white; border-radius: 7px; border-color: black; border-width: 1px" placeholder="Digite a senha da matrícula">
                                        </div>
                                        <div class="submit-btn-area">
                                            <button name="btn" type="submit" class="btn btn-danger btn-lg" style="background: #DD4848; border-radius: 60px; height: 65px; width: 260px; color:white; font-size: 25px">Cadastrar-se</button> <br>
                                            <a style="color: #A01F1F; font-size: 15px; text-decoration: underline" href="index.php">Já tem uma conta? Fazer login!</a><br>
                                            <?php 
                                            	/*if (isset($_POST['btn'])){
   													echo " <span style='text-align: center; color:green'>Usuário cadastrado com sucesso</span> ";
												}*/
												//verificando se existe uma sessao chamada "msg"
												if(isset($_SESSION['msg'])){
													//impressão conteudo da sessão "msg"
													echo $_SESSION['msg'];
													//destruicao da sessao
													unset($_SESSION['msg']);
												}
												//verificado se ha uma sessao chamada "msg2"
												if(isset($_SESSION['msg2'])){
													//impressao do conteudo da sessao
													echo $_SESSION['msg2'];
													//destruição da sessao
													unset($_SESSION['msg2']);
												}
                                             ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- fim da área de cadastro -->

    <!-- versão mais recente do jquery -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- outros plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>