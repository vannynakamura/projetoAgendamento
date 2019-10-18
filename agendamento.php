<?php
require_once 'AgendamentoDao.php';
require_once 'MedicoDao.php';
require_once 'PacienteDao.php';
include_once 'head.php';


$ag = new AgendamentoDao();

$id = isset($_GET['id']) ? $_GET['id'] : 0; // NULL COALESCE
$agendamento = $ag->find($id);

$idPac = $agendamento['idPaciente'];
$idMed = $agendamento['idMedico'];
$data = $agendamento['data'];
$horario = $agendamento['horario'];

$med = new MedicoDao();
$medicos = $med->findAll();

$pac = new PacienteDao();
$paciente = $pac->findAll();

?>

    <div class="container"  style="color: #c6c8ca" >
        <form id="agendamento" >
            <fieldset>
                <legend class="mt-3" style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 40px" >
                    <i class="fas fa-calendar-plus"></i>
                    Agendamento
                    <br></legend>

                <div class="row" style="border: 1px solid #fff; border-radius: 10px" >

                    <div class="col-md-5 form-group"><br>
                        <input type="hidden" id="idAgendamento" value="<?= $id ?>">
                        <label for="nomeP" class="obrigatorio">Nome do Paciente:</label>
                        <select name="nomeP" id="nomeP" class="form-control form-control-sm required">
                            <option selected>Escolha o nome do Paciente</option>
                            <?php  foreach ($paciente as $pac) : ?>
                                <option value="<?= $pac['id'] ?>" <?= $pac['id'] == $idPac ? 'selected' : '' ?> ><?= $pac['nomePa']?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="col-md-5 form-group"><br>
                        <label for="nomeM" class="obrigatorio">Nome do Médico:</label>
                        <select name="nomeM" id="nomeM" class="form-control form-control-sm required">
                                <option selected>Escolha o nome do Médico</option>
                            <?php  foreach ($medicos as $m) { ?>
                                <option value="<?= $m['idMedico']?>" <?= $m['idMedico'] == $idMed ? 'selected' : '' ?>><?= $m['nomeMed'] . ' - ' . $m['especialidade'] ?></option>
                            <?php } ?>
                        </select>

                    </div>


                    <div class="col-md-4 form-group"><br>
                        <label for="data" class="obrigatorio">Data da Consulta:</label>
                        <input class="form-control form-control-sm required" type="text" value="<?= $data ?>" name="data" id="data" placeholder="Data da Consulta">
                    </div>

                    <div class="col-md-4 form-group"><br>
                        <label for="horario" class="obrigatorio">Horário:</label>
                        <input class="form-control form-control-sm required" type="text" value="<?= $horario ?>" name="horario" id="horario" placeholder="Horario">
                        <br></div>

                </div>
            </fieldset>

            <div class="row mt-2">
                <div class="col-md-12 text-center">
                    <?php if ($id == 0) : ?>
                    <button type="button" onclick="saveJsAgendamento()" class="btn btn-success">Salvar</button>
                    <?php else : ?>
                    <button type="button" onclick="editJsAgendamento()" class="btn btn-warning">Editar</button>
                    <?php endif; ?>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

<?php
include_once 'foot.php';
?>