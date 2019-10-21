<?php
    include_once 'head.php';
    require_once 'MedicoDao.php';
    require_once 'PacienteDao.php';

    $tipo = $_GET['tp'];

if ($tipo == 'M') {
    $med = new MedicoDao();

    $id = isset($_GET['id']) ? $_GET['id'] : 0; // NULL COALESCE
    $medicos = $med->find($id);

    $idPessoa = $medicos['idPessoa'];
    $idContato = $medicos['idContato'];
    $nome = $medicos['nome'];
    $sobrenome = $medicos['sobrenome'];
    $checkF = $medicos['sexo'] === 'F' ? 'checked' : '';
    $checkM = $medicos['sexo'] === 'M' ? 'checked' : '';
    $nascimento = $medicos['nascimento'];
    $cpf = $medicos['cpf'];
    $estado_Civil = $medicos['estado_Civil'];
    $email = $medicos['email'];
    $telefone = $medicos['telefone'];
    $endereco = $medicos['endereco'];
    $numero = $medicos['numero'];
    $cep = $medicos['cep'];
    $cidade = $medicos['cidade'];
    $estado = $medicos['estado'];
    $especialidade = $medicos['especialidade'];
    $crm = $medicos['crm'];


} else {
    $pac = new PacienteDao();
    $id = isset($_GET['id']) ? $_GET['id'] : 0; // NULL COALESCE
    $paciente = $pac->find($id);

    $idPessoa = $paciente['idPessoa'];
    $idContato = $paciente['idContato'];
    $nome = $paciente['nome'];
    $sobrenome = $paciente['sobrenome'];
    $checkF = $paciente['sexo'] === 'F' ? 'checked' : '';
    $checkM = $paciente['sexo'] === 'M' ? 'checked' : '';
    $nascimento = $paciente['nascimento'];
    $cpf = $paciente['cpf'];
    $estado_Civil = $paciente['estado_Civil'];
    $email = $paciente['email'];
    $telefone = $paciente['telefone'];
    $endereco = $paciente['endereco'];
    $numero = $paciente['numero'];
    $cep = $paciente['cep'];
    $cidade = $paciente['cidade'];
    $estado = $paciente['estado'];
}

    if ($id === 0) {
        $checkF = 'checked';
    }
//var_dump($medicos);
$arrEstadoCivis = [
    ['value' => "S", 'txt' => 'Solteiro'],
    ['value' => "C", 'txt' => 'Casado'],
    ['value' => "V", 'txt' => 'Viúvo'],
    ['value' => "D", 'txt' => 'Divorciado'],
    ['value' => "U", 'txt' => 'União Estável']
];

$arrEstado = [
    ['value' => "1", 'txt' => 'Paraná'],
    ['value' => "2", 'txt' => 'Bahia'],
    ['value' => "3", 'txt' =>'Amazonas'],
    ['value' => "4", 'txt' => 'Goiás'],
    ['value' => "5", 'txt' =>'Pará'],
    ['value' => "6", 'txt' => 'Ceará'],
    ['value' => "7", 'txt' => 'Alagoas'],
    ['value' => "8", 'txt' => 'Paraíba'],
    ['value' => "9", 'txt' => 'Maranhão'],
    ['value' => "10", 'txt' => 'Piauí'],
    ['value' => "11", 'txt' => 'Sergipe'],
    ['value' => "12", 'txt' => 'Amapá'],
    ['value' => "13", 'txt' => 'Roraima'],
    ['value' => "14", 'txt' => 'Acre']
];

