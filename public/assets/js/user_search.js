$("#city").blur(function(){
    if (this.value == "") {
        //$("#responseUsername").html('Пустое поле!').css('color', 'red');
        $('#city').focus();
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