<?php 
//iniciando sessão
session_start();
//incluindo arquivo de config db
include('conexao.php');
$msg = 0;
//pegando conteudo do form
if(isset($_POST['entrar'])){
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    //verificando se os inputs estão vazios por meio do empty
    if(empty($matricula) or empty($senha)){
        $_SESSION['msg'] = "<h6 style='color: red'>Preencha todos os campos!</h6><br><hr>";
    //se os inputs nao estiverem vazios passa para esse "else"
    }else{
        //se os inputs nao estiverem vazios passa para esse "else"
        //consulta e resultado da consulta do db
        $sql = "SELECT usu_matricula FROM usuarios WHERE usu_matricula = '$matricula'";
        $resultado = mysqli_query($conn, $sql);
        //mysqli_num_rows está contando a quantidade de linhas na variavel resultado, se for maior que 0, signfica que tem registros com a matricula e senha referida pelo o usuario
        if (mysqli_num_rows($resultado)>0) {
            //criptografia de senha no formato md5
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE usu_matricula = '$matricula' AND usu_senha = '$senha'";
            $resultado = mysqli_query($conn, $sql);
            //se a quantidade de linhas for igual a 1 significa que temos um registo de login, então será feita a autenticação e o usuário será redirecionado para a pagina principal
            if(mysqli_num_rows($resultado) == 1){
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['usuario_id'] = $dados['usu_id'];
                header('Location: principal.php');
            //mensagem de erro dizendo usuário inválido
            }else{
                $_SESSION['msg2'] = "<h6 style='color: red'>Usuário inválido!</h6><br><hr>";
            }
        //mensagem de erro dizendo usuário inválido
        }else{
            $_SESSION['msg3'] = "<h6 style='color: red'>Usuário inválido!</h6><br><hr>";
        }
    }       
}
$msg = 1;
 ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
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
<body style="font-family: 'Lato', sans-serif">
    <!-- início da área do pré-carregador -->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="top:-30px; background: #AEFFB6">
                                <!-- Cabeçalho do login -->
                                <div class="logo text-center">
                                    <br>
                                    <a href="#"><img src="assets/images/logo/logotipo.png" alt="logo"></a>
                                    <br><br>
                                    <h5>Seja bem-vindo!</h5>
                                </div>
                                <!-- Área que contem as informações do login -->
                                <div class="card-body">
                                    <?php 
                                        /*if(empty($matricula) or empty($senha)){
                                            echo "<span style='text-align: center; color:red'>Preencha todos campos</span>";
                                        } */
                                        //verificando se há uma sessao chamada "msg"
                                        if(isset($_SESSION['msg'])){
                                        //impressao do conteudo da sessao
                                        echo $_SESSION['msg'];
                                        //destruição da sessao
                                        unset($_SESSION['msg']);
                                        }
                                        //verificando se ha uma sessao chamada "msg2"
                                        if(isset($_SESSION['msg2'])){
                                        //imprimindo conteudo da sessao
                                        echo $_SESSION['msg2'];
                                        //destruição da sessao
                                        unset($_SESSION['msg2']);
                                        }
                                        //verificando se uma uma sessao chamada "msg3"
                                        if(isset($_SESSION['msg3'])){
                                        //impressao do conteudo da sessao
                                        echo $_SESSION['msg3'];
                                        //destruição da sessao
                                        unset($_SESSION['msg3']);
                                        }

                                     ?>
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <h4><i class="ti-lock"><label style="color: #DD4848; font-size: 35px">Login</label></i></h4>
                                        <hr style="background: #948989">
                                        <div class="form-group">
                                            <label style="color: black">Matrícula:</label>
                                            <input class="form-control border-input" style="background-color: white; border-radius: 7px; border-color: black; border-width: 1px" placeholder="Digite sua matrícula" type="text" name="matricula">
                                        </div>
                                        <div class="form-group">
                                            <label style="color: black">Senha:</label>
                                            <input class="form-control border-input" style="background-color: white; border-radius: 7px; border-color: black; border-width: 1px" placeholder="Digite a senha da matrícula" type="password" name="senha">
                                        </div>
                                        <div class="submit-btn-area">
                                            <button name="entrar" type="submit" class="btn btn-danger btn-lg" style="background: #DD4848; border-radius: 60px; color:white; width: 150px; height: 65px; text-align: center; font-size: 25px">Entrar</button><br>
                                        </div>
                                        <div class="form-footer text-center mt-2">
                                            <p class="text-muted">Se for sua primeira vez na votação<a style="color: #A01F1F; font-size: 18px; text-decoration: underline" href="cadastro.php">Cadastre-se</a></p>
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
    <!-- fim da área de login -->
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