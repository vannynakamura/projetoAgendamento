function aceita() {
    // JS Puro
    //*** var check = document.getElementById('aceitaTermos').checked;
    // jQuery
    var check = $('#aceitaTermos').is(':checked');

    if (!check) {
        swal("É necessário aceitar os termos para realizar o cadastro");

        return false;
    }

    validaDados();
}

function validaDados() {
    let componentes = $('.required');

    for (let i = 0; i < componentes.length ; i++) {
        let temp = $(componentes[i]);

        if (temp.val() === '') {
            swal('Caro usuário, o campo ' + temp.attr('placeholder') + ' está vazio!');

            return false;
        }
    }
    // Se chegou aqui, é porque não há campos com erro de validação (vazios)
    enviaDados();

}

function validaDadosAgendamento() {
    let teste = true;
    let componentes = $('.required');

    for (let i = 0; i < componentes.length ; i++) {
        let temp = $(componentes[i]);

        if (temp.val() === '') {
            teste = false;

            swal({
                title: "Atenção!",
                text: "Caro usuário, o campo " + temp.attr('placeholder') + " está vazio!",
                icon: "warning"
            }).then((confirmado) => {
                if (confirmado) {
                    return false;
                }
            });
        }

        if (!teste) {
            return false;
        }
    }

    enviarDadosAgendamento();
}

function enviaDados() {
    let url = 'controller.php';

    let dados = {
        idPacMed: $('#idPacMed').val(),
        nome: $('#nome').val(),
        sobrenome: $('#sobrenome').val(),
        sexo: $('#sexoPessoaF').is(':checked') ? 'F' : 'M',
        nascimento: $('#nascimento').val(),
        cpf: $('#cpf').val(),
        estadoCivil: $('#estadoCivil').val(),
        email: $('#email').val() === '' ? null : $('#email').val(),
        telefone: $('#telefone').val(),
        endereco: $('#endereco').val(),
        numero: $('#numero').val(),
        cep: $('#cep').val(),
        cidade: $('#cidade').val(),
        estado: $('#estado').val(),
        especialidade: $('#especialidade').val(),
        crm: $('#crm').val(),
    };

    $.post(url, dados, function(data, status){
        let tipoPessoa;
        let mensagem;

        if (data.tipo === 'P') {
            tipoPessoa = 'Paciente';
        } else {
            tipoPessoa = 'Médico(a)';
        }
        if (data.sucesso) {
            mensagem = 'O cadastro do(a) ' + tipoPessoa + ' ' + data.nome + ' ' + data.sobrenome + ' foi salvo com sucesso!';
            destroyData();
        } else {
            mensagem = 'Não foi possível cadastrar o(a) ' + tipoPessoa + ': ' + data.nome + ' ' + data.sobrenome;
        }

        swal(mensagem);
    });
}


function enviaDados2() {
    let url = 'controller.php';

    let dados = {
        idPacMed: $('#idPacMed').val(),
        idPessoa: $('#idPessoa').val(),
        idContato: $('#idContato').val(),
        nome: $('#nome').val(),
        sobrenome: $('#sobrenome').val(),
        sexo: $('#sexoPessoaF').is(':checked') ? 'F' : 'M',
        nascimento: $('#nascimento').val(),
        cpf: $('#cpf').val(),
        estadoCivil: $('#estadoCivil').val(),
        email: $('#email').val() === '' ? null : $('#email').val(),
        telefone: $('#telefone').val(),
        endereco: $('#endereco').val(),
        numero: $('#numero').val(),
        cep: $('#cep').val(),
        cidade: $('#cidade').val(),
        estado: $('#estado').val(),
        especialidade: $('#especialidade').val(),
        crm: $('#crm').val()
    };

    $.post(url, dados, function(data, status){
        let tipoPessoa;
        let mensagem;

        if (data.tipo === 'P') {
            tipoPessoa = 'Paciente';
        } else {
            tipoPessoa = 'Médico(a)';
        }
        if (data.sucesso) {
            mensagem = 'O cadastro do(a) ' + tipoPessoa + ' ' + data.nome + ' ' + data.sobrenome + ' foi alterado com sucesso!';
        } else {
            mensagem = 'Não foi possível alterar o(a) ' + tipoPessoa + ': ' + data.nome + ' ' + data.sobrenome;
        }

        swal(mensagem);
    });
}

function enviarDadosAgendamento() {
    let url = 'controllerAgendamento.php';

    let dados = {
        idAgendamento: $('#idAgendamento').val(),
        nomeP: $('#nomeP').val(),
        nomeM: $('#nomeM').val(),
        data: $('#data').val(),
        horario: $('#horario').val()
    };

    $.post(url, dados, function(data, status){
        let mensagem;

        if (data.sucesso) {
            mensagem = 'O agendamento do(a) paciente' + ' ' + $('#nomeP option:selected').text() + ' com o Dr(a). ' + $('#nomeM option:selected').text() + ' foi salvo com sucesso!';
            destroyDataAgendamento();
        } else {
            mensagem = 'Não foi possível agendar o(a) paciente' + ' ' + data.nomeP + ' com o Dr(a). ' + data.nomeM;
        }

        swal(mensagem);
    });
}

