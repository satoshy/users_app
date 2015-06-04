$(document).ready(function(){
    var city_data = $( this ).val();

    $('#city').tokenInput('/user/findcity/',
       { 
        //queryParam: city_data,
        //contentType: "json",
        noResultsText: "Nothin' found.",
        }); 
});
/*
$(document).ready(function(){
    $('#city').keyup(function(){
        var city = $("#city").val();
        var city_data= $( this ).serialize();

        if (city == "") {
            $('#city').focus();
            return false;
        } else {
        $.ajax({
            url: '/user/findcity',
            type: 'GET',
            data: city_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
                if (response == "false") {
                    return false;
                } else {
                    $('#city').focus();
                    $('#city').tokenInput([response]);
                }
            }
        });
        }


    });
});*/