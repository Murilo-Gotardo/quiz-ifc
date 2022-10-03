<?php
require_once "ConexaoBD.php";

class UsuarioDAO {

    function consultarUsuario($nomeusuario, $senha) {
        $conexao = ConexaoDB::getConexao();

        $senhaCripto = md5($senha);

        $sql = "SELECT * FROM usuario WHERE nomeUsuario = '$nomeusuario' AND senha = '$senhaCripto'";

        $resultado = $conexao->query($sql);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
