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
                $sqlRespostasIncorretas = "SELECT respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 FROM perguntas WHERE idPergunta = " . $pe['idPergunta'] . " ORDER BY RAND() limit 3";
                $resultadoIn = $conexao->query($sqlRespostasIncorretas);
                $respostasIncorretas = $resultadoIn->fetchAll(PDO::FETCH_ASSOC);

                //Impressão da pergunta
                echo "<p class='questao pergunta' id='" . $pe['idPergunta'] . "'>" . $pe['pergunta'] . "</p>";

                foreach ($respostasIncorretas as $reIn) {
                    $idResIn = excluiSelecionados(3, 4, [4]);
                    $ale = rand(1, 4);

                    if ($ale == 1) {
                        echo "<p class='questao' id='" . $pe['idPergunta'] . "'>" . $pe['respostaCorreta'] . "</p>";
                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                        };
                    } elseif ($ale == 2) {

                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                            $cont++;
                            if ($cont == 1) {
                                for ($i = 0; $i < 1; $i++) {
                                    echo "<p class='questao' id='" . $pe['idPergunta'] . "'>" . $pe['respostaCorreta'] . "</p>";
                                }
                            }
                        };

                        $cont = 0;
                    } elseif ($ale == 3) {
                        foreach ($idResIn as $num) {
                            $cont++;

                            if ($cont == 1) {
                                echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                                if ($num == 1) {
                                    $num = rand(2, 3);
                                } elseif ($num == 3) {
                                    $num = rand(1, 2);
                                }

                                echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";

                                for ($i = 0; $i < 1; $i++) {
                                    echo "<p class='questao' id='" . $pe['idPergunta'] . "'>" . $pe['respostaCorreta'] . "</p>";
                                }

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
                    } elseif ($ale == 4) {
                        foreach ($idResIn as $num) {
                            echo "<p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p>";
                        };
                        
                        echo "<p class='questao' id='" . $pe['idPergunta'] . "'>" . $pe['respostaCorreta'] . "</p>";
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