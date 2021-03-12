<?php
//iniciando sessão
session_start();
//incuindo arquivo de conexão
include_once("conexao.php");
//pegando id
$id = $_SESSION['usuario_id'];
//fazendo consulta para pegar id do usuario e armazenar no array "$dados"
$sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Início</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- outros css -->
    <link href="layout_principal/styles_principal.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body id="page-top">
    <!-- Navegação-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background: #AEFFB6">
        <div class="container">
            <a class="navbar js-scroll-trigger" href="#"><img src="assets/images/logo/logo.png" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu <i class="ti-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto text-right">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#votacao">Votação</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a></li>
                    <div class="user-profile pull-right">
                        <div class="btn-group dropright ">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/author/avatar.png" style="
                            border-radius: 60px">
                            <?php 
                            //exibindo nome do usuário logado no canto superior direito da tela
                            echo $dados['usu_nome']; ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="sair.php" style="color: #DD4848">Sair</a>
                            </div>
                        </div>
                    </div>  
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <br><br>    
    </header>
    <!-- Área de Votação-->
    <section class="page-section" id="votacao">
        <div class="container">
            <div class="text-center">
                <br><br>
                <h2 class="section-heading text-uppercase" style="font-family: 'Lato', sans-serif">Votação</h2>
                <h3 class="section-subheading text-muted">Inicie sua participação na votação do grêmio</h3>
            </div>
            <center><div class="container">
                <h6>
                <?php  
                //verificando se há uma session chamada "msg"
                if(isset($_SESSION['msg'])){
                    //imprimir o valor da session
                    echo $_SESSION['msg'];
                    //destruição da session
                    unset($_SESSION['msg']);
                }
                ?>
                </h6>
            </div></center><br>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-4 col-sm-6">

                        <div class="card border-danger mb-3" style="width: 18rem;">

                            <img class="card-img-top" style="max-width: 100%" src="assets/images/imagem_votação.png" alt="Card image cap">

                            <div class="card-body">
                            </div>

                            <ul class="list-group list-group-flush">
                                <?php
                                //consulta sql para mostrar a chapa de id = 1
                                $result_chapa = "SELECT * FROM chapas WHERE chapa_id = 1";

                                $resultado_chapa = mysqli_query($conn, $result_chapa);
                                
                                //while para rodar os registros encontrados
                                while($row_chapa = mysqli_fetch_assoc($resultado_chapa)){
                                    //impressão do nome da chapa
                                    echo "<center><h6>Nome da chapa:  " . $row_chapa['chapa_nome'] . "<h6><br><center>";

                                    //contagem da quantidade de voto atraves da funcao count
                                    $query_qnt = "SELECT COUNT(voto_id) as qnt_voto FROM votos WHERE voto_chapa_id=".$row_chapa['chapa_id'];
                                    $qnt_voto = mysqli_fetch_assoc(mysqli_query($conn, $query_qnt));
                                    //impressão da quantidade de votos
                                    echo "<li> Quantidade de votos: ".$qnt_voto['qnt_voto']."</li>";

                                    echo "<br><br>";
                                    //botão para votar na referida chapa
                                    echo "<a class='btn btn-primary' style='background:#DD4848; color: white; border-color: #DD4848' href='votar.php?id=".$row_chapa['chapa_id']."'>Votar</a><br><hr>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card border-danger mb-3" style="width: 18rem">
                            <img class="card-img-top" style="max-width: 100%" src="assets/images/imagem_votação.png" alt="Card image cap">
                            <div class="card-body">
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                                //consulta sql para mostrar a chapa de id = 2
                                $result_chapa = "SELECT * FROM chapas where chapa_id = 2";

                                $resultado_chapa = mysqli_query($conn, $result_chapa);
                                
                                //while para rodar os registros encontrados
                                while($row_chapa = mysqli_fetch_assoc($resultado_chapa)){
                                    //impressão do nome da chapa
                                    echo "<center><h6>Nome da chapa:  " . $row_chapa['chapa_nome'] . "<h6><br><center>";

                                    //contagem da quantidade de voto atraves da funcao count
                                    $query_qnt = "SELECT COUNT(voto_id) as qnt_voto FROM votos WHERE voto_chapa_id=".$row_chapa['chapa_id'];
                                    $qnt_voto = mysqli_fetch_assoc(mysqli_query($conn, $query_qnt));
                                    //impressão da quantidade de votos da referida chapa
                                    echo "Quantidade de votos: ".$qnt_voto['qnt_voto']."<br>";


                                    echo "<br><br>";
                                    //botão para votar na referida chapa
                                    echo "<a class='btn btn-primary' style='background:#DD4848; color: white; border-color: #DD4848' href='votar.php?id=".$row_chapa['chapa_id']."'>Votar</a><br><hr>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card border-danger mb-3" style="width: 18rem;">
                            <img class="card-img-top" style="max-width: 100%" src="assets/images/imagem_votação.png" alt="Card image cap">
                            <div class="card-body">
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                                //consulta sql para mostrar a chapa de id = 3
                                $result_chapa = "SELECT * FROM chapas where chapa_id = 3";

                                $resultado_chapa = mysqli_query($conn, $result_chapa);
                                
                                //while para rodar os registros encontrados
                                while($row_chapa = mysqli_fetch_assoc($resultado_chapa)){

                                    //impressão do nome da chapa
                                    echo "<center><h6>Nome da chapa:  " . $row_chapa['chapa_nome'] . "<h6><br><center>";

                                    //contagem da quantidade de voto atraves da funcao count
                                    $query_qnt = "SELECT COUNT(voto_id) as qnt_voto FROM votos WHERE voto_chapa_id=".$row_chapa['chapa_id'];
                                    $qnt_voto = mysqli_fetch_assoc(mysqli_query($conn, $query_qnt));
                                    //impressão da quantidade de votos da referida chapa
                                    echo "Quantidade de votos: ".$qnt_voto['qnt_voto']."<br>";


                                    echo "<br><br>";
                                    //botão para votar na referida chapa
                                    echo "<a class='btn btn-primary' style='background:#DD4848; color: white; border-color: #DD4848' href='votar.php?id=".$row_chapa['chapa_id']."'>Votar</a><br><hr>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Fim da área de Votação-->
    <!-- Área Sobre do projeto -->
    <section class="page-section bg-light" id="sobre">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-heading text-uppercase" style="font-family: 'Lato', sans-serif">Sobre</h2>
                    <p class="text-muted">O Votação Grêmio IFRN visa aprimorar o processo eleitoral para diretoria do GESS do IFRN-Caicó, tornando a eleição mais rápida, eficaz, dinâmica, segura e colocando fim nos gastos com impressão.</p>
                </div>
            </div>
            <!-- Informações sobre a equipe que desenvolveu o projeto -->
            <div class="text-center">
                <br>
                <h3 class="section-heading text-uppercase" style="font-family: 'Lato', sans-serif">Nossa incrível equipe</h3>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/images/equipe/1.jpeg" alt="" />
                        <h4>Érica Maria</h4>
                        <p class="text-muted">Gerente</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/eriicamaria_/?hl=pt-br"><i class="ti-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/images/equipe/2.jpeg" alt="" />
                        <h4>João Elias</h4>
                        <p class="text-muted">Analista</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/joaoeliasneto/?hl=pt-br"><i class="ti-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/images/equipe/3.jpeg" alt="" />
                        <h4>Ricardo Alencar</h4>
                        <p class="text-muted">Devenvolvedor</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/euoalencar/?hl=pt-br"><i class="ti-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/images/equipe/4.jpeg" alt="" />
                        <h4>Izabel Crystynna</h4>
                        <p class="text-muted">Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/izabel_crystynna/?hl=pt-br"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Para dúvidas sobre o funcionamento da aplicação, contatar a equipe de desenvolvedores pelos meios de comunicação supracitados.</p></div>
            </div>
        </div>
    </section>
    <!-- Fim da área Sobre do projeto -->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="layout_principal/scripts_principal.js"></script>
</body>
</html> 
