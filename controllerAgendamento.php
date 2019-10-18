<?php
header('Content-type: application/json');
require 'AgendamentoDao.php';

$ag = new AgendamentoDao();

// =========================== (INÍCIO) Usado apenas em caso de exclusão de Agendamento ==========================
if (isset($_GET['del'])) {
    $dados['sucesso'] = false;
    $response = $ag->delete($_GET['id']);
    if ($response) {
        $dados['sucesso'] = true;
    }

    echo json_encode(($dados));
    exit;
}

if (isset($_GET['consulta'])) {
    // Em $_GET['consulta'] terá o id do agendamento
    $dados = $ag->find($_GET['consulta']);

    echo json_encode($dados);
    exit;
}

//-----------------------------------------//

$ag->setNomeP($_POST['nomeP'])
    ->setNomeM($_POST['nomeM'])
    ->setData($_POST['data'])
    ->setHorario($_POST['horario'])
;

if ($_POST['idAgendamento'] != 0) {
    // Modo de edição
    $ag->setId($_POST['idAgendamento']);
    $teste1 = $ag->update();
} else {
    // Modo cadastro
    $teste1 = $ag->save();
}

$arr = array();
    if ($teste1) {
        $arr['nomeP'] = $ag->getNomeP();
        $arr['nomeM'] = $ag->getNomeM();
        $arr['data'] = $ag->getData();
        $arr['horario'] = $ag->getHorario();
        $arr['sucesso'] = true;
    } else {
        $arr['nomeP'] = $ag->getNomeP();
        $arr['nomeM'] = $ag->getNomeM();
        $arr['data'] = $ag->getData();
        $arr['horario'] = $ag->getHorario();
        $arr['sucesso'] = false;
    }

echo json_encode($arr);
