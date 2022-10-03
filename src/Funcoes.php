<?php

class Funcoes{

    function excluiSelecionados(int $quantidade, int $maximo, array $excluidos): array {

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
    }
}