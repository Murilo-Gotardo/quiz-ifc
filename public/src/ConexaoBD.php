<?php

class ConexaoBD{
    public static function getConexao(): PDO
    {
        $conexaoBD = new PDO("mysql:host=quiz-mysql-1;dbname=quiz-ifc", "root", "1234");
        return $conexaoBD;
    }
};
