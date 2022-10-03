<?php
include "topo.php";
require_once "src/PerguntasDAO.php";

$perguntaDAO = new PerguntasDAO();
$perguntaDAO->cadastrarPerguntas($_POST);

echo "<h3>Pergunta cadastrada com sucesso!</h3>";

?>
<a href="form_cadastro_pergunta.php"><button type="button" class="btn btn-info">Cadastrar mais perguntas</button></a>
<?php
include "rodape.php";
