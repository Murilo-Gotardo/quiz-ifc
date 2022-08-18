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

        .pergunta {
            padding: 20px;
            background-color: red;
        }
    </style>
</head>

<body>
    <main>
        <?php
        //Conecção com o banco de dados
        $conexao = ConexaoBanco::getConexao();


        ?>
        <div class="questao">
            <?php
            $cont = 1;
            $erroCont = 1;
            for (;;) {
                $i = rand(1, 3);
                $per = $i;


                //Perguntas
                $sqlPerguntas = "select pergunta, idPergunta from perguntas where idPergunta = " . $per;
                $resultadoP = $conexao->query($sqlPerguntas);
                $perguntas = $resultadoP->fetchAll(PDO::FETCH_ASSOC);

                foreach ($perguntas as $pe) {
                    echo "<p class='questao pergunta' id='" . $pe['idPergunta'] . "'>" . $pe['pergunta'] . "</p>";
                };

                //Respostas corretas
                $sqlRespostasCorretas = "select respostaCorreta, idRespostaCorreta from respostaCorreta where idRespostaCorreta = " . $i;
                $resultadoC = $conexao->query($sqlRespostasCorretas);
                $corretas = $resultadoC->fetchAll(PDO::FETCH_ASSOC);

                foreach ($corretas as $co) {
                    echo "<p class='questao correta' id='" . $co['idRespostaCorreta'] . "'>" . $co['respostaCorreta'] . "<br></p>";
                };

                //Respostas incorretas
                $sqlRespostasIncorretas = "select * from respostaIncorreta where idPergunta = " . $i;
                $resultadoI = $conexao->query($sqlRespostasIncorretas);
                $incorretas = $resultadoI->fetchAll(PDO::FETCH_ASSOC);

                //Repete três vezes para imprimir as respostas erradas em ordem, de acordo com o "$erroCont"
                for ($i = 1; $i <= 3; $i++) {
                    foreach ($incorretas as $in) {
                        echo "<p class='questao grupo-errado-" . $cont . "'>" . $in['respostaIncorreta' . $erroCont] . "<br></p>";
                    };
                    $erroCont++;

                    //confirma se "$erroCont" ja foi acrescentado o suficiente antes de parar
                    if ($erroCont == 4) {
                        $erroCont = 1;
                    };
                }

                $cont++;

                if ($cont == 16) {
                    break;
                }
            };

            ?>
        </div>
    </main>
    <script>
        let idPCru = document.getElementsByClassName("pergunta");
        let idP =  idPCru.id;

        let idCCru = document.getElementsByClassName("correta");
        let idC = idCCru.id;
    </script>
</body>

</html>