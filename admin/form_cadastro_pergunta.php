<?php
include "topo.php";
require_once "src/PerguntasDAO.php";

$perguntasDAO = new PerguntasDAO;
$consulta = $perguntasDAO->consultarRows();
?>
<h3 class="mt-2 mb-5">Cadastro das perguntas e respostas</h3>

<form method="POST" enctype="multipart/form-data" action="cadastro_pergunta.php" class="container bg-secondary w-75 p-5">
    <div class="mb-3">
        <label for="pergunta" class="form-label">Pergunta</label>
        <input type="text" name="pergunta" id="pergunta" class="form-control">
    </div>

    <div class="mb-3">
        <label for="respostaIncorreta1" class="form-label">Primeira resposta incorreta</label>
        <input type="text" name="respostaIncorreta1" id="respostaIncorreta1" class="form-control">
    </div>

    <div class="mb-3">
        <label for="respostaIncorreta2" class="form-label">Segunda resposta incorreta</label>
        <input type="text" name="respostaIncorreta2" id="respostaIncorreta2" class="form-control">
    </div>

    <div class="mb-3">
        <label for="respostaIncorreta3" class="form-label">Terceira resposta incorreta</label>
        <input type="text" name="respostaIncorreta3" id="respostaIncorreta3" class="form-control">
    </div>

    <div class="mb-3">
        <label for="respostaCorreta" class="form-label">Resposta correta</label>
        <input type="text" name="respostaCorreta" id="respostaCorreta" class="form-control">
    </div>

    <div>
        <label for="respostaCorreta" class="form-label">Perguntas já cadastradas: <?=$consulta?></label>
    </div>

    <button type="submit" class="btn btn-info">Cadastrar</button>

</form>

<?php
include "rodape.php";
