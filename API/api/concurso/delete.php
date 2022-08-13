<?php

if ($acao == '' && $param == '') { echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit; }

if ($acao == 'deletePessoa' && $param == '') { echo json_encode(['ERRO' => "É necessário informar um cliente."]); exit; }

if ($acao == 'deletePessoa' && $param != '') {

    $db = DB::connect();
    $rs = $db->prepare("DELETE FROM pessoa_fisica WHERE id={$param}");
    $exec = $rs->execute();

    if ($exec) {
        echo json_encode(["dados" => 'Dados foram excluidos com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve algum erro ao excluir os dados.']);
    }
}