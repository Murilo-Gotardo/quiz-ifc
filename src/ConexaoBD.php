<?php

class ConexaoBanco{
    public static function getConexao(): PDO
    {
        $conexaoBD = new PDO("mysql:host=localhost;dbname=quiz-ifc", "root", "maiconifc");
        return $conexaoBD;
    }
};
