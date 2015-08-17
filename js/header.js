$(document).ready(function(){
    $.ajax({
       url: 'controllers/User/Header.php',
       type: 'POST',
       dataType: 'json',
       data: {},
       success: function(data){
            $('#UserName').html(data.nome);
            $('#UserFoto').attr('src','user_foto/'+data.foto);
            $('#UserName2').html(data.nome);
            $('#UserFoto2').attr('src','user_foto/'+data.foto);
            $('#UserName3').html(data.nome);
            $('#UserFoto3').attr('src','user_foto/'+data.foto);


       }

    });
});

