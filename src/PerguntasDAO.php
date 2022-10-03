<?php

require_once "ConexaoBD.php";

class PerguntasDAO {

    function consultarPerguntasRand() {
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT * FROM perguntas ORDER BY RAND() limit 10";

        $resultado = $conexao->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    function consultarIncorretas($idPergunta) {
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 FROM perguntas WHERE idPergunta = " . $idPergunta['idPergunta'];

        $resultado = $conexao->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    function consultarPerguntas(){
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT (pergunta, respostaIncorreta1, respostaIncorreta2, respostaIncorreta3, respostaCorreta) FROM perguntas";

        $resultado = $conexao->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    function consultarRows(){
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT COUNT(*) FROM perguntas";

        $res = $conexao->query($sql);

        return $rows = $res->fetchColumn();
    }

    function cadastrarPerguntas($dados){
        $conexao = ConexaoBD::getConexao();

        $sql = "INSERT INTO perguntas (pergunta, respostaIncorreta1, respostaIncorreta2, respostaIncorreta3, respostaCorreta) VALUES ('{$dados['pergunta']}','{$dados['respostaIncorreta1']}','{$dados['respostaIncorreta2']}','{$dados['respostaIncorreta3']}', '{$dados['respostaCorreta']}')";

        return $conexao->exec($sql);
    }

    function editarPergunta($dados){
        $conexao = ConexaoBD::getConexao();

        $sql = "UPDATE perguntas SET pergunta = '{$dados['pergunta']}', respostaIncorreta1 = '{$dados['respostaIncorreta1']}', respostaIncorreta2 = '{$dados['respostaIncorreta2']}', respostaIncorreta3 = '{$dados['respostaIncorreta3']}', respostaCorreta = '{$dados['respostaCorreta']}' WHERE idpergunta = '{$dados['idpergunta']}'";

        $conexao->exec($sql);
    }

    function removerPergunta($idpergunta){
        $conexao = ConexaoBD::getConexao();

        $sql = "DELETE FROM perguntas WHERE idpergunta='$idpergunta'";

        $conexao->exec($sql);
    }
}