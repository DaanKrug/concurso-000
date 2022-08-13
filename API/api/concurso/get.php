<?php
if ($acao == '' && $param == '') { echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit; }

if ($acao == 'cidade' && $param == '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM cidade ORDER BY nome");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}

if ($acao == 'cidade' && $param != '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM cidade WHERE cidade_id={$param}");
    $rs->execute();
    $obj = $rs->fetchObject();

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}
if ($acao == 'estado' && $param == '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT estado_id,sigla FROM estado ORDER BY sigla");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}

if ($acao == 'estado' && $param != '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT estado_id,sigla FROM estado WHERE estado_id={$param}");
    $rs->execute();
    $obj = $rs->fetchObject();

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}
if ($acao == 'pessoa_fisica' && $param == '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT cpf FROM pessoa_fisica");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}

if ($acao == 'pessoa_fisica' && $param != '') {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM pessoa_fisica WHERE id={$param}");
    $rs->execute();
    $obj = $rs->fetchObject();

    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}