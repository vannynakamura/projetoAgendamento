<?php

require_once 'MedicoDao.php';
require_once 'PacienteDao.php';
require_once 'AgendamentoDao.php';
require_once 'head.php';

$med = new MedicoDao();
$medicos = $med->findAll();

$pac = new PacienteDao();
$paciente = $pac->findAll();

$ag = new AgendamentoDao();
$agendamento = $ag->findAll();

?>

<div class="container" style="color: #c6c8ca">
    <br>
    <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 40px">
        <i class="fab fa-earlybirds" style="color: #fff"></i>
        Relações de Agendamentos
    </h2>
    <br>
    <br>
    <div class="btn-group; text-right" role="group" aria-label="Exemplo">
        <a href="cadastro.php?tp=P" class="btn btn-outline-light" >
            <i class="fas fa-user-plus"></i>
            Novo Paciente
        </a>
        <a href="cadastro.php?tp=M" class="btn btn-outline-light">
            <i class="fas fa-user-plus"></i>
            Novo Médico
        </a>
        <a href="agendamento.php" class="btn btn-outline-light">
            <i class="fas fa-calendar-plus"></i>
            Novo Agendamento
        </a>
    </div>
    <br>
    <h2 class="text-center; mt-3" style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 30px">Agendamentos</h2>
    <br>
    <table class="table table-hover table-striped table-md " id="tbAgendamentos">
        <thead class="thead-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Paciente</th>
            <th scope="col" class="text-center">Médico</th>
            <th scope="col" class="text-center">Especialidade</th>
            <th scope="col" class="text-center">Data</th>
            <th scope="col" class="text-center">Horário</th>
            <th scope="col" class="text-center">Opções</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($agendamento as $ag) { ?>
        <tr>
            <td> </td>
            <td class="text-center"><?= $ag['nomePaciente']?></td>
            <td class="text-center"><?= $ag['nomeMedico']?></td>
            <td class="text-center"><?= $ag['especialidade']?></td>
            <td class="text-center"><?= $ag['data']?></td>
            <td class="text-center"><?= $ag['horario']?></td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-secondary" onclick="previewAgendamento(<?= $ag['idAgendamento'] ?>)" title="Visualizar Agendamento" >
                    <i class="far fa-eye" style="color: #fff"></i>
                </button>
                <a href="agendamento.php?&id=<?= $ag['idAgendamento'] ?>" class="btn btn-sm btn-secondary" title="Editar Agendamento">
                    <i class="fas fa-edit"></i>
                </a>

                <button type="button" class="btn btn-sm btn-secondary" onclick="deleteJsAgendamento(<?= $ag['idAgendamento']?>)" title="Excluir Agendamento">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>

        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 30px">Médicos</h2>
            <table class="table table-hover table-striped table-md">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nome</th>
                <th scope="col" class="text-center">Especialidade</th>
                <th scope="col" class="text-center">Opções</th>
            </tr>
        </thead>

        <tbody>
        <?php  foreach ($medicos as $item) : ?>
            <tr>
                <td class="text-center"> </td>
                <td class="text-center"><?= $item['nomeMed'] ?></td>
                <td class="text-center"><?= $item['especialidade']?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" title="Visualizar cadastro" onclick="previewMedico(<?= $item['idMedico'] ?>)">
                        <i class="far fa-eye" style="color: #fff"></i>
                    </button>
                    <a href="cadastro.php?tp=M&id=<?= $item['idMedico'] ?>" title="Editar cadastro" class="btn btn-sm btn-secondary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-secondary" onclick="deleteJs(<?= $item['idPessoa']?> , <?= $item['idContato'] ?>)" title="Excluir cadastro">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>

        <div class="col-md-6">
            <h2 class="text-center" style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 30px">Pacientes</h2>
            <table class="table table-hover table-striped table-md">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">CPF</th>
                    <th scope="col" class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach ($paciente as $item) { ?>
                <tr>

                    <td class="text-center"> </td>
                    <td class="text-center"><?= $item['nomePa']?></td>
                    <td class="text-center"><?= $item['cpf']?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" onclick="previewPaciente(<?= $item['id']?>)" title="Visualizar Cadastro">
                            <i class="far fa-eye" style="color: #fff"></i>
                        </button>
                        <a href="cadastro.php?tp=P&id=<?= $item['id'] ?>" class="btn btn-sm btn-secondary" title="Editar Cadastro">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-secondary" onclick="deleteJs(<?= $item['idPessoa']?> , <?= $item['idContato']?>)" title="Excluir Cadastro">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>

                </tr>
                <?php }?>

                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>

    <!-- Modal para visualizar cadastros -->
    <div class="modal fade" id="visualizarAgendamento" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <!-- Cabeçalho -->
                <div class="modal-header">
                    <h5 class="modal-title">Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Conteúdo principal -->
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Paciente:</th>
                            <td><span id="agPaciente"></span></td>
                        </tr>
                        <tr>
                            <th>Médico:</th>
                            <td><span id="agMedico"></span> - <strong>CRM: </strong><span id="agCrm"></span></td>
                        </tr>
                        <tr>
                            <th>Especialidade:</th>
                            <td><span id="agEspecialidade"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Horário:</th>
                            <td><span id="agData"></span> - <span id="agHorario"></span></td>
                        </tr>
                    </table>
                </div>

                <!-- Rodapé -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div> <!-- Fim do Conteúdo da div -->

        </div>
    </div>


    <!-- Modal para visualizar cadastros de medicos-->
    <div class="modal fade" id="visualizarMedico" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <!-- Cabeçalho -->
                <div class="modal-header">
                    <h5 class="modal-title">Médico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Conteúdo principal -->
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Médico:</th>
                            <td><span id="meMedico"></span> - <strong>CRM: </strong><span id="meCrm"></span></td>
                        </tr>
                        <tr>
                            <th>Especialidade:</th>
                            <td><span id="meEspecialidade"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Telefone:</th>
                            <td><span id="meTelefone"></span> - <strong>E-mail: </strong><span id="meEmail"></span></td>
                        </tr>
                    </table>
                </div>

                <!-- Rodapé -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div> <!-- Fim do Conteúdo da div -->

        </div>
    </div>

    <!-- Modal para visualizar cadastros de medicos-->
    <div class="modal fade" id="visualizarPaciente" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <!-- Cabeçalho -->
                <div class="modal-header">
                    <h5 class="modal-title">Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Conteúdo principal -->
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Paciente:</th>
                            <td><span id="paPaciente"></span> - <strong>CPF: </strong><span id="paCpf"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Telefone:</th>
                            <td><span id="paTelefone"></span> - <strong>E-mail: </strong><span id="paEmail"></span></td>
                        </tr>
                    </table>
                </div>

                <!-- Rodapé -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div> <!-- Fim do Conteúdo da div -->

        </div>
    </div>
</div>
<?php
require_once 'foot.php';
