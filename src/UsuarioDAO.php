<?php
require_once "ConexaoBD.php";

class UsuarioDAO {

    function consultarUsuario($nomeUsuario, $senha) {
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT * FROM usuario WHERE nomeUsuario = '$nomeUsuario' AND senha = '$senha'";

        $resultado = $conexao->query($sql);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
