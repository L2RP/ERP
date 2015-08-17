$(document).ready(function() {
    $('#frmRegister').submit(function (e){
        e.preventDefault();
        var data = $('#frmRegister').serialize();
        console.log(data.senha);
        $.ajax({
            url: 'controllers/User/Register.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(dados){
                if(dados.status=='OK'){
                    $('#erro').addClass("alert alert-success alert-dismissible text-center");
                    $('#erro').html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atenção!</strong> Registrado com Sucesso!");
                    location.href="login.php"
                }else if(dados.status=='ERROR_INSERT'){
                    $('#erro').addClass("alert alert-danger alert-dismissible text-center");
                    $('#erro').html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atenção!</strong> Erro ao Inserir, tente mais tarde!");
                }else if(dados.status=='ALREADY_EXISTS'){
                    $('#erro').addClass("alert alert-danger alert-dismissible text-center");
                    $('#erro').html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atenção!</strong> Usuário já cadastrado!");
                }else if(dados.status=='INVALID_EMAIL'){
                    $('#erro').addClass("alert alert-danger alert-dismissible text-center");
                    $('#erro').html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atenção!</strong> Email inválido!");
                }

            }
        });

        return false;
    });
    $('#frmLogin').submit(function (e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: 'controllers/User/Login.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(dados){
                if(dados.status=='OK'){
                    location.href="index.php"
                }else if(dados.status=='ERROR_LOGIN'){
                    $('#erro').addClass("alert alert-danger alert-dismissible text-center");
                    $('#erro').html("<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atenção!</strong> Usuário ou Senha Inválido(s)!");
                }
            }
        });

        return false;
    });

    $("#uploadForm").ajaxForm({

        url:'controllers/User/FotoUpload.php',
        dataType: 'json',
        uploadProgress: function(event, position, total, percentComplete) {
            $('#status').css('width', percentComplete+'%').attr('aria-valuenow', percentComplete);
            $('#spstatus').html(percentComplete+'%');

        },
        success: function (data){
            $('#status').removeClass('progress-bar-info');
            $('#status').removeClass('progress-bar-danger');
            $('#status').removeClass('progress-bar-success');
            if(data.status=='OK'){
                $('#status').addClass('progress-bar-success');
                $('#spstatus').html('Foto Carregada com sucesso, estamos processando sua imagem, pode continuar navegando');
            }else if(data.status=='ERROR_UPDATE'){
                $('#status').addClass('progress-bar-danger');
                $('#spstatus').html('Foto Carregada com sucesso, porem ocorreu algum problema no processamento');
            }else if(data.status==''){
                $('#status').addClass('progress-bar-danger');
                $('#spstatus').html('Falha ao tentar mover a foto para o local correto, tente novamente');
            }else if(data.status=='ERROR_SIZE'){
                $('#status').addClass('progress-bar-danger');
                $('#spstatus').html('Foto passou o limite de tamanho de 1 MB');
            }else if(data.status=='ERROR_TYPE'){
                $('#status').addClass('progress-bar-danger');
                $('#spstatus').html('Formato de arquivo inválido. Os formatos suportados, estão logo acima');
            }else if(data.status==''){
                $('#status').addClass('progress-bar-danger');
                $('#spstatus').html('Ocorreu algum problema indeterminado ao enviar a foto, tente novamente mais tarde');
            }

        }

    });


});