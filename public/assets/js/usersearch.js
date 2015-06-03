$("document").ready(function(){
    $("#username").blur(function(e){
        var username = $("#username").val();
        var token = $("#_token").val();
        var dataString = 'username='+username+'&token='+token;

        if (username == "") {
            //$("#responseUsername").html('Пустое поле!').css('color', 'red');
            $('#username').focus();
            //return false;
        } 
        else
        {
            $.ajax({
                url: '/user/search',
                datatype:"json",
                data: dataString,
                cache: false,
                type:'POST',
                success : function(data){
                    alert("Testing ajax forms: " + data);
                }
                //success:function(response){
                //    $("#current1_form").empty();
                //    $("#current1_form").append(response);
                //    $("#error_bs").html('<p style="color: green">Данные отправлены успешно!!!</p>').show().fadeOut(5000);
                //    form.reset();
                //},
                //error:function(data){
                //    $("#error_bs").html('<p>Нет связи с сервером</p>').show().fadeOut(5000);
            });
        }        
    });
});