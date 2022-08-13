<?php
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho não encontrado!']);
    exit;
}

if ($acao == 'adiciona' && $param == '') {
    $sql = "INSERT INTO concurso.pessoa_fisica (";
    $contador = 1;

    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "$indice,";
        } else {
            $sql .= "$indice,created_at";
        }
        $contador++;
    }
    $sql .= ") VALUES (";
    $contador = 1;
    foreach (array_values($_POST) as $valor) {
        if (count($_POST) > $contador) {
            if ($contador == 2) {
                $quebra = explode(".", $valor);

                $quebra2 = explode("-", $quebra[2]);

                $junta = $quebra[0] . $quebra[1] . $quebra2[0] . $quebra2[1];
                $valor = $junta;
            }
            $sql .= "'{$valor}',";
        } else {
            date_default_timezone_set('America/Sao_Paulo');
$date = date('Y/m/d h:i:s a', time());
            $sql .= "'{$valor}','{$date}'";
        }
        $contador++;
    }
    $sql .= ")";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();
    if ($exec) {
        echo json_encode(["dados" => 'Dados foram inseridos com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve algum erro ao inserir os dados.']);
    }
}