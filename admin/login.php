<?php
if (!defined('STDIN')) {
    echo "Acesso não autorizado!";
}else{
    require_once "../src/UsuarioDAO.php";

    $senha = md5($_POST['senha']);
    $nomeUsuario = $_POST['nomeUsuario'];
    
    $UsuarioDAO = new UsuarioDAO();
    $usuarioBD = $UsuarioDAO->consultarUsuario();
    
    if ($senha == $usuarioBD['senha'] && $nomeUsuario == $usuarioBD['nomeUsuario']) {
        header("Location:index.php");
    } else {
        header("Location:form_login.php?email=$nomeUsuario&msg=Senha ou usuario incorretos");
    }
}