$("#username").blur(function(){
    if (this.value == "") {
        //$("#responseUsername").html('Пустое поле!').css('color', 'red');
        $('#username').focus();
        return false;
    } 
    else
    {
        $.ajax({
            url:'/user/search',
            data:$(this).serialize(),
            cache: false,
            type:'GET',
            success:function(response){
                console.log(response);
                $("#current1_form").empty();
                $("#current1_form").append(response);
                $("#error_bs").html('<p style="color: green">Данные отправлены успешно!!!</p>').show().fadeOut(5000);
                form.reset();
            },
            error:function(data){
                $("#error_bs").html('<p>Нет связи с сервером</p>').show().fadeOut(5000);
            }
        });
    }        
});



/*function responseUsername(){
$.ajax({
    type: "POST",
    url: "/user/search",
    data: { action: 'fio', user: document.reg.fio.value },
    cache: false,
    success: function(response){
        if(response == 'on'){
            $("#responseFioSpan").text("Имя занято").css("color","red");
            document.reg.releFio.value = 'off';
        }else{
            $("#responseFioSpan").text("Имя свободно").css("color","green");
            document.reg.releFio.value = 'on';
        };
    }
});
};*/