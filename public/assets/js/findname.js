$(document).ready(function(){
    $("#username").blur(function() {
        var username = $("#username").val();
        var name_data= $( this ).serialize();

        if (username == "" || username.length <= 6) {
            $('#username').focus();
            return false;
        } else {
        $.ajax({
            url: '/user/findname',
            type: 'GET',
            data: name_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
                if (response == "Свободно") {
                    $("#responseUsername").html('<p style="color: green">'+response+'</p>').show();
                } else {
                    $("#responseUsername").html('<p style="color: red">'+response+'</p>').show();
                }
            }
        });
        }
    });
});