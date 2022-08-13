<?php
if ($acao == '' && $param == '') { echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit; }
if ($acao == 'updatePessoa' && $param == '') { echo json_encode(['ERRO' => "É necessário informar um usuário."]); exit; }

if ($acao == 'updatePessoa' && $param != '') {

    array_shift($_POST);

    $sql = "UPDATE pessoa_fisica SET ";

    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "{$indice} = '{$_POST[$indice]}', ";
        } else {
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y/m/d h:i:s a', time());
            $sql .= "{$indice} = '{$_POST[$indice]}',updated_at = '{$date}' ";
        }
        $contador++;
    }

    $sql .= "WHERE id={$param}";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
        echo json_encode(["dados" => 'Dados atualizados com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve erro ao atualizar dados.']);
    }

}
?>