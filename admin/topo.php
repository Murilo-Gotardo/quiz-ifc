<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Quiz-ifc</title>

    <!-- Bootstrap CSS CDN -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="cssAdmin/style.css">
    <link rel="stylesheet" href="cssAdmin/menuStyle.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/bae5127ccf.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="index.php">
                    <h3>Quiz-ifc</h3>
                </a>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#discoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-sharp fa-solid fa-paint-roller"></i>
                        Perguntas
                    </a>
                    <ul class="list-unstyled" id="discoSubmenu">
                        <li>
                            <a href="form_cadastro_produto.php">Cadastrar perguntas</a>
                        </li>
                        <li>
                            <a href="form_lista_produtos.php">Listar perguntas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contato
                    </a>
                </li>
            </ul>
        </nav>

    <!-- Page Content  -->
    <div id="content">
