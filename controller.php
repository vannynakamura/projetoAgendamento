<?php
header('Content-type: application/json');

require 'PessoaDao.php';
require 'ContatoDao.php';
require 'MedicoDao.php';
require 'PacienteDao.php';
require 'AgendamentoDao.php';

$m = new MedicoDao();
$pa = new PacienteDao();
$p = new PessoaDao();
$c = new ContatoDao();

// =========================== (INÍCIO) Usado apenas em caso de exclusão de médicos/pacientes ==========================
if (isset($_GET['del'])) {
    $dados['sucesso'] = false;
    $response = $p->delete($_GET['id']);

    if ($response) {
        $response2 = $c->delete($_GET['id']);
        if ($response && $response2) {
            $dados['sucesso'] = true;
        }
    }

    echo json_encode(($dados));
    exit;
}

// ======================== (INÍCIO) Usados apenas em casos de listagens de elementos ==================================
if (isset($_GET['consultaM'])) {
    // Em $_GET['consultaM'] terá o id do medico
    $dados = $m->find($_GET['consultaM']);

    echo json_encode($dados);
    exit;
}



if (isset($_GET['consultaP'])) {
    // Em $_GET['consultaP'] terá o id do paciente
    $dados = $pa->find($_GET['consultaP']);

    echo json_encode($dados);
    exit;
}
// ======================== (FIM) Usados apenas em casos de listagens de elementos =====================================
$p->setNome($_POST['nome'])
    ->setSobrenome($_POST['sobrenome'])
    ->setSexo($_POST['sexo'])
    ->setNascimento($_POST['nascimento'])
    ->setCpf($_POST['cpf'])
    ->setEstadoCivil($_POST['estadoCivil'])
    ;


$c->setEmail($_POST['email'])
    ->setTelefone($_POST['telefone'])
    ->setEndereco($_POST['endereco'])
    ->setNumero($_POST['numero'])
    ->setCep($_POST['cep'])
    ->setCidade($_POST['cidade'])
    ->setEstado($_POST['estado'])
    ;

// Se o formulário for de edição ...
if ($_POST['idPacMed'] != 0) {
    $p->setId($_POST['idPessoa']);
    $c->setId($_POST['idContato']);

    $teste1 = $p->update();

    if ($teste1) {
        $teste2 = $c->update();
    }

    if (isset($_POST['especialidade'])) {
        // É médico e está editando o cadastro!
        $m->setId($_POST['idPacMed']);
        $m->setEspecialidade($_POST['especialidade']);
        $m->setCrm($_POST['crm']);

        $medico = true;

        $teste3 = $m->update();

    } else {
        // É paciente em modo de edição!

        $medico = false;
        $teste3 = true;


    }
} else {
    $teste1 = $p->save();
    $teste2 = false;

    if ($teste1) {
        $teste2 = $c->save();
    }

    $medico = false;

    //isset($_POST['especialidade']) == true; é médico; senão; paciente

    if (isset($_POST['especialidade'])) {
        $m->setEspecialidade($_POST['especialidade']);
        $m->setCrm($_POST['crm']);
        $m->setPessoa($p->getId());
        $m->setContato($c->getId());

        $medico = true;

        $teste3 = $m->save();
    } else {
        $pa->setPessoa($p->getId());
        $pa->setContato($c->getId());

        $teste3 = $pa->save();
    }
}

$arr = array();

if ($teste1 && $teste2 && $teste3) {
    $arr['nome'] = $p->getNome();
    $arr['sobrenome'] = $p->getSobrenome();
    $arr['tipo'] = $medico ? 'M' : 'P';
    $arr['sucesso'] = true;
} else {
    $arr['nome'] = $p->getNome();
    $arr['sobrenome'] = $p->getSobrenome();
    $arr['tipo'] = $medico ? 'M' : 'P';
    $arr['sucesso'] = false;
}

echo json_encode($arr);
