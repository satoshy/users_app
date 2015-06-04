$(document).ready(function(){
    $("#username").blur(function() {
        var username = $("#username").val();
        var form_data= $( this ).serialize();

        if (username == "" || username.length <= 6) {
            $("#responseUsername").html('<p style="color: red">Не меньше 6 символов</p>').show();
            $('#username').focus();
            return false;
        } else {
        $.ajax({
            url: '/user/findname',
            type: 'GET',
            data: form_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
                if (response == "Свободно") {
                    $("#responseUsername").html('<p style="color: green">'+response+'!!!</p>').show();
                } else {
                    $("#responseUsername").html('<p style="color: red">'+response+'!!!</p>').show();
                }
            }
        });
        }
    });
});

/*function findname(){
    $('#signup').submit(function() {

    var form_data= $( this ).serialize();

    var username = $("#username").val();
    if (username == "") {
        $('#username').focus();
        return false;
    } 
    else
    {
        $.ajax({
            type:'POST',
            url: '/user/findname',
            data: form_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
            }
            
        });
    }
    });*/

//'X-CSRF-Token': $('input[name="_token"]').val()*/