<?php
require_once "src/PerguntasDAO.php";
require_once "src/Funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUIZ-IFC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
    <div id="particles-js" class="particula-1"></div>
    <div id="inicio" class="inicio">
        <div class="container-inicio">
            <div class="logo">
                <h1>QUIZ<br>IFC</h1>
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
            <?php
            $progressoCont = 1;
                for ($i=0; $i < 11; $i++) { 
                    echo "<div class='progresso" . $progressoCont . "'id='progresso" . $progressoCont . "'></div>";
                    $progressoCont++;
                }
            ?>
        </div>
        <div id="questoes" class="questoes">
            
            <?php

            $funcoes = new Funcoes;

            $cont = 0;
            //Perguntas
            $perguntasDAO = new PerguntasDAO;

            $perguntas = $perguntasDAO->consultarPerguntasRand();

            $contQuest = 0;

            foreach ($perguntas as $pe) {
                //Respostas Incorretas
                $respostasIncorretas = $perguntasDAO->consultarIncorretas($pe);

                $contQuest++;

                echo "<div class='box' id='box-" . $contQuest . "'>";
                
                //Impressão da pergunta
                echo "<div class='pergunta'><p class='questao pergunta' id='" . $pe['idPergunta'] . "'>" . $pe['pergunta'] . "</p></div>";
                foreach ($respostasIncorretas as $reIn) {
                    $idResIn = $funcoes->excluiSelecionados(3, 4, [4]);

                    $ale = rand(1, 4);
                    //$ale será usado para selecionar, de forma aleatoria, a composição da questão na estrutura de condicionamento a seguir
                    //Resposta Correta ocupará a primeira posição na questão
                    if ($ale == 1) {

                        echo "<div onclick='proximo" . $contQuest . "(); AltCerta" . $contQuest . "(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res' id='c" . $contQuest . "'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";

                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo" . $contQuest . "(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res errado" . $contQuest . "'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                        };
                    }
                    //Resposta Correta ocupará a segunda posição na questão 
                    elseif ($ale == 2) {
                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo" . $contQuest."(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res errado" . $contQuest . "'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                            $cont++;

                            //Garante que será executado apenas uma vez
                            if ($cont == 1) {
                                echo "<div onclick='proximo" . $contQuest."(); AltCerta" . $contQuest."(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res' id='c" . $contQuest . "'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";
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

                                $num = range(1, 3);
                                shuffle($num);

                                foreach ($num as $n) {
                                    
                                    echo "<div onclick='proximo" . $contQuest . "(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res errado" . $contQuest. "'><p class='questao'>" . $reIn['respostaIncorreta' . $n] . "</p></div>";
                                    if ($cont == 2) {
                                        echo "<div onclick='proximo".$contQuest."(); AltCerta" . $contQuest . "(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res' id='c" . $contQuest . "'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";
                                    }
                                    $cont++;
                                } 
                            }
                        };
                        $cont = 0;
                    }
                    //Resposta Correta ocupará a quarta posição na questão 
                    elseif ($ale == 4) {
                        foreach ($idResIn as $num) {
                            echo "<div onclick='proximo" . $contQuest . "(); progresso" . $contQuest . "(); regular" . $contQuest . "();' class='div-res errado" . $contQuest . "'><p class='questao'>" . $reIn['respostaIncorreta' . $num] . "</p></div>";
                        };

                        echo "<div onclick='proximo" . $contQuest . "(); AltCerta" . $contQuest . "(); progresso" . $contQuest . "(); regular" .$contQuest . "();' class='div-res' id='c" . $contQuest . "'><p class='questao'>" . $pe['respostaCorreta'] . "</p></div>";
                    }
                };
                ?>
                <div class="box-span" id="box-span<?=$contQuest?>"></div>
            </div>
            <?php
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

                <?php
                $tempoCont = 1;
                    for ($i=0; $i < 11; $i++) { 
                        echo "<div class='tempo" . $tempoCont . "' id='tempo" . $tempoCont . "'></div>";
                        $tempoCont++;
                    }
                ?>
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