function enviarDadosAgendamento2() {
    let url = 'controllerAgendamento.php';

    let dados = {
        idAgendamento: $('#idAgendamento').val(),
        nomeP: $('#nomeP').val(),
        nomeM: $('#nomeM').val(),
        data: $('#data').val(),
        horario: $('#horario').val()
    };

    $.post(url, dados, function(data, status){
        let mensagem;

        if (data.sucesso) {
            mensagem = 'O agendamento do(a) paciente' + ' ' + $('#nomeP option:selected').text() + ' com o Dr(a). ' + $('#nomeM option:selected').text() + ' foi alterado com sucesso!';
        } else {
            mensagem = 'Não foi possível alterar o agendamento do(a) paciente' + ' ' + data.nomeP + ' com o Dr(a). ' + data.nomeM;
        }

        swal(mensagem);
    });
}

function saveJs() {
    aceita();
}

function editJs() {
    enviaDados2();
}

function saveJsAgendamento() {
    validaDadosAgendamento();
}

function editJsAgendamento() {
    enviarDadosAgendamento2();

}
function destroyData() {
    var campos = $('#formulario')[0].reset();
}

function destroyDataAgendamento() {
    var campos = $('#agendamento')[0].reset();
}

function previewAgendamento(idAgendamento) {
    getDataAgendamento(idAgendamento);

    $('#visualizarAgendamento').modal('toggle');
}

function getDataAgendamento(id) {
    let url = 'controllerAgendamento.php?consulta=' + id;

    $.get(url, function(data, status){
        $('#agPaciente').text(data.nomePaciente);
        $('#agMedico').text(data.nomeMedico);
        $('#agCrm').text(data.crm);
        $('#agEspecialidade').text(data.especialidade);
        $('#agData').text(data.data);
        $('#agHorario').text(data.horario);
    });
}

function previewMedico(idMedico) {
    getDataMedico(idMedico);

    $('#visualizarMedico').modal('toggle');
}

function getDataMedico(id) {

    let url = 'controller.php?consultaM=' + id;

    $.get(url, function(data, status){
        $('#meMedico').text(data.nomeMed);
        $('#meCrm').text(data.crm);
        $('#meEspecialidade').text(data.especialidade);
        $('#meTelefone').text(data.telefone);
        $('#meEmail').text(data.email);
    });


}

function previewPaciente(idPaciente) {
    getDataPaciente(idPaciente);

    $('#visualizarPaciente').modal('toggle');
}

function getDataPaciente(id) {

    let url = 'controller.php?consultaP=' + id;

    $.get(url, function (data, status) {
        $('#paPaciente').text(data.nomePa);
        $('#paCpf').text(data.cpf);
        $('#paTelefone').text(data.telefone);
        $('#paEmail').text(data.email);
    });

}

function deleteJs(idPessoa, idContato) {
       swal({
        title: 'Tem certeza?',
        text: 'Após apagar, não será possível recuperar o cadastro.',
        icon: 'warning',
        buttons: true,
        dangerMode: true
    }).then((deletar) => {
        if (deletar) {
            url = 'controller.php?del&id=' + idPessoa + '&idContato=' + idContato;

            $.get(url, function (data) {
                if (data.sucesso) {
                    swal('O cadastro foi excluído com sucesso!')
                        .then((recarregar) => {
                            if (recarregar) {
                                location.reload();
                            }
                        });
                } else {
                    swal('Ocorreu um erro ao tentar excluir o cadastro. Tente novamente!');
                }
            });
        } else {
            swal({
                title: "Aviso",
                text: "Cadastro não excluído!",
                icon: "warning",
            });
        }
    });

}

function deleteJsAgendamento(idAgendamento) {
    swal({
        title: 'Tem certeza?',
        text: 'Após apagar, não será possível recuperar o agendamento.',
        icon: 'warning',
        buttons: true,
        dangerMode: true
    }).then((deletar) => {
        if (deletar) {
            url = 'controllerAgendamento.php?del&id=' + idAgendamento;

            $.get(url, function (data) {
                if (data.sucesso) {
                    swal({
                        title: "Feito!",
                        text: "O Agendamento foi excluído com sucesso!",
                        icon: "success"

                    })
                        .then((recarregar) => {
                            if (recarregar) {
                                location.reload();
                            }
                        });
                } else {
                    swal({
                        title: "Erro!",
                        text: "Ocorreu um erro ao tentar excluir o agendamento. Tente novamente!",
                        icon: "error"
                    });
                }
            });
        } else {
            swal({
                title: "Aviso",
                text: "Agendamento não excluído!",
                icon: "warning",
            });
        }
    });

}