?>

    <div class="container"  style="color: #c6c8ca" >
        <form id="formulario" >
            <fieldset>
                <legend style="font-family: Arial, Helvetica, sans-serif; color: #80bdff; text-align: center; font-size: 40px" >
                    <i class="fas fa-user-plus"></i>
                    <?php if ($tipo == 'M') { ?>
                        NOVO MÉDICO
                    <?php } else { ?>
                        NOVO PACIENTE
                    <?php } ?>
                    <br></legend>

                <div class="row" style="border: 1px solid #fff; border-radius: 10px" >

                    <div class="col-md-12 form group">
                        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #5f9db2; text-align: center; font-size: 30px"><br>
                            Dados Pessoais <br><br><br>
                            </h4>
                    </div>

                <div class="col-md-4 form-group">
                    <label for="nome" class="obrigatorio">Nome:</label>
                    <input type="hidden" id="idPacMed" value="<?= $id ?>">
                    <input type="hidden" id="idPessoa" value="<?= $idPessoa ?>">
                    <input type="hidden" id="idContato" value="<?= $idContato ?>">
                    <input class="form-control form-control-sm required" type="text" value="<?= $nome ?>" name="nomePessoa" id="nome" placeholder="Nome">
                </div>

                <div class="col-md-4 form-group">
                    <label for="sobrenome" class="obrigatorio">Sobrenome:</label>
                    <input class="form-control form-control-sm required" type="text"  value="<?= $sobrenome ?>"  name="sobrenomePessoa" id="sobrenome" placeholder="Sobrenome">
                </div>

                <div class="col-md-4 form-group">
                    <label for="" class="obrigatorio">Sexo:</label>
                    <div>
                        <div class="form-check form-check-inline" style="color: #7eb29a">
                            <input type="radio" class="form-check-input" name="sexoPessoa" id="sexoPessoaF" value="F" <?= $checkF ?> >
                            <label class="form-check-label" for="sexoPessoaF">Feminino</label>
                        </div>

                        <div class="form-check form-check-inline" style="color: #7eb29a">
                            <input type="radio" class="form-check-input" name="sexoPessoa" id="sexoPessoaM" value="M" <?= $checkM ?> >
                            <label class="form-check-label" for="sexoPessoaM">Masculino</label>
                        </div>
                    </div>
                </div>

               <div class="col-md-4 form-group">
                   <label for="nascimento" class="obrigatorio">Nascimento:</label>
                   <input class="form-control form-control-sm required" type="text" name="nascimentoPessoa" value="<?= $nascimento ?>"  id="nascimento" placeholder="Nascimento">
               </div>

               <div class="col-md-4 form-group">
                   <label for="cpf" class="obrigatorio">CPF:</label>
                   <input class="form-control form-control-sm required" type="text" name="cpfPessoa"  value="<?= $cpf ?>" id="cpf" placeholder="CPF">
               </div>

               <div class="col-md-4 form-group">
                   <label for="estadoCivil" class="obrigatorio">Estado Civil:</label>
                   <select class="form-control form-control-sm required" name="estadoCivil" id="estadoCivil">
                       <option value="" >Escolher...</option>
                       <?php foreach ($arrEstadoCivis as $item) { ?>
                            <option value="<?= $item['value'] ?>" <?= $item['value'] === $estado_Civil ? 'selected' : '' ?> ><?= $item['txt'] ?></option>
                       <?php } ?>
                   </select>

               <br></div>
                </div>
                <?php if ($tipo == 'M') { ?>
                <div class="row mt-5" style="border: 1px solid #fff; border-radius: 10px">
                    <div class="col-md-12 form group">


                        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #5f9db2; text-align: center; font-size: 30px"><br>
                            Detalhes<br><br><br>
                        </h4>
                        </div>

                            <div class="col-md-4 form-group">
                                <label for="especialidade" class="obrigatorio">Especialidade:</label>
                                <input class="form-control form-control-sm required" type="text"  value="<?= $especialidade ?>" name="especialidade" placeholder="Especialidade" id="especialidade">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="crm" class="obrigatorio">CRM:</label>
                                <input type="text" class="form-control form-control-sm required"  value="<?= $crm ?>" name="crm" placeholder="CRM" id="crm">
                            </div>

                </div>
                <?php } ?>

                    <div class="row mt-5" style="border: 1px solid #fff; border-radius: 10px">

                      <div class="col-md-12 form group">
                        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #5f9db2; text-align: center; font-size: 30px"><br>
                            Contato<br><br><br>
                        </h4>
                      </div>
                        <div class="col-md-4 form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control form-control-sm" type="text" name="emailPessoal"  value="<?= $email ?>" id="email" placeholder="E-mail">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="telefone" class="obrigatorio">Telefone:</label>
                            <input class="form-control form-control-sm required" type="text" name="telefonePessoal"  value="<?= $telefone ?>" id="telefone" placeholder="Telefone">
                        </div>


                        <div class="col-md-4 form-group">
                            <label for="endereco" class="obrigatorio">Endereço:</label>
                            <input class="form-control form-control-sm required" type="text" name="enderecoPessoal"  value="<?= $endereco ?>" id="endereco" placeholder="Endereço">

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="numero" class="obrigatorio">Número:</label>
                            <input class="form-control form-control-sm required" type="text" name="numero"  value="<?= $numero ?>" id="numero" placeholder="Número">

                        </div>

                        <div class="col-md-3 form-group">
                            <label for="cep" class="obrigatorio">CEP:</label>
                            <input class="form-control form-control-sm required" type="text" name="cep"  value="<?= $cep ?>" id="cep" placeholder="CEP">

                        </div>

                        <div class="col-md-3 form-group">
                            <label for="cidade" class="obrigatorio">Cidade:</label>
                            <input class="form-control form-control-sm required" type="text" name="cidade"  value="<?= $cidade ?>" id="cidade" placeholder="Cidade">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="estado" class="obrigatorio">Estado:</label>
                            <select id="estado" name="estado" class="form-control form-control-sm required">
                                <option selected>Escolher...</option>
                                <?php foreach ($arrEstado as $item) { ?>
                                    <option value="<?= $item['value'] ?>" <?= $item['value'] === $estado ? 'selected' : '' ?> ><?= $item['txt'] ?></option>
                                <?php } ?>

                            </select>

                        <br></div>

                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label mr-3" for="aceitaTermos">Aceito os termos</label>
                                <input type="checkbox" name="aceitaTermos" id="aceitaTermos">
                            </div>
                        </div>
                </div>
            </fieldset>


            <div class="row mt-2">
                <div class="col-md-12 text-center">
                        <?php if ($id == 0): ?>
                            <button type="button" onclick="saveJs()" class="btn btn-success">Salvar</button>
                        <?php else: ?>
                            <button type="button" onclick="editJs()" class="btn btn-warning">Editar</button>
                        <?php endif; ?>
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

<?php
    include_once 'foot.php';
?>