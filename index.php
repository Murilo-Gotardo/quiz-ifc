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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
    <div id="particles-js" class="particula-1"></div>
    <div id="inicio" class="inicio">
        <div class="container-inicio">
            <div class="logo">
                <h1>QUIZ<br>IFC
                </h1>
            </div>
            <div class="dev">
                <h2>Desenvolvido por<br>Maicon da Silva e<br>Murilo Gotardo</h2>
            </div>
            <div class="botao-iniciar">
                <h1 onclick="iniciar(); progresso0();">Iniciar</h1>
            </div>
        </div>
    </div>
        

        
        <div id="progresso" class="progresso">
                <div class="progresso1" id="progresso1"></div>
                <div class="progresso2" id="progresso2"></div>
                <div class="progresso3" id="progresso3"></div>
                <div class="progresso4" id="progresso4"></div>
                <div class="progresso5" id="progresso5"></div>
                <div class="progresso6" id="progresso6"></div>
                <div class="progresso7" id="progresso7"></div>
                <div class="progresso8" id="progresso8"></div>
                <div class="progresso9" id="progresso9"></div>
                <div class="progresso10" id="progresso10"></div>

        </div>
        <div id="questoes" class="questoes">
            
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
            $sqlPerguntas = "SELECT * FROM perguntas ORDER BY RAND() limit 10";
            $resultadoP = $conexao->query($sqlPerguntas);
            $perguntas = $resultadoP->fetchAll(PDO::FETCH_ASSOC);


            $contQuest = 0;

            foreach ($perguntas as $pe) {
                //Respostas Incorretas
                $sqlRespostasIncorretas = "SELECT respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 FROM perguntas WHERE idPergunta = " . $pe['idPergunta'];
                $resultadoIn = $conexao->query($sqlRespostasIncorretas);
                $respostasIncorretas = $resultadoIn->fetchAll(PDO::FETCH_ASSOC);


                $contQuest++;

                echo "<div class='box' id='box-".$contQuest."'>";
                
                //Impressão da pergunta
                echo "<div class='pergunta'><p class='questao pergunta' id='" . $pe['idPergunta'] . "'>" . $pe['pergunta'] . "</p></div>";
                foreach ($respostasIncorretas as $reIn) {
                    $idResIn = excluiSelecionados(3, 4, [4]);

                    $ale = rand(1, 4);
                    //$ale será usado para selecionar, de forma aleatoria, a composição da questão na estrutura de condicionamento a seguir
                    //Resposta Correta ocupará a primeira posição na questão
                    if ($ale == 1) {

                        echo "<div onclick='proximo".$contQuest."(); AltCerta".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res' id='c".$contQuest."'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";

                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                        };
                    }
                    //Resposta Correta ocupará a segunda posição na questão 
                    elseif ($ale == 2) {
                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                            $cont++;

                            //Garante que será executado apenas uma vez
                            if ($cont == 1) {
                                echo "<div onclick='proximo".$contQuest."(); AltCerta".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res' id='c".$contQuest."'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";
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
                                echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."();' class='div-res errado".$contQuest."; regular".$contQuest."();'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";

                                //Aleatoriza $num para que seja diferente de sua entrada no foreach
                                if ($num == 1) {
                                    $num = rand(2, 3);
                                } elseif ($num == 3) {
                                    $num = rand(1, 2);
                                }

                                echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";


                                echo "<div onclick='proximo".$contQuest."(); AltCerta".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res' id='c".$contQuest."'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";


                                //verifica o valor de $num, em sua entrada no foreach, para impedir que a última questão se repita 
                                if ($num != 2 && $num != 3) {
                                    $num = 1;
                                    echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                                } elseif ($num != 1 && $num != 3) {
                                    $num = 2;
                                    echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                                } elseif ($num != 1 && $num != 2) {
                                    $num = 3;
                                    echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                                }
                            }
                        };

                        $cont = 0;
                    }
                    //Resposta Correta ocupará a quarta posição na questão 
                    elseif ($ale == 4) {
                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res errado".$contQuest."'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                        };

                        echo "<div onclick='proximo".$contQuest."(); AltCerta".$contQuest."(); progresso".$contQuest."(); regular".$contQuest."();' class='div-res' id='c".$contQuest."'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";
                    }
                };
                echo "<div class='box-span' id='box-span".$contQuest."'></div>";
            echo "</div>";
            
            };
            ?>
        </div>
            <div class="d-flex justify-content-center pontos-container">
            <div id="pontos" class="pontos-div d-flex justify-content-center">
                <p id="porcentagem" class="pontos m-0">Acertos: 0/10</p>
            </div>
            </div>
        <div>
            <div class="tempo">
                <div class="tempo1" id="tempo1"></div>
                <div class="tempo2" id="tempo2"></div>
                <div class="tempo3" id="tempo3"></div>
                <div class="tempo4" id="tempo4"></div>
                <div class="tempo5" id="tempo5"></div>
                <div class="tempo6" id="tempo6"></div>
                <div class="tempo7" id="tempo7"></div>
                <div class="tempo8" id="tempo8"></div>
                <div class="tempo9" id="tempo9"></div>
                <div class="tempo10" id="tempo10"></div>
                <div class="tempo11" id="tempo11"></div>
                <div class="tempo12" id="tempo12"></div>
                <div class="tempo13" id="tempo13"></div>
                <div class="tempo14" id="tempo14"></div>
                <div class="tempo15" id="tempo15"></div>
            </div>
        </div>
        <div class="obrigado d-flex justify-content-center align-items-center" id="obrigado">
            <div>
                <div class="text-center txt1-obrigado">
                    <h1>OBRIGADO<br>POR<br>PARTICIPAR!</h1>
                </div>
                <div class="text-center txt2-obrigado">
                    <h1 id="acertos">Você acertou 0%<br>das questões</h1>
                </div>
                <div class="text-center botao-fim" onClick="window.location.reload()"><h1>Jogar novamente</h1></div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/json.js"></script>
    <script src="js/vanilla.js"></script>
    <script type="text/javascript">
	VanillaTilt.init(document.querySelector(".inicio"), {
		max: 10,
		speed: 900,
        scale: 1.15,
        glare: true,
        "max-glare": 0.12,
	});

    VanillaTilt.init(document.querySelector(".obrigado"), {
		max: 10,
		speed: 900,
        scale: 1.15,
        glare: true,
        "max-glare": 0.12,
	});
	
    VanillaTilt.init(document.querySelector(".questoes"), {
        max:3,
		speed: 900,
        scale: 1,
        glare: true,
        "max-glare": 0.05,
	});

</script>
</body>

</html>