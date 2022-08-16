<?php
require_once "src/ConexaoBD.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .questao {
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <main>
        <?php
        //Conecção com o banco de dados
        $conexao = ConexaoBanco::getConexao();

        //Perguntas
        $sqlPerguntas = "select * from perguntas";
        $resultadoP = $conexao->query($sqlPerguntas);
        $perguntas = $resultadoP->fetchAll(PDO::FETCH_ASSOC);

        //Respostas corretas
        $sqlRespostasCorretas = "select * from respostaCorreta";
        $resultadoC = $conexao->query($sqlRespostasCorretas);
        $corretas = $resultadoC->fetchAll(PDO::FETCH_ASSOC);

        //Respostas incorretas
        $sqlRespostasIncorretas = "select * from respostaIncorreta";
        $resultadoI = $conexao->query($sqlRespostasIncorretas);
        $incorretas = $resultadoI->fetchAll(PDO::FETCH_ASSOC);

        foreach ($perguntas as $p) {
            
            echo "<p class='questao' id='$idResC'>" . $p['pergunta'] . "<p/>";
        }

        foreach ($corretas as $c) {
            $idResC = $c['idRespostaCorreta'];
            echo "<p class='questao' id='$idResC'>" . $c['respostaCorreta'] . "<p/>";
        }

        $v = $_GET['p'];

        if ($v == 1) {
            echo "<p>correto</p>";
        } else {
            echo "<p>errado</p>";
        };

        ?>
        <div class="questao">
            <div class="resposta">
                <a href="index.php?p=1">
                    <p>certo</p>
                </a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false">
                    <p>errado</p>
                </a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false">
                    <p>errado</p>
                </a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false">
                    <p>errado</p>
                </a>
            </div>

        </div>
    </main>
</body>

</html>