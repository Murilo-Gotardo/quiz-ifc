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
        $sqlRespostasIncorretas = "select idRespostaIncorreta, respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 from respostaIncorreta";
        $resultadoI = $conexao->query($sqlRespostasIncorretas);
        $incorretas = $resultadoI->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="questao">
            <?php
            foreach ($corretas as $c) {
                foreach ($perguntas as $p) {
                    $cer = 3;
                    $cer++;
                    echo "<p class='questao'>" . $p['pergunta'] . "</p>";
                    echo "<span class='questao' id='$cer' onclick='verificaCorreta()'>" . $c['respostaCorreta'] . "<br></span>";
                }
            }

            foreach ($incorretas as $i) {
                $err = 0;
                echo "<button class='questao' id='$err'>" . $i['respostaIncorreta1'] . "<br></button>";
                echo "<button class='questao' id='$err'>" . $i['respostaIncorreta2'] . "<br></button>";
                echo "<button class='questao' id='$err'>" . $i['respostaIncorreta3'] . "</button>";
            }
            ?>
        </div>
    </main>
    <script type="module" src="js/pegaID.js">
        const { idC, idI } = require('js/pegaID.js');
        




        function verificaCorreta() {
            if (idC !== idI) {
                console.log('Acertou!!!');
            }
        };
    </script>
</body>

</html>