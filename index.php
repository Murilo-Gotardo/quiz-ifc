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
        <div class="questao">
            <?php

            //Conecção com o banco de dados
            $conexao = ConexaoBanco::getConexao();

            function excluiSelecionados(int $quantidade, int $maximo, array $excluidos): array
            {

                // Cria o array inicial
                $dicionario = range(1, $maximo);

                // Exclui os inválidos
                $dicionario = array_values(array_diff($dicionario, $excluidos));

                $resultado = [];

                // Gera a quantidade de número definidas
                for ($i = 0; $i < $quantidade; $i++) {

                    // Gera um número aletorio de 0 até a quantidade existente no dicionario.
                    $id = random_int(0, count($dicionario) - 1);

                    // Salva no "resultado"
                    $resultado[] = $dicionario[$id];

                    // Remove o número gerado da lista, afim de não gerar novamente o mesmo número
                    unset($dicionario[$id]);
                    $dicionario = array_values($dicionario);
                };

                return $resultado;
            };

            $cont = 0;
            //Perguntas
            $sqlPerguntas = "SELECT * FROM perguntas ORDER BY RAND() limit 3";
            $resultadoP = $conexao->query($sqlPerguntas);
            $perguntas = $resultadoP->fetchAll(PDO::FETCH_ASSOC);

            foreach ($perguntas as $pe) {
                //Respostas Incorretas
                $sqlRespostasIncorretas = "SELECT respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 FROM perguntas WHERE idPergunta = " . $pe['idPergunta'];
                $resultadoIn = $conexao->query($sqlRespostasIncorretas);
                $respostasIncorretas = $resultadoIn->fetchAll(PDO::FETCH_ASSOC);

                //Impressão da pergunta
                echo "<p class='questao pergunta' id='" . $pe['idPergunta'] . "'>" . $pe['pergunta'] . "</p>";
                foreach ($respostasIncorretas as $reIn) {
                    $idResIn = excluiSelecionados(3, 4, [4]);

                    $ale = rand(1, 4);
                    //$ale será usado para selecionar, de forma aleatoria, a composição da questão na estrutura de condicionamento a seguir
                    //Resposta Correta ocupará a primeira posição na questão
                    if ($ale == 1) {

                        echo "<p class='questao' id='" . "c" . "'>" . $pe['respostaCorreta'] . "</p>";

                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                        };
                    }
                    //Resposta Correta ocupará a segunda posição na questão 
                    elseif ($ale == 2) {
                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                            $cont++;

                            //Garante que será executado apenas uma vez
                            if ($cont == 1) {
                                echo "<p class='questao' id='" . "c" . "'>" . $pe['respostaCorreta'] . "</p>";
                            }
                        };

                        $cont = 0;
                    }
                    //Resposta Correta ocupará a terceira posição na questão 
                    elseif ($ale == 3) {
                        foreach ($idResIn as $num) {
                            $cont++;

                            //Garante que será executado apenas uma vez
                            if ($cont == 1) {
                                echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";

                                //Aleatoriza $num para que seja diferente de sua entrada no foreach
                                if ($num == 1) {
                                    $num = rand(2, 3);
                                } elseif ($num == 3) {
                                    $num = rand(1, 2);
                                }

                                echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";


                                echo "<p class='questao' id='" . "c" . "'>" . $pe['respostaCorreta'] . "</p>";


                                //verifica o valor de $num, em sua entrada no foreach, para impedir que a última questão se repita 
                                if ($num != 2 && $num != 3) {
                                    $num = 1;
                                    echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                                } elseif ($num != 1 && $num != 3) {
                                    $num = 2;
                                    echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                                } elseif ($num != 1 && $num != 2) {
                                    $num = 3;
                                    echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                                }
                            }
                        };

                        $cont = 0;
                    }
                    //Resposta Correta ocupará a quarta posição na questão 
                    elseif ($ale == 4) {
                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                        };

                        echo "<p class='questao' id='" . "c" . "'>" . $pe['respostaCorreta'] . "</p>";
                    }
                };
            };
            ?>
        </div>
    </main>
    <script>
        let idPCru = document.getElementsByClassName("pergunta");
        let idP = idPCru.id;

        let idCCru = document.getElementsByClassName("correta");
        let idC = idCCru.id;
    </script>
</body>

</